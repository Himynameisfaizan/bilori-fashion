<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'price',
        'sale_price',
        'stock_quantity',
        'sku',
        'description',
        'short_description',
        'size_fit',
        'material_care',
        'shipping_offers',
        'promo_badges',
        'image',
        'images',
        'attributes',
        'is_active',
        'is_featured',
        'is_trending',
        'is_new_arrival',
        'is_best_seller',
        'badge_new_arrival',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        // BOGO Fields (Cleaned for Mix-and-Match Pool)
        'bogo_enabled',
        'bogo_type',
        'bogo_price',
        'bogo_badge_text',
        'bogo_start_date',
        'bogo_end_date',
        'bogo_terms',
    ];

    protected $casts = [
        'images' => 'array',
        'attributes' => 'array',
        'shipping_offers' => 'array',
        'promo_badges' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'is_new_arrival' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        // BOGO Casts
        'bogo_enabled' => 'boolean',
        'bogo_price' => 'decimal:2',
        'bogo_start_date' => 'datetime',
        'bogo_end_date' => 'datetime',
    ];

    // ==================== RELATIONSHIPS ====================

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function colorImages()
    {
        return $this->hasManyThrough(ProductColorImage::class, ProductColor::class);
    }

    // ==================== BOGO ACCESSORS ====================

    /**
     * चेक करता है कि क्या आज की तारीख में BOGO ऑफर लाइव है या नहीं
     */
    public function getBogoIsActiveAttribute()
    {
        if (!$this->bogo_enabled) {
            return false;
        }
        
        $now = now();
        
        if ($this->bogo_start_date && $now->lt($this->bogo_start_date)) {
            return false;
        }
        
        if ($this->bogo_end_date && $now->gt($this->bogo_end_date)) {
            return false;
        }
        
        return true;
    }

    public function getBogoBadgeHtmlAttribute()
    {
        if (!$this->bogo_is_active) {
            return null;
        }
        
        $text = $this->bogo_badge_text ?? 'Buy any 2 for ₹1500';
        return '<span class="badge bg-success">' . e($text) . '</span>';
    }

    // ==================== SHIPPING & PROMO ACCESSORS ====================

    public function getShippingOffersListAttribute()
    {
        if ($this->shipping_offers) {
            if (is_string($this->shipping_offers)) {
                return json_decode($this->shipping_offers, true) ?? [];
            }
            return $this->shipping_offers;
        }
        return [
            '🚚 Free Shipping on orders above ₹999',
            '🔄 Easy 15 days return & exchange',
            '✅ 100% Authentic Products'
        ];
    }

    public function getPromoBadgesListAttribute()
    {
        if ($this->promo_badges) {
            if (is_string($this->promo_badges)) {
                return json_decode($this->promo_badges, true) ?? [];
            }
            return $this->promo_badges;
        }
        return [
            ['text' => '🎁 Extra 5% off on prepaid orders', 'color' => 'success'],
            ['text' => 'Buy 2 Get 10% off', 'color' => 'danger']
        ];
    }

    public function getSizeFitAttribute($value)
    {
        return $value ?? '';
    }

    public function getMaterialCareAttribute($value)
    {
        return $value ?? '';
    }

    // ==================== PRICE & STOCK ACCESSORS ====================

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        return asset('assets/images/no-image.png');
    }
    
    // In app/Models/Product.php, add this method:

/**
 * Get available coupons for this product's category
 */
public function availableCoupons()
{
    if (!$this->category_id) {
        return collect([]);
    }
    
    $now = now();
    
    return Coupon::where(function($query) {
            $query->where('category_id', $this->category_id)
                  ->orWhereNull('category_id');
        })
        ->where('status', 'active')
        ->where(function($query) use ($now) {
            $query->whereNull('start_date')
                  ->orWhere('start_date', '<=', $now);
        })
        ->where(function($query) use ($now) {
            $query->whereNull('end_date')
                  ->orWhere('end_date', '>=', $now);
        })
        ->where(function($query) {
            $query->whereNull('usage_limit')
                  ->orWhereRaw('used_count < usage_limit');
        })
        ->orderBy('value', 'desc')
        ->get();
}

    public function getFinalPriceAttribute()
    {
        // यदि BOGO एक्टिव है, तो बेस वैल्यू के रूप में BOGO का प्राइस रिफ्लेक्ट करें
        if ($this->bogo_is_active && $this->bogo_price) {
            return $this->bogo_price;
        }
        return $this->sale_price ?? $this->price;
    }

    public function getInStockAttribute()
    {
        if ($this->hasSizeVariations()) {
            return $this->sizes()->where('stock', '>', 0)->exists();
        }
        return $this->stock_quantity > 0;
    }

    public function getOnSaleAttribute()
    {
        return $this->sale_price && $this->sale_price > 0 && $this->sale_price < $this->price;
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->on_sale) {
            return round((($this->price - $this->sale_price) / $this->price) * 100);
        }
        return 0;
    }

    public function getTotalStockAttribute()
    {
        if ($this->hasSizeVariations()) {
            return $this->sizes()->sum('stock');
        }
        return $this->stock_quantity;
    }

    public function getAvailableColorsCountAttribute()
    {
        return $this->colors()->where('is_active', true)->count();
    }

    public function getAvailableSizesCountAttribute()
    {
        return $this->sizes()->where('is_active', true)
            ->where('stock', '>', 0)
            ->distinct('size')
            ->count();
    }

    public function getAllImagesAttribute()
    {
        $allImages = $this->images ?? [];
        
        if ($this->image) {
            array_unshift($allImages, $this->image);
        }
        
        foreach ($this->colors as $color) {
            if ($color->images) {
                $colorImages = json_decode($color->images, true);
                if (is_array($colorImages)) {
                    $allImages = array_merge($allImages, $colorImages);
                }
            }
        }
        
        return array_unique($allImages);
    }

    public function getMinPriceAttribute()
    {
        $prices = [$this->price];
        
        if ($this->sale_price && $this->sale_price > 0) {
            $prices[] = $this->sale_price;
        }
        
        if ($this->bogo_is_active && $this->bogo_price) {
            $prices[] = $this->bogo_price;
        }
        
        if ($this->hasSizeVariations()) {
            $sizePrices = $this->sizes()
                ->where('is_active', true)
                ->where('extra_price', '>', 0)
                ->pluck('extra_price')
                ->toArray();
            $prices = array_merge($prices, $sizePrices);
        }
        
        return min($prices);
    }

    public function getMaxPriceAttribute()
    {
        $prices = [$this->price];
        
        if ($this->hasSizeVariations()) {
            $sizePrices = $this->sizes()
                ->where('is_active', true)
                ->pluck('extra_price')
                ->toArray();
            $prices = array_merge($prices, $sizePrices);
        }
        
        return max($prices);
    }

    public function getPriceRangeAttribute()
    {
        $minPrice = $this->min_price;
        $maxPrice = $this->max_price;
        
        if ($minPrice === $maxPrice) {
            return '₹' . number_format($minPrice, 2);
        }
        
        return '₹' . number_format($minPrice, 2) . ' - ₹' . number_format($maxPrice, 2);
    }

    // ==================== SCOPES ====================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeNewArrival($query)
    {
        return $query->where('is_new_arrival', true);
    }

    public function scopeBogoActive($query)
    {
        $now = now();
        
        return $query->where('bogo_enabled', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('bogo_start_date')
                  ->orWhere('bogo_start_date', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('bogo_end_date')
                  ->orWhere('bogo_end_date', '>=', $now);
            });
    }

    // ==================== HELPER METHODS ====================

    public function hasColorVariations()
    {
        return $this->colors()->exists();
    }

    public function hasSizeVariations()
    {
        return $this->sizes()->exists();
    }

    public function getDistinctSizes()
    {
        return $this->sizes()
            ->where('is_active', true)
            ->select('size')
            ->distinct()
            ->orderBy('size')
            ->pluck('size');
    }

    public function updateStockFromVariations()
    {
        if ($this->hasSizeVariations()) {
            $totalStock = $this->sizes()->sum('stock');
            $this->updateQuietly(['stock_quantity' => $totalStock]);
        }
    }

    // ==================== BOOT METHOD ====================

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
            
            $originalSlug = $product->slug;
            $count = 1;
            while (static::where('slug', $product->slug)->exists()) {
                $product->slug = $originalSlug . '-' . $count;
                $count++;
            }
            
            if (empty($product->shipping_offers)) {
                $product->shipping_offers = [
                    '🚚 Free Shipping on orders above ₹999',
                    '🔄 Easy 15 days return & exchange',
                    '✅ 100% Authentic Products'
                ];
            }
            
            if (empty($product->promo_badges)) {
                $product->promo_badges = [
                    ['text' => '🎁 Extra 5% off on prepaid orders', 'color' => 'success'],
                    ['text' => 'Buy 2 Get 10% off', 'color' => 'danger']
                ];
            }
            
            // डिफ़ॉल्ट रूप से मिक्स-एंड-मैच वैल्यूज सेट करें
            $product->bogo_type = 'any_product';
            if (!isset($product->bogo_badge_text)) {
                $product->bogo_badge_text = 'Buy any 2 for ₹1500';
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && !$product->isDirty('slug')) {
                $product->slug = Str::slug($product->name);
                
                $originalSlug = $product->slug;
                $count = 1;
                while (static::where('slug', $product->slug)
                    ->where('id', '!=', $product->id)
                    ->exists()) {
                    $product->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::deleting(function ($product) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            if ($product->images && is_array($product->images)) {
                foreach ($product->images as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }

            foreach ($product->colors as $color) {
                if ($color->images) {
                    $colorImages = json_decode($color->images, true);
                    if (is_array($colorImages)) {
                        foreach ($colorImages as $image) {
                            if (file_exists(public_path($image))) {
                                unlink(public_path($image));
                            }
                        }
                    }
                }
                if ($color->image && file_exists(public_path($color->image))) {
                    unlink(public_path($color->image));
                }
            }
        });
    }
}
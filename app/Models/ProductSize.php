<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_color_id',
        'size',
        'extra_price',
        'stock',
        'sku',
        'is_active',
    ];

    protected $casts = [
        'extra_price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
    ];

    // ==================== RELATIONSHIPS ====================

    /**
     * Product relation
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Color relation - Links size to specific color variation
     */
    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    // ==================== SCOPES ====================

    /**
     * Scope for active sizes only
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for inactive sizes
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Scope for sizes that are in stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope for low stock items
     */
    public function scopeLowStock($query, $threshold = 5)
    {
        return $query->where('stock', '>', 0)
                    ->where('stock', '<=', $threshold);
    }

    /**
     * Scope for out of stock items
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('stock', '<=', 0);
    }

    /**
     * Scope for specific color
     */
    public function scopeForColor($query, $colorId)
    {
        return $query->where('product_color_id', $colorId);
    }

    // ==================== ACCESSORS ====================

    /**
     * Check if this size is in stock
     */
    public function getInStockAttribute()
    {
        return $this->stock > 0;
    }

    /**
     * Check if stock is running low
     */
    public function getIsLowStockAttribute()
    {
        return $this->stock > 0 && $this->stock <= 5;
    }

    /**
     * Check if this size is out of stock
     */
    public function getIsOutOfStockAttribute()
    {
        return $this->stock <= 0;
    }

    /**
     * Get formatted size name
     */
    public function getFormattedNameAttribute()
    {
        $name = 'Size: ' . $this->size;
        
        if ($this->extra_price > 0) {
            $name .= ' (+₹' . number_format($this->extra_price, 2) . ')';
        }
        
        return $name;
    }

    /**
     * Get full name with color info
     */
    public function getFullNameAttribute()
    {
        $name = $this->size;
        
        if ($this->color) {
            $name = $this->color->name . ' - ' . $name;
        }
        
        if ($this->extra_price > 0) {
            $name .= ' (+₹' . number_format($this->extra_price, 2) . ')';
        }
        
        return $name;
    }

    /**
     * Get availability status with details
     */
    public function getAvailabilityStatusAttribute()
    {
        if ($this->is_out_of_stock) {
            return [
                'text' => 'Out of Stock',
                'class' => 'text-danger',
                'bg_class' => 'bg-danger',
                'icon' => '❌',
                'stock' => 0,
            ];
        }
        
        if ($this->is_low_stock) {
            return [
                'text' => 'Only ' . $this->stock . ' left',
                'class' => 'text-warning',
                'bg_class' => 'bg-warning',
                'icon' => '⚠️',
                'stock' => $this->stock,
            ];
        }
        
        return [
            'text' => 'In Stock (' . $this->stock . ' available)',
            'class' => 'text-success',
            'bg_class' => 'bg-success',
            'icon' => '✅',
            'stock' => $this->stock,
        ];
    }

    /**
     * Get simple stock status text
     */
    public function getStockStatusTextAttribute()
    {
        return $this->availability_status['text'];
    }

    /**
     * Get stock status CSS class
     */
    public function getStockStatusClassAttribute()
    {
        return $this->availability_status['class'];
    }

    /**
     * Check if size has extra price
     */
    public function getHasExtraPriceAttribute()
    {
        return $this->extra_price > 0;
    }

    /**
     * Get the final price including extra price
     */
    public function getFinalPriceAttribute()
    {
        $basePrice = $this->product ? $this->product->final_price : 0;
        return $basePrice + $this->extra_price;
    }

    /**
     * Get the price difference from base price
     */
    public function getPriceDifferenceAttribute()
    {
        if ($this->extra_price > 0) {
            return '+₹' . number_format($this->extra_price, 2);
        }
        return null;
    }

    /**
     * Get the total price (base + extra) formatted
     */
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->final_price, 2);
    }

    /**
     * Get the base price of the product
     */
    public function getBasePriceAttribute()
    {
        return $this->product ? $this->product->final_price : 0;
    }

    /**
     * Generate full SKU including color prefix
     */
    public function getFullSkuAttribute()
    {
        if ($this->color && $this->color->sku) {
            return $this->color->sku . '-' . $this->sku;
        }
        return $this->sku ?? $this->product->sku . '-' . strtoupper($this->size);
    }

    /**
     * Get the color name for this size
     */
    public function getColorNameAttribute()
    {
        return $this->color ? $this->color->name : null;
    }

    /**
     * Get the color code for this size
     */
    public function getColorCodeAttribute()
    {
        return $this->color ? $this->color->code : '#000000';
    }

    /**
     * Get the color primary image for this size
     */
    public function getColorImageAttribute()
    {
        if ($this->color) {
            return $this->color->image_url;
        }
        return null;
    }

    /**
     * Get all color images for this size
     */
    public function getColorImagesAttribute()
    {
        if ($this->color) {
            return $this->color->all_image_urls;
        }
        return [];
    }

    /**
     * Get the color primary image URL
     */
    public function getColorImageUrlAttribute()
    {
        if ($this->color && $this->color->image_url) {
            return $this->color->image_url;
        }
        
        // Fallback to first color image from array
        if ($this->color && !empty($this->color->all_image_urls[0])) {
            return $this->color->all_image_urls[0];
        }
        
        return $this->product ? $this->product->image_url : asset('assets/images/no-image.png');
    }

    /**
     * Get the display name for this size variation
     */
    public function getDisplayNameAttribute()
    {
        $parts = [];
        
        if ($this->color) {
            $parts[] = $this->color->name;
        }
        
        $parts[] = $this->size;
        
        return implode(' - ', $parts);
    }

    /**
     * Check if this is the only available size for its color
     */
    public function getIsLastAvailableForColorAttribute()
    {
        if (!$this->color) return false;
        
        $availableSizes = $this->color->sizes()
            ->active()
            ->inStock()
            ->where('id', '!=', $this->id)
            ->count();
            
        return $availableSizes === 0;
    }

    /**
     * Get sizes available in the same color
     */
    public function getSiblingSizesAttribute()
    {
        if (!$this->product_color_id) return collect([]);
        
        return self::where('product_color_id', $this->product_color_id)
            ->where('id', '!=', $this->id)
            ->active()
            ->get();
    }

    /**
     * Get available sibling sizes count
     */
    public function getSiblingSizesCountAttribute()
    {
        return $this->sibling_sizes->count();
    }

    // ==================== HELPER METHODS ====================

    /**
     * Decrease stock by given quantity
     */
    public function decreaseStock($quantity = 1)
    {
        if ($this->stock >= $quantity) {
            $this->decrement('stock', $quantity);
            return true;
        }
        return false;
    }

    /**
     * Increase stock by given quantity
     */
    public function increaseStock($quantity = 1)
    {
        $this->increment('stock', $quantity);
        return true;
    }

    /**
     * Check if this size belongs to a specific color
     */
    public function belongsToColor($colorId)
    {
        return $this->product_color_id == $colorId;
    }

    /**
     * Check if enough stock available for given quantity
     */
    public function hasEnoughStock($quantity = 1)
    {
        return $this->stock >= $quantity;
    }

    /**
     * Reserve stock (soft reserve - just check availability)
     */
    public function canReserve($quantity = 1)
    {
        return $this->is_active && $this->hasEnoughStock($quantity);
    }

    /**
     * Activate this size
     */
    public function activate()
    {
        return $this->update(['is_active' => true]);
    }

    /**
     * Deactivate this size
     */
    public function deactivate()
    {
        return $this->update(['is_active' => false]);
    }

    /**
     * Toggle active status
     */
    public function toggleActive()
    {
        return $this->update(['is_active' => !$this->is_active]);
    }

    /**
     * Update stock level
     */
    public function updateStock($quantity)
    {
        return $this->update(['stock' => max(0, $quantity)]);
    }

    /**
     * Add stock
     */
    public function addStock($quantity)
    {
        return $this->increment('stock', $quantity);
    }

    /**
     * Get product info with size details
     */
    public function getProductInfo()
    {
        return [
            'product_name' => $this->product ? $this->product->name : 'N/A',
            'size' => $this->size,
            'color' => $this->color_name,
            'color_code' => $this->color_code,
            'price' => $this->final_price,
            'sku' => $this->full_sku,
            'stock' => $this->stock,
            'is_available' => $this->canReserve(),
        ];
    }

    // ==================== BOOT METHOD ====================

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate SKU if not provided
        static::creating(function ($size) {
            if (empty($size->sku)) {
                $base = 'PRD';
                $colorPrefix = '';
                $sizeSuffix = strtoupper($size->size);
                
                if ($size->product) {
                    $base = $size->product->sku ?: 'PRD';
                }
                
                if ($size->color && $size->color->sku) {
                    $colorPrefix = $size->color->sku;
                }
                
                $sku = $base;
                if ($colorPrefix) {
                    $sku .= '-' . $colorPrefix;
                }
                $sku .= '-' . $sizeSuffix;
                
                // Ensure uniqueness
                $originalSku = $sku;
                $count = 1;
                while (static::where('sku', $sku)->exists()) {
                    $sku = $originalSku . '-' . $count;
                    $count++;
                }
                
                $size->sku = $sku;
            }
        });

        // Update parent product's stock when size stock changes
        static::saved(function ($size) {
            if ($size->product && $size->product->hasSizeVariations()) {
                $totalStock = $size->product->sizes()->sum('stock');
                $size->product->updateQuietly(['stock_quantity' => $totalStock]);
            }
        });

        // Cleanup when size is deleted
        static::deleted(function ($size) {
            if ($size->product && $size->product->hasSizeVariations()) {
                $totalStock = $size->product->sizes()->sum('stock');
                $size->product->updateQuietly(['stock_quantity' => $totalStock]);
            }
        });
    }
}
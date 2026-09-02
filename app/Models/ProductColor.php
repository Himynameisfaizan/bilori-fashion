<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'code',
        'extra_price',
        'sku',
        'image',      // Primary/thumbnail image
        'images',     // JSON array of all color images
        'is_active',
    ];

    protected $casts = [
        'extra_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Product relation
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Sizes relation - Get all sizes for this color variation
     */
    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_color_id');
    }

    /**
     * ✅ ADD THIS - Color Images relation
     * If you're storing images as JSON in the 'images' column,
     * you don't actually need a separate table.
     * Instead, use an accessor to get images as array.
     */
    public function getImagesArrayAttribute()
    {
        if ($this->images) {
            // If it's already an array (cast), return it
            if (is_array($this->images)) {
                return $this->images;
            }
            // If it's a JSON string, decode it
            $decoded = json_decode($this->images, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }

    /**
     * ✅ ADD THIS - Get all images including primary image
     */
   
    /**
     * ✅ ADD THIS - Get all image URLs
     */
    public function getAllImageUrlsAttribute()
    {
        $urls = [];
        $allImages = $this->all_images_array;
        
        foreach ($allImages as $image) {
            if (file_exists(public_path($image))) {
                $urls[] = asset($image);
            }
        }
        
        return $urls;
    }

    /**
     * Get color image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        
        // Fallback to first image from array
        $imagesArray = $this->images_array;
        if (!empty($imagesArray[0]) && file_exists(public_path($imagesArray[0]))) {
            return asset($imagesArray[0]);
        }
        
        return null;
    }

    // ... rest of your existing methods ...


    /**
     * Get color image or default product image for display
     */
    public function getDisplayImageAttribute()
    {
        if ($this->image_url) {
            return $this->image_url;
        }
        
        if ($this->product && $this->product->image_url) {
            return $this->product->image_url;
        }
        
        return asset('assets/images/no-image.png');
    }

    /**
     * Get all images as array (combines 'image' and 'images' fields)
     */
    public function getAllImagesArrayAttribute()
    {
        $allImages = [];
        
        // Add primary image if exists
        if ($this->image) {
            $allImages[] = $this->image;
        }
        
        // Add images from JSON array
        $imagesArray = [];
        if ($this->images) {
            if (is_string($this->images)) {
                $imagesArray = json_decode($this->images, true) ?? [];
            } elseif (is_array($this->images)) {
                $imagesArray = $this->images;
            }
        }
        
        // Also get from relation if exists
        if (method_exists($this, 'colorImages') && $this->relationLoaded('colorImages')) {
            foreach ($this->colorImages as $colorImage) {
                if (!in_array($colorImage->image_path, $allImages)) {
                    $allImages[] = $colorImage->image_path;
                }
            }
        }
        
        $allImages = array_merge($allImages, $imagesArray);
        
        return array_unique($allImages);
    }

    /**
     * Get all image URLs
     */
  

    /**
     * Get images count
     */
    public function getImagesCountAttribute()
    {
        return count($this->all_images_array);
    }

    /**
     * Check if color has multiple images
     */
    public function getHasMultipleImagesAttribute()
    {
        return $this->images_count > 1;
    }

    /**
     * Get minimum price for this color (from sizes)
     */
    public function getMinPriceAttribute()
    {
        $minPrice = $this->sizes()->min('extra_price');
        $basePrice = $this->product ? $this->product->final_price : 0;
        return $basePrice + ($minPrice ?? 0);
    }

    /**
     * Get maximum price for this color (from sizes)
     */
    public function getMaxPriceAttribute()
    {
        $maxPrice = $this->sizes()->max('extra_price');
        $basePrice = $this->product ? $this->product->final_price : 0;
        return $basePrice + ($maxPrice ?? 0);
    }

    /**
     * Get price range for this color
     */
    public function getPriceRangeAttribute()
    {
        $min = $this->min_price;
        $max = $this->max_price;
        
        if ($min == $max) {
            return '₹' . number_format($min, 2);
        }
        
        return '₹' . number_format($min, 2) . ' - ₹' . number_format($max, 2);
    }

    /**
     * Get active sizes for this color
     */
    public function getActiveSizesAttribute()
    {
        return $this->sizes()->active()->get();
    }

    /**
     * Get in-stock sizes for this color
     */
    public function getInStockSizesAttribute()
    {
        return $this->sizes()->active()->inStock()->get();
    }

    /**
     * Get out-of-stock sizes for this color
     */
    public function getOutOfStockSizesAttribute()
    {
        return $this->sizes()->active()->outOfStock()->get();
    }

    /**
     * Check if color is available (has at least one size in stock)
     */
    public function getIsAvailableAttribute()
    {
        return $this->is_active && $this->in_stock;
    }

    /**
     * Get stock status summary
     */
    public function getStockStatusAttribute()
    {
        $total = $this->total_stock;
        $available = $this->available_sizes_count;
        $totalSizes = $this->total_sizes_count;
        
        if ($total == 0) {
            return [
                'text' => 'Out of Stock',
                'class' => 'danger',
                'icon' => '❌'
            ];
        }
        
        if ($total <= 5) {
            return [
                'text' => 'Low Stock (' . $total . ' left)',
                'class' => 'warning',
                'icon' => '⚠️'
            ];
        }
        
        return [
            'text' => 'In Stock (' . $available . '/' . $totalSizes . ' sizes)',
            'class' => 'success',
            'icon' => '✅'
        ];
    }

    /**
     * Get sizes grouped by availability
     */
    public function getSizesGroupedAttribute()
    {
        return [
            'in_stock' => $this->in_stock_sizes,
            'out_of_stock' => $this->out_of_stock_sizes,
        ];
    }

    // ==================== HELPER METHODS ====================

    /**
     * Add an image to this color
     */
    public function addImage($imagePath)
    {
        $images = $this->all_images_array;
        $images[] = $imagePath;
        
        $this->update([
            'images' => json_encode($images),
            'image' => $this->image ?? $imagePath, // Set as primary if no primary exists
        ]);
        
        return $this;
    }

    /**
     * Remove an image from this color
     */
    public function removeImage($imagePath)
    {
        $images = $this->all_images_array;
        $images = array_filter($images, function ($img) use ($imagePath) {
            return $img !== $imagePath;
        });
        
        // Delete file
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
        
        $this->update([
            'images' => json_encode(array_values($images)),
            'image' => $this->image === $imagePath ? ($images[0] ?? null) : $this->image,
        ]);
        
        return $this;
    }

    /**
     * Set primary image
     */
    public function setPrimaryImage($imagePath)
    {
        $this->update(['image' => $imagePath]);
        return $this;
    }

    /**
     * Get available sizes list as simple array
     */
    public function getAvailableSizesListAttribute()
    {
        return $this->sizes()
            ->active()
            ->inStock()
            ->pluck('size')
            ->toArray();
    }

    // ==================== BOOT METHOD ====================

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        // Clean up images when deleting color
        static::deleting(function ($color) {
            // Delete primary image
            if ($color->image && file_exists(public_path($color->image))) {
                unlink(public_path($color->image));
            }
            
            // Delete all images from JSON array
            $imagesArray = [];
            if ($color->images) {
                if (is_string($color->images)) {
                    $imagesArray = json_decode($color->images, true) ?? [];
                } elseif (is_array($color->images)) {
                    $imagesArray = $color->images;
                }
            }
            
            foreach ($imagesArray as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
            
            // Delete from product_color_images table if exists
            if (method_exists($color, 'colorImages')) {
                foreach ($color->colorImages as $colorImage) {
                    if (file_exists(public_path($colorImage->image_path))) {
                        unlink(public_path($colorImage->image_path));
                    }
                    $colorImage->delete();
                }
            }
        });
    }
}
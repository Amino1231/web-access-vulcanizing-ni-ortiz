<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'shop_id',
        'category_id',
        'brand_id',
        'prod_name',
        'prod_slug',
        'prod_img',
        'quantity',
        'price',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id','id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }

}

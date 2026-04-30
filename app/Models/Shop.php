<?php

namespace App\Models;

use App\Models\Mechanic;
use App\Models\Product;
use App\Models\Queue;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    protected $fillable = [
        'shop_name'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_id', 'shop_id', 'service_shop');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shop_user', 'shop_id', 'user_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'shop_id', 'id');
    }

    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class, 'shop_id', 'id');
    }

    public function mechanics(): HasMany
    {
        return $this->hasMany(Mechanic::class, 'shop_id', 'id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'shop_id', 'id');
    }

}

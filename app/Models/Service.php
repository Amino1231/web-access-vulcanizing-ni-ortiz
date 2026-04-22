<?php

namespace App\Models;

use App\Models\Mechanic;
use App\Models\ServiceType;
use App\Models\Shop;
use App\Models\ShopOffering;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'image',
        'service_type_id',
    ];

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'service_id', 'shop_id', 'service_shop');
    }

    public function mechanics(): BelongsToMany
    {
        return $this->belongsToMany(Mechanic::class, 'service_id', 'mechanic_id', 'mechanic_service');
    }

    public function shopOfferings(): HasMany 
    {
        return $this->hasMany(ShopOffering::class, 'service_id', 'id');
    }
    
}

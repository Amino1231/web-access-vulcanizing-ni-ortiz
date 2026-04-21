<?php

namespace App\Models;

use App\Models\Queue;
use App\Models\Service;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mechanic extends Model
{
    protected $fillable = [
        'shop_id',
        'user_id',
    ];

    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class, 'mechanic_id', 'id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'mechanic_id', 'service_id', 'mechanic_service');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

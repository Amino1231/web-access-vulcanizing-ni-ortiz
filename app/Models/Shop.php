<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    protected $fillable = [
        'shop_name'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shop_id', 'user_id', 'shop_user');
    }
}

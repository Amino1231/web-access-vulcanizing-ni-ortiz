<?php

namespace App\Models;

use App\Models\Queue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = [
        'status_name',
    ];

    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class, 'status_id', 'id');
    }
}

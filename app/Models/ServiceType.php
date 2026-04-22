<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = [
        'serv_type_name',
        'serv_type_desc',
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'service_type_id', 'id');
    }

}

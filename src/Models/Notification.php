<?php

namespace Nanuc\LaravelNotifications\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['model_type', 'model_id', 'is_active', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

}
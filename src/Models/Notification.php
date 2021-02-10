<?php

namespace Nanuc\LaravelNotifications\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['type', 'expires_at', 'token'];

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    public function tokenable()
    {
        return $this->morphTo('model');
    }
}
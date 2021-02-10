<?php

namespace Nanuc\LaravelNotifications\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Notification extends Model
{
    use HasTranslations;

    public $translatable = ['text'];

    protected $fillable = ['model_type', 'model_id', 'is_active', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeIsGlobal($query)
    {
        return $query->whereNull('model_type');
    }

    public function scopeIsNotExpired($query)
    {
        return $query->whereDate('expires_at', '>', Carbon::now());
    }
    
    public static function forModel($model)
    {
        return (new static())
            ->where('model_type', $model::class)
            ->where('model_id', $model->id)
            ->where('is_active')
            ->get();
    }

}
<?php

namespace App\Models;

use App\Events\SiteNotification;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    /**
    * @var  string
    */
    protected $table = 'notifications';

    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $notification = self::find($model->id);
            broadcast(new SiteNotification($notification));
        });

    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
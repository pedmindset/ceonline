<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Str;

class Event extends Model
{
    /**
    * @var  string
    */
    protected $table = 'events';

    protected $casts = [
    'start_date' => 'datetime',
    'end_date' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

       /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = (string) Str::slug($model->title .'-'. time());
        });

        // static::updating(function ($model) {
        //     $model->slug = (string) Str::slug($model->title ."-". time());
        // });
    }



    public function church()
    {
        return $this->belongsTo('App\Models\Church', 'church_id', 'id');
    }


    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }


    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

}

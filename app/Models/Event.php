<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class Event extends Model implements HasMedia
{
    use InteractsWithMedia;
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
            $model->slug = (string) Str::slug($model->title);
        });

        // static::updating(function ($model) {
        //     $model->slug = (string) Str::slug($model->title);
        // });
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banner')
            ->useFallbackUrl('images/christ_embassy_nungua.jpg')
            ->useFallbackPath(public_path('images/christ_embassy_nungua.jpg'))
            ->withResponsiveImages();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
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

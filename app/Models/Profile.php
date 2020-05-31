<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Profile extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $guarded = [''];

    /**
    * @var  string
    */
    protected $table = 'profiles';

    protected $casts = [
    'date_of_birth' => 'date',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl('profile', 'big');
    }

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('profile');
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100)
            ->performOnCollections('profile');

        $this->addMediaConversion('big')
        ->crop('crop-center', 300, 300)
        ->performOnCollections('profile');
    }

    public function church()
    {
        return $this->belongsTo('App\Models\Church', 'church_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}

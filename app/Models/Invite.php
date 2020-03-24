<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

/**
* @var  string
*/
protected $table = 'invites';

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

    static::creating(function ($model) {
        $user = User::find($model->user_id);
        $model->name = $user->name;
    });

}

public function church()
{
return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}
public function owner()
{
return $this->belongsTo('App\Models\User', 'owner_id', 'id');
}
public function user()
{
return $this->belongsTo('App\Models\User', 'user_id', 'id');
}
public function service()
{
return $this->belongsTo('App\Models\Service', 'service_id', 'id');
}
}
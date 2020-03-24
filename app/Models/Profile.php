<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

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

public function church()
{
return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}
public function user()
{
return $this->belongsTo('App\Models\User', 'user_id', 'id');
}
}
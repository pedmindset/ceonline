<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{

/**
* @var  string
*/
protected $table = 'cells';

protected $casts = [
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

public function users()
{
return $this->belongsToMany('App\Models\User', 'user_id', 'id');
}
}
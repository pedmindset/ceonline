<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

/**
* @var  string
*/
protected $table = 'comments';

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
public function service()
{
return $this->belongsTo('App\Models\Service', 'service_id', 'id');
}
}
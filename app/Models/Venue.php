<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{

/**
* @var  string
*/
protected $table = 'venues';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function church()
{
    return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}

}
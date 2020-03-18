<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{

/**
* @var  string
*/
protected $table = 'churches';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}
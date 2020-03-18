<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

/**
* @var  string
*/
protected $table = 'services';

protected $casts = [
'start_date' => 'datetime',
'end_date' => 'datetime',
'created_at' => 'datetime',
'updated_at' => 'datetime',
];
public function church()
{
    return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}
public function service_type()
{
return $this->belongsTo('App\Models\ServiceType', 'service_type_id', 'id');
}
public function venue()
{
return $this->belongsTo('App\Models\Venue', 'venue_id', 'id');
}
}
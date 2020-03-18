<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Service extends Model implements Viewable
{
    use InteractsWithViews;

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
public function servicetype()
{
return $this->belongsTo('App\Models\ServiceType', 'service_type_id', 'id');
}
public function venue()
{
return $this->belongsTo('App\Models\Venue', 'venue_id', 'id');
}
}
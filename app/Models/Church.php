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

public function users()
{
return $this->hasMany('App\Models\User');
}

public function cells()
{
return $this->hasMany('App\Models\Cell');
}

public function payments()
{
return $this->hasMany('App\Models\Payment');
}

public function attendances()
{
return $this->hasMany('App\Models\Attendance');
}

public function venues()
{
return $this->hasMany('App\Models\Venue');
}


public function announcements()
{
return $this->hasMany('App\Models\Announcement');
}

public function services()
{
return $this->hasMany('App\Models\Service');
}

}


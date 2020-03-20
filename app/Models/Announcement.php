<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

/**
* @var  string
*/
protected $table = 'announcements';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function announcement_category()
{
return $this->belongsTo('App\Models\AnnouncementCategory', 'announcement_category_id', 'id');
}
public function church()
{
    return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}

public function service()
{
    return $this->belongsTo('App\Models\Service');
}
}
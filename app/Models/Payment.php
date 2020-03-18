<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

/**
* @var  string
*/
protected $table = 'payments';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function church()
{
return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}
public function payment()
{
return $this->belongsTo('App\Models\Payment', 'payment_category_id', 'id');
}
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCategory extends Model
{

/**
* @var  string
*/
protected $table = 'payment_categories';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function church()
{
return $this->belongsTo('App\Models\Church', 'church_id', 'id');
}


}
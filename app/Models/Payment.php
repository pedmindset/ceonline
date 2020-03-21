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
    public function paymentcategory()
    {
    return $this->belongsTo('App\Models\PaymentCategory', 'payment_category_id', 'id');
    }

    public function service()
    {
    return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
    public function user()
    {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
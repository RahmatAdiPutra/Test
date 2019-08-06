<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'm_customer';

    protected $primaryKey = 'customer_id';

    public $timestamps = false;

    protected $fillable = [
        'customer_name', 'address', 'phone', 'email'
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'customer_id');
    }
}

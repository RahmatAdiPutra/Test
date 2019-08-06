<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'th_sales';

    protected $primaryKey = 'sales_id';

    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'sales_date', 'notes', 'total_sales_prices'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'sales_id');
    }

    public function details()
    {
        return $this->hasMany(SalesDetail::class, 'sales_id');
    }
}

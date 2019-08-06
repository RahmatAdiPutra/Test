<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    protected $table = 'td_salesdetail';

    protected $primaryKey = 'salesdetail_id';

    public $timestamps = false;

    protected $fillable = [
        'sales_id', 'cluster_id', 'type_id', 'price', 'qty', 'total'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }
}

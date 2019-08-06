<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'm_type';

    protected $primaryKey = 'type_id';

    public $timestamps = false;

    protected $fillable = [
        'cluster_id', 'type_name', 'price', 'description'
    ];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }

    public function details()
    {
        return $this->hasMany(SalesDetail::class, 'type_id');
    }
}

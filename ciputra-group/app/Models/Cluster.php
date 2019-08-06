<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'm_cluster';

    protected $primaryKey = 'cluster_id';

    public $timestamps = false;

    protected $fillable = [
        'cluster_name', 'description'
    ];

    public function types()
    {
        return $this->hasMany(Type::class, 'cluster_id');
    }

    public function details()
    {
        return $this->hasMany(SalesDetail::class, 'cluster_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    
    public function distributor() {
        return $this->belongsTo('App\Distributor');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}

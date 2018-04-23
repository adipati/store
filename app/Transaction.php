<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function distributor() {
        return $this->belongsTo('App\Distributor');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}

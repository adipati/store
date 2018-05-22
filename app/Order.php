<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}

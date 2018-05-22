<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributor extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function user() {
        return $this->belongsTo(\App\User::class)->orderBy('id', 'desc');
    }
    
    public function getAmountAttribute() {
        return $this->attributes['amount']/100;
        
    }

    public function setAmountAttribute($amount) {
        $amount = (double) $amount;
        $amount *= 100;
        return $this->attributes['amount'] = (int) $amount;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['name','author','ISBN','addedDate'];
    protected $dates=['addedDate'];

    public function rented(){
        return $this->belongsTo('App\User');
    }
    public function scopeNotRented($query){
        $query->where('rented','!=','1');
    }

}

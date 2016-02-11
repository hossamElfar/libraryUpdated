<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $fillable=['status','user_id'];
    protected $dates=['typedOn'];
    public function writenBy(){
        return $this->belongsTo('App\User');
    }
}

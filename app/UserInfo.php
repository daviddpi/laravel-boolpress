<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = ["address", "country", "telephone"];

    public function userInfo(){
        return $this->belongsTo("App\UserInfo");
    }
}

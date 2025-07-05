<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasSetting extends Model
{
    protected $table = "user_has_settings";
    protected $fillable = [
        "user_id",
        "setting_id",
    ] ;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Setting(){
        return $this->belongsTo(Setting::class);
    }
}

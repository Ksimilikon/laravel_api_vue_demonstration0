<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        "name",
        "token"
    ];

    public function Messages(){
        return $this->hasMany(Message::class);
    } 
    public function Members(){
        return $this->hasMany(Member::class);
    }
}

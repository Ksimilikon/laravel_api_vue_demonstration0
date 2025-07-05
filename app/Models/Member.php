<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];
    public function Messages(){
        return $this->hasMany(Message::class);
    }
    public function Conversation(){
        return $this->belongsTo(Conversation::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function MemberRole(){
        return $this->belongsTo(MemberRole::class);
    }
}

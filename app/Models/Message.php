<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        "text",
        "member_id",
        "conversation_id",
    ];
    public function Member(){
        return $this->belongsTo(Member::class);
    }
    public function Conversation(){
        return $this->belongsTo(Conversation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRole extends Model
{
    protected $fillable= [
        "name",
    ];
    public function Members(){
        return $this->hasMany(Member::class);
    }
    public function MemberRoleHasPermission(){
        return $this->hasMany(MemberRoleHasPermission::class);
    }
}

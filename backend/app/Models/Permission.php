<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name'
    ];
    public function MemberRoleHasPermissions(){
        return $this->hasMany(MemberRoleHasPermission::class);
    }
}

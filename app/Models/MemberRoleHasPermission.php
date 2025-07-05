<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRoleHasPermission extends Model
{
    protected $table = "member_role_has_permissions";
    protected $fillable = [
        "member_role_id",
        "permission_id"
    ];
    public function MemberRole(){
        return $this->belongsTo(MemberRole::class);
    }
    public function Permission(){
        return $this->belongsTo(Permission::class);
    }
}

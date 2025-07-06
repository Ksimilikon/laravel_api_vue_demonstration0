<?php

use App\Models\MemberRole;
use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_role_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MemberRole::class);
            $table->foreignIdFor(Permission::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_role_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['member_role_id', 'permission_id']);
        });
        Schema::dropIfExists('member_role_has_permissions');
    }
};

<?php

use App\Models\Conversation;
use App\Models\Member;
use App\Models\MemberRole;
use App\Models\User;
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
        Schema::table("roles", function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });
        Schema::table("members", function (Blueprint $table) {
            $table->foreignIdFor(Conversation::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(MemberRole::class)->constrained()->cascadeOnDelete();
        });
        Schema::table("messages", function (Blueprint $table) {
            $table->foreignIdFor(Member::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Conversation::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['conversation_id']);
        });
        
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['conversation_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['member_role_id']);
        });
        
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};

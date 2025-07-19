<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Member;
use App\Models\MemberRole;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u1 = User::createOrFirst([
            'name'=>'ksi',
            'email'=>'ksi@email',
            'password'=>Hash::make('1234'),
        ]);
        $u2 = User::createOrFirst([
            'name'=>'essen',
            'email'=>'essen@email',
            'password'=>Hash::make('1234'),
        ]);
        User::createOrFirst([
            'name'=>'klee',
            'email'=>'klee@email',
            'password'=>Hash::make('1234'),
        ]);

        $conv = Conversation::createOrFirst([
            'name'=>'dialog',
            'type'=>'dialog',
        ]);
        $role = MemberRole::createOrFirst([
            'name'=>'user'
        ]);

        $m1 = Member::createOrFirst([
            'user_id'=>$u1->id,
            'conversation_id'=>$conv->id,
            'member_role_id'=>$role->id
        ]);
        $m2 = Member::createOrFirst([
            'user_id'=>$u2->id,
            'conversation_id'=>$conv->id,
            'member_role_id'=>$role->id
        ]);
    }
}

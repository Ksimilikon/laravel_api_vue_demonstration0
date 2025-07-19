<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function searchUsers(Request $request){
        $users = User::where('name', $request->get('name'))->select('name', 'id')->get();
        return response()->json(['users'=>$users]);
    }
}

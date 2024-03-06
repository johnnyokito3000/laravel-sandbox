<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($id) {
        

        $user = DB::table('users')
                    ->leftJoin('profile_pictures', 'users.id', '=', 'profile_pictures.user_id')
                    ->select('users.name', 'users.email', 'profile_pictures.url')
                    ->where('users.id', $id)
                    ->get()->first();

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found']);
        }

    }
}

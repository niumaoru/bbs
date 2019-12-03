<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function test(){
        $user_ids = User::all()->pluck('name')->toArray();

        dd($user_ids);
    }
}

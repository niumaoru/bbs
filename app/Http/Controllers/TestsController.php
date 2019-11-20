<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function test(){
        $a = false;
        $b =2;
        echo $a ?: $b;
    }
}

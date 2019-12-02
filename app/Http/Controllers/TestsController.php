<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function test(){
        $query = http_build_query([
            "q"     =>  'apple',
            "from"  => "zh",
            "to"    => "en",
            "appid" => '20190529000303199',
            "salt"  => time(),
            "sign"  => 'kiUwbzR5YkvwukPgIl3Z',
        ]);

        dd($query);
    }
}

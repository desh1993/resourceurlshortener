<?php

namespace App\Http\Controllers\URL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Link;

class URLController extends Controller
{
    public function show(Request $request) {
        return $request -> all();
    }
}

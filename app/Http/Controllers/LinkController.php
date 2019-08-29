<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('url.short');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // initiliaze instance of a model 
        $link = new \App\Link();
        
        //check if this url exist in our database 
        $url = $link -> whereUrl($request -> url) -> first();
        // if exist , return to the result view along with the eloquent Model 
        if ($url === NULL) {
            # code...
            $short = $this -> generateShortCode();
            $link -> create([
                'url' => $request -> url , 
                'short' => $short
            ]);
            $url = $link -> whereUrl($request -> url) -> first();
            return view('url.result' , compact('url'));
        }
        return view('url.result' , compact('url'));
    }

    public function generateShortCode() 
    {
        $result = base_convert(rand(1000 , 99999) , 10 ,36);
        return $result;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //to display the short code to the view
        $url = $link -> whereUrl($link -> url) -> first();
        return $url;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}

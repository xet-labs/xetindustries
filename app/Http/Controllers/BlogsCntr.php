<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use xet\Loc;

class BlogsCntr extends Controller
{
    public function index(){
        require(Loc::path('public'). "/blog/blog.blade.php");
    }


    public function blogPost($slug){
        $filePath = Loc::path('public') . "/blog/{$slug}/index.php";
        if (file_exists($filePath)) { include $filePath; } else { abort(404); }
    }


    public function getCards(){
        require(Loc::file('CNTR', 'get-card.blogs'));
    }


    /* Show the form for creating a new resource */
    public function create(){
        
    }

    /* Store a newly created resource in storage */
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
    }

    /* Display the specified resource */
    public function show($username, $slug=null){
        require(Loc::file('CNTR', 'show.blog'));
    }

    /* Show the form for editing the specified resource */
    public function edit(string $id)
    {
        //
    }

    /* Update the specified resource in storage */
    public function update(Request $request, string $id)
    {
        //
    }

    /* Remove the specified resource from storage */
    public function destroy(string $id)
    {
        //
    }
}

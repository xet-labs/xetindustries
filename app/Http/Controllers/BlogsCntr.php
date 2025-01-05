<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use xet\Loc;

class BlogsCntr extends Controller
{
    public function index() {
        require(Loc::file('PAGE', 'blogs'));
    }


    public function fetchCards() {
        require(Loc::file('CNTR', 'fetch-card.blogs'));
    }


    /* Show the form for creating a new resource */
    public function create() {
    }

    /* Store a newly created resource in storage */
    public function store(Request $request) {
    }

    /* Display the specified resource */
    public function show($BlogAuthor, $BlogSlug=null) {
        require(Loc::file('CNTR', 'show.blog'));
    }

    /* Show the form for editing the specified resource */
    public function edit(string $id) {
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

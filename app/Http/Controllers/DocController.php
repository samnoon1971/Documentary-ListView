<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{

    /*
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $docs = Doc::all();
        return response()->json([
            'status' => 'success',
            'data' => $docs
        ]);
    }

    /*
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $doc = Doc::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $doc,
            'message' => 'Documentary information created successfully',
        ]);

    }


}

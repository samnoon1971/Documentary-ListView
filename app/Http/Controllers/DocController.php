<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doc;

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
    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
   public function show ($id)
   {
       $doc = Doc::find($id);
       if ($doc) {
           return response()->json([
               'status' => 'success',
               'data' => $doc
           ]);
       } else {
           return response()->json([
               'status' => 'error',
               'message' => 'Documentary information not found'
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
   public function update (Request $request, $id)
   {
       $doc = Doc::find($id);
       if ($doc) {
           $doc->update([
               'title' => $request->title,
               'description' => $request->description,
           ]);
           return response()->json([
               'status' => 'success',
               'data' => $doc,
               'message' => 'Documentary information updated successfully'
           ]);
       } else {
           return response()->json([
               'status' => 'error',
               'message' => 'Documentary information not found'
           ]);
       }
   }
   /**
    * Remove the specified resource from storage.
    * @param int $id
    */
   public function destroy ($id)
   {
       $doc = Doc::find($id);
       if ($doc) {
           $doc->delete();
           return response()->json([
               'status' => 'success',
               'message' => 'Documentary information deleted successfully'
           ]);
       } else {
           return response()->json([
               'status' => 'error',
               'message' => 'Documentary information not found'
           ]);
       }
   }

}

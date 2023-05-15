<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $res=Listing::latest()->filter(["tage"=>$request->tage,"search"=>$request->search])->get();
        return response()->json($res);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $Listing)
    {
        return response()->json($Listing); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $Listing)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $Listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $Listing)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bijou;
use Illuminate\Http\Request;

class AdminBijouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bijoux=Bijou::paginate(10);
        return view('admin.bijoux.index',compact('bijoux'));
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
    public function show(Bijou $bijou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bijou $bijou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bijou $bijou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bijou $bijou)
    {
        //
    }
}

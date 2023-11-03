<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOccupations = Occupation::all();

        return view('/occupation/indexOccupation', [
            'allOccupations' => $allOccupations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/occupation/create_occupation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $datos)
    {
        $new1=new Occupation();

        $new1->occupation_code=$datos->occupation_code;
        $new1->occupation_name=$datos->occupation_name;
        $new1->description=$datos->description;

        $new1->save();

        return redirect()->route('occupations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Occupation $occupation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Occupation $occupation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Occupation $occupation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Occupation $occupation)
    {
        //
    }
}

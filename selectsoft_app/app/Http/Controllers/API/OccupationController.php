<?php

namespace App\Http\Controllers\API;

use App\Models\Occupation;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $occupations = Occupation::all();
        if ($occupations->isEmpty()) {
            return response()->json(404);
        }
        return response()->json([
            'occupations'=> $occupations
        ], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse{
        $occupation = new Occupation();

        $occupation->occupation_code = $request->occupation_code;
        $occupation->occupation_name = $request->occupation_name;
        $occupation->description = $request->description;
        
        $occupation->save();
        return response()->json([
            'message'=>"La ocupacion se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $occupation = Occupation::where('id', $id)->first();
        if (empty($occupation)) {
            return response()->json([ 'message' => 'Ocupacion no encontrada' ], 404);
        }
        return response()->json($occupation, 200);
    }

}

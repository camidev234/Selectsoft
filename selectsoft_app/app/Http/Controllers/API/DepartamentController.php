<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse{
        $departaments = Departament::all();
        if ($departaments->isEmpty()) {
            return response()->json(404);
        }
        return response()->json([
            'departaments'=> $departaments
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse{
        $departament = new Departament();

        $departament->departament_name = $request->departament_name;
        $departament->country = $request->country;

        $departament->save();
        return response()->json([
            'message'=>"El departamento se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $departament = Departament::where('id', $id)->first();
        if (empty($departament)) {
            return response()->json([ 'message' => 'Departamento no encontrado' ], 404);
        }
        return response()->json($departament, 200);
    }

}

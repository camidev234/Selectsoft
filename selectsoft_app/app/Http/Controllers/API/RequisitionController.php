<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $requisitions = Requisition::all();
        if ($requisitions->isEmpty()) {
            return response()->json(404);
        }
        return response()->json([
            'requisitions'=> $requisitions
        ], 200);
    }
    
    public function store(Request $request):JsonResponse{
        $requisition = new Requisition();

        $requisition->occupation_id = $request->occupation_id;
        $requisition->description = $request->description;
        $requisition->function = $request->function;
        $requisition->denomination = $request->denomination;
        $requisition->skills = $request->skills;
        $requisition->knowledge = $request->knowledge;

        $requisition->save();
        return response()->json([
            'message'=>"La requisicion se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $requisition = Requisition::where('id', $id)->first();
        if (empty($requisition)) {
            return response()->json([ 'message' => 'Requisicion no encontrada' ], 404);
        }
        return response()->json($requisition, 200);
    }

    
}

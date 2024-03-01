<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index():JsonResponse{
        $cities = City::all();
        if ($cities->isEmpty()) {
            return response()->json(404);
        }

        return response()->json([
            'cities'=> $cities
        ], 200);
    }

    public function store(Request $request):JsonResponse{
        $city = new City();

        $city->city_name = $request->city_name;
        $city->departament_id = $request->departament_id;

        $city->save();
        return response()->json([
            'message'=>"La ciudad se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $city = City::where('id', $id)->first();
        if (empty($city)) {
            return response()->json([ 'message' => 'Ocupacion no encontrada' ], 404);
        }
        return response()->json($city, 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse{
        $countries = Country::all();
        if ($countries->isEmpty()) {
            return response()->json(404);
        }
        return response()->json([
            'countries'=> $countries
        ], 200);
    }

    public function store(Request $request):JsonResponse{
        $country = new Country();

        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;

        $country->save();
        return response()->json([
            'message'=>"El pais se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $country = Country::where('id', $id)->first();
        if (empty($country)) {
            return response()->json([ 'message' => 'Pais no encontrado' ], 404);
        }
        return response()->json($country, 200);
    }

}

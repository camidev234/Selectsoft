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
}
 
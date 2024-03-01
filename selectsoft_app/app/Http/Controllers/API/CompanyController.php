<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse{
        $companies = Company::all();
        if ($companies->isEmpty()) {
            return response()->json([
                'message'=> "No se encontraron datos"
            ], 404);
        }
        return response()->json([
            'companies' =>$companies
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse{
        $company = new Company();

        $company->nit = $request->nit;
        $company->business_name = $request->business_name;
        $company->phone = $request->phone;
        $company->country_id = $request->country_id;
        $company->city_id = $request->city_id;
        $company->email = $request->email;
        $company->address = $request->address;

        $company->save();
        return response()->json([
            'message'=>"La compañia se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $company = Company::where('id', $id)->first();
        if (empty($company)) {
            return response()->json([ 'message' => 'Compañia no encontrada' ], 404);
        }
        return response()->json($company, 200);
    }

}

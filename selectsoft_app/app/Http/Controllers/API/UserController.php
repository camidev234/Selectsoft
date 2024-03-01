<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse{
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json(404);
        }
        return response()->json([
            'users'=> $users
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse{
        $user = new User();

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->document_type_id = $request->document_type_id;
        $user->number_document = $request->number_document;
        $user->telephone = $request->telephone;
        $user->phone_number = $request->phone_number;
        $user->adress = $request->adress;
        $user->id_country = $request->id_country;
        $user->id_departament = $request->id_departament;
        $user->id_city = $request->id_city;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        
        $user->save();
        return response()->json([
            'message'=>"El usuario se ha creado correctamente"
        ], 201);
    }

    public function getById($id) {
        $user = User::where('id', $id)->first();
        if (empty($user)) {
            return response()->json([ 'message' => 'Usuario no encontrado' ], 404);
        }
        return response()->json($user, 200);
    }
}
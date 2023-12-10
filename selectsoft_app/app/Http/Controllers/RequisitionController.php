<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Occupation;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisitionController extends Controller
{
    public function index()
    {
        $requisitions = Requisition::all();
        $user = Auth::user();
        $role_id = optional($user)->role_id;
        return view('requisition.index', compact('requisitions', 'user', 'role_id'));
    }

    public function create()
    {
        $occupations = Occupation::all();
        $users = User::all();
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('requisition.create', compact('occupations', 'user', 'role_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'occupation_id' => 'required|exists:occupations,id',
            'description' => 'required|string',
            'function' => 'required|string',
            'denomination' => 'required|string',
            'skills' => 'required|string',
            'knowledge' => 'required|string',
        ]);
    
        // Crear la requisición
        $requisition = new Requisition([
            'occupation_id' => $request->input('occupation_id'),
            'description' => $request->input('description'),
            'function' => $request->input('function'),
            'denomination' => $request->input('denomination'),
            'skills' => $request->input('skills'),
            'knowledge' => $request->input('knowledge'),
        ]);
    
        // Almacenar la requisición en la base de datos
        $requisition->save();

        return redirect()->route('requisition.index');
    }

    public function edit(Requisition $requisition)
    {
        $user = Auth::user();
        $role_id = $user->role_id;

        // Obtén datos relacionados para prellenar el formulario
        $occupations = Occupation::all();
        $currentOccupation = $requisition->occupation;

    return view('requisitions.edit', [
        'user' => $user,
        'role_id' => $role_id,
        'occupations' => $occupations,
        'currentOccupation' => $currentOccupation,
        'requisition' => $requisition,
    ]);
    }

    public function update(Request $request, Requisition $requisition)
    {
        // Validar y actualizar la requisición en la base de datos
        // ...

        return redirect()->route('requisition.index');
    }

    public function destroy(Requisition $requisition)
    {
        $requisition->delete();
        return redirect()->route('requisition.index');
    }
}

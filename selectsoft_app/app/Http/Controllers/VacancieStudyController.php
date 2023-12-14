<?php

namespace App\Http\Controllers;

use App\Models\study_level;
use App\Models\study_status;
use App\Models\Vacancie_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vacancie;
use Illuminate\Contracts\View\View;

class VacancieStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancieStudies = Vacancie_study::all();
        $studyLevels = study_level::all();
        $studyStatuses = study_status::all();
        $users = User::all();
        $user = Auth::user();
        $role_id = $user->role_id;
        return view('vacancie_studies.index', compact('vacancieStudies', 'studyLevels', 'studyStatuses',  'user', 'role_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vacancie $vacancie) :View
    {
        $levels = study_level::all();
        $statuses = study_status::all();
        $users = User::all();
        $user = Auth::user();
        $role_id = $user->role_id;

        return view('vacancie_studies.create', compact('levels', 'statuses',  'user', 'role_id', 'vacancie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Vacancie $vacancie)
    {
        $newStudy = new Vacancie_study();

        $newStudy->study_level_id = $request->study_level_id;
        $newStudy->study_status_id = $request->study_status_id;
        $newStudy->study_name = $request->study_name;
        $newStudy->points = $request->points;
        $newStudy->vacancie_id = $vacancie->id;

        $newStudy->save();

        return redirect()->route('vacancie_studies.index')->with('success', 'Estudio de vacante creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancie_study $vacancie_study)
    {
        $vacancie_study = Vacancie_study::findOrFail($vacancie_study);
        return view('vacancie_studies.show', compact('vacancieStudies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancie_study $vacancie_study)
    {
        $studyLevels = study_level::all();
        $studyStatuses = study_status::all();

        return view('vacancie_studies.edit', compact('vacancie_study', 'studyLevels', 'studyStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancie_study $vacancie_study)
    {
        $request->validate([
            'study_level_id' => 'required',
            'study_status_id' => 'required',
            'study_name' => 'required',
            'points' => 'required',
        ]);

        $vacancie_study = Vacancie_study::findOrFail($vacancie_study);
        $vacancie_study->update($request->all());

        return redirect()->route('vacancie_studies.index')->with('success', 'Estudio de vacante actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancie_study $vacancieStudy)
    {
        $vacancieStudy->delete();

        return redirect()->route('vacancie_studies.index')->with('success', 'Estudio de vacante eliminado correctamente');
    }
}

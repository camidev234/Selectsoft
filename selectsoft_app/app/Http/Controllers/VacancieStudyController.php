<?php

namespace App\Http\Controllers;

use App\Models\study_level;
use App\Models\study_status;
use App\Models\Vacancie;
use App\Models\Vacancie_study;
use Illuminate\Http\Request;

class VacancieStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancieStudies = Vacancie_study::all();
        return view('vacancie_studies.index', compact('vacancieStudies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyLevels = study_level::all();
        $studyStatuses = study_status::all();
        $vacancies = Vacancie::all();

        return view('vacancie_studies.create', compact('studyLevels', 'studyStatuses', 'vacancies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'study_level_id' => 'required',
            'vacancie_id' => 'required',
            'study_status_id' => 'required',
            'study_name' => 'required',
            'points' => 'required',
        ]);

        Vacancie_study::create($request->all());

        return redirect()->route('vacancie_studies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancie_study $vacancie_study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancie_study $vacancie_study)
    {
        $studyLevels = study_level::all();
        $studyStatuses = study_status::all();
        $vacancies = Vacancie::all();

        return view('vacancie_studies.edit', compact('vacancieStudy', 'studyLevels', 'studyStatuses', 'vacancies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancie_study $vacancie_study)
    {
        $request->validate([
            'study_level_id' => 'required',
            'vacancie_id' => 'required',
            'study_status_id' => 'required',
            'study_name' => 'required',
            'points' => 'required',
        ]);

        $vacancie_study->update($request->all());

        return redirect()->route('vacancie_studies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancie_study $vacancie_study)
    {
        $vacancie_study->delete();

        return redirect()->route('vacancie_studies.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Instructor;
use App\Models\Recruiter;
use App\Models\Selector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexListCandidates() :View
    {
        $user = Auth::user();
        $candidates = Candidate::all();

        return view('/instructor/adminPanelC', [
            'user' => $user,
            'candidates' => $candidates
        ]);
    }

    public function indexListRecruiters() {
        $user = Auth::user();
        $recruiters = Recruiter::all();

        return view('/instructor/adminPanelR',[
            'user' => $user,
            'recruiters' => $recruiters
        ]);
    }

    public function indexListSelectors() {
        $user = Auth::user();
        $selectors = Selector::all();

        return view('/instructor/adminPanelS', [
            'user' => $user,
            'selectors' => $selectors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $candidate = Candidate::findOrFail($id);

        return view('/instructor/panelEditC',[
            'user' => $user,
            'candidate' => $candidate,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $instructor=Instructor::findOrFail($id);
        $instructor->role_id=$request->role_id;

        $instructor->save();

        return redirect()->route('instructor.editC', ['id' => $instructor->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}

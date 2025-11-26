<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\UserSkillOffered;
use App\Models\UserSkillWanted;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catg = Skill::all();
        return view("skill.listSkill", ["catg" => $catg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255|unique:skills',
            
        ]);

        $skill = Skill::create([
            'label' => $request->input("label")
        ]);

        return redirect("/skill");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        return view("skill.create");
    }

    public function edit(string $id)
    {
        $skill = Skill::find($id);
        return view("skill.edit",["skill" => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valid = $request->validate([
            'label' => ['required','string','max:255',Rule::unique('skills')->ignore($id)],
        ]);
        $userTarg = Skill::find($id);
        $userTarg->label = $valid['label'];
        $userTarg->save();
        return redirect("/skill");
    }

}

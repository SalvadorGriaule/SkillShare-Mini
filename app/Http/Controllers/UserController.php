<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\UserSkillOffered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile(Request $request): View
    {
        $user = $request->user();
        $info = User::with("listSkillOffered")->find($user->id);

        return view('user.profile', [
            'info' => $info,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.subscribe');
    }

    public function public(string $id)
    {
        $public = User::with("listSkillOffered")->find($id);

        return view("user.public",['public' => $public]);
    }

    public function liste()
    {
        $list = User::all();

        return view('user.listUser', ['liste' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pseudo' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('pseudo'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect("/skill");
    }

    /**
     * Display the specified resource.
     */
    public function login(User $user)
    {
        return view('user.auth');
    }

    public function auth(Request $request): RedirectResponse
    {
        $cred = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('user.edit',["info" => $user]);
    }

    public function addSkill(){
        $skill = Skill::all();
        return view('user.addSkill',["skills" => $skill]);
    }

    public function skillAdded(Request $request)  {
        $user = $request->user();
        
        $skill = UserSkillOffered::create([
            'skill_id' => $request->input('skill'),
            'user_id' => $user->id,
        ]);

        return redirect('/profile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $valid = $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($request->user()->id)],
            'name' => ['required', 'string', Rule::unique('users')->ignore($request->user()->id)],
        ]);
        $user = $request->user();
        $userTarg = User::find($user->id);
        $userTarg->email = $request->input('email');
        $userTarg->save();

        return redirect('/profile');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

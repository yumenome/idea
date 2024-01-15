<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function show(User $user)
    {
        app()->setLocale(session()->get('locale'));

        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $editing = true;

        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user,Request $request)
    {
        app()->setLocale(session()->get('locale'));

        $this->authorize('update', $user);

        $validated = request()->validate([
            'name' => 'required | max: 255',
            'bio' => 'nullable | max:255',
            'img' => 'image',
        ]);

        if(request()->has('img')){

            $imgPath = $request->file('img')->store('profile', 'public');
            $validated['img'] = $imgPath;

            Storage::disk('public')->delete($user->img ?? '');
        }

        $user->update($validated);

        return redirect()->route('profile');
    }


    public function profile(){

        $user = auth()->user();

        app()->setLocale(session()->get('locale'));

        return $this->show($user); //callback show() function with current user
    }

}

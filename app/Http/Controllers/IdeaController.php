<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{

    function show(Idea $idea){
        app()->setLocale(session()->get('locale'));

        return view('components.show_idea', compact('idea')); //same as  'idea' => $idea
    }

    function store(){
        app()->setLocale(session()->get('locale'));

        $validated = request()->validate([
            'content' =>'required | max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created Successfully');
    }

    function destroy(Idea $idea){

        // used policy
        $this->authorize('delete', $idea);

        // $idea = Idea::where('id', $id)->firstOrFail(); //to prevent error if u try to delete same idea at the same time
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted Successfully');
    }

    function edit(Idea $idea){
        app()->setLocale(session()->get('locale'));

        //with auth middelware
        // if(auth()->id() !== $idea->user_id){
        //     abort(403);
        // }

        //with gate
        if(Gate::denies('idea-edit', $idea)){
            abort(403);
        }

        //gate_2
        // $this->authorize('idea-edit', $idea);

        $editing = true;

        return view('components.show_idea', compact('idea', 'editing'));
    }

    function update(Idea $idea){
        app()->setLocale(session()->get('locale'));

        request()->validate([
            'form_input' =>'required | max:255',
        ]);

        $idea->content = request()->get('form_input');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated Successfully');
    }
}

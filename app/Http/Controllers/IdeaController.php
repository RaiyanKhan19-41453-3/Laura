<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IdeaController extends Controller
{


    public function index(Idea $idea){
        return view('ideas.show', compact('idea'));
    }


    public function store(){

        $validated = request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        $idea = Idea::create([
            'content' => $validated['idea'],
            'user_id' => $validated['user_id']
        ]);

        // $idea = Idea::create(
        //     [
        //         'content' => request()->get('idea', '')
        //     ]
        // );


        // $idea = new Idea([
        //     'content' => request()->get('idea', '')
        // ]);
        // $idea->save();


        // $idea = new Idea();
        // $idea->content = "test";
        // $idea->save();

        // dump(Idea::all());

        return redirect()->route('dashboard.index')->with('success', 'Idea succefully created');
    }

    public function destroy(Idea $idea){
        $idea->delete();
        //Idea::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('dashboard.index')->with('success', 'Idea succefully deleted');
    }

    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){
        $validated = request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $idea->update($validated);

        // $idea->content = request()->get('idea', '');

        // $idea->save();
        return redirect()->route('dashboard.index')->with('success', 'Idea successfully updated');
    }
}

<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $projects = Project::where('user_id', $id)
            ->orWhere('share_1_id', $id)
            ->orWhere('share_2_id', $id)
            ->orWhere('share_3_id', $id)
            ->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $relatedVar = User::all()->where('id','<>',auth()->id() );
        return view('projects.create',compact('relatedVar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $project= new Project();
        $user = User::where('user_id', $id);
        $project->nome_progetto = $request->input('name');
        $project->descrizione_progetto = $request->input('description');
        $project->user_id = $id;
        $project->share_1_id = $request->input('related_id1');
        $project->share_2_id = $request->input('related_id2');
        $project->share_3_id = $request->input('related_id3');


        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nome_progetto' => 'required',
            'descrizione_progetto' => 'required',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success','Progetto aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success','Progetto eliminato con successo');
    }
}

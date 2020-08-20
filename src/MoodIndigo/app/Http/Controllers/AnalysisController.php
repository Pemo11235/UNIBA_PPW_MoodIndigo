<?php

namespace App\Http\Controllers;

use App\Analysis;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
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
      //  dd($projects);
//        $projects = Project::all()->where('user_id', $id )->get();
        $analyses_all = Analysis::all();
        $analyses = collect(new Analysis());
        foreach ($projects as $project) {
            foreach ($analyses_all as $analysis) {
                if($project->id == $analysis->project_id )
                    $analyses = Analysis::where('project_id', $analysis->project_id)->get();
            }
        }



            return view('analyses.index')->with( compact('analyses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $relatedVar = $projects = Project::where('user_id', $id)
            ->orWhere('share_1_id', $id)
            ->orWhere('share_2_id', $id)
            ->orWhere('share_3_id', $id)
            ->get();
        return view('analyses.create',compact('relatedVar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $id = Auth::id();
//        $user = User::where('user_id', $id);
        $analysis= new Analysis();

        $analysis->nome_video = $request->input('name');
        $analysis->descrizione_video = $request->input('description');
        $analysis->project_id = $request->input('related_id');


        $analysis->save();
        return redirect()->route('analysis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function show(Analysis $analysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function edit(Analysis $analysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analysis $analysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analysis $analysis)
    {
        //dd($analysis);
       Analysis::where('id', $analysis->id)->delete();
      //  $analysis->delete();

        return redirect()->route('analysis.index')
            ->with('success','Analisi  eliminata con successo');
    }
}

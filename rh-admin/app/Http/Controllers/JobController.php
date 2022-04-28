<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    
    public function index()
    {
        $jobs = Job::all()->sortBy('section_id');
        // return dd($jobs);

        return view('admin.jobs.index', compact('jobs'));
    }
    
    public function create()
    {
        $sections = Section::all();
        return view('admin.jobs.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $job = new Job();

        $job->name = $request->name;
        $job->section_id = $request->department;
        $job->save();

        return Redirect::to('admin/jobs')
        ->with('alta','ok')
        ->with('notice', 'Información del puesto agregada correctamente.');
    }
    
    public function show(Job $job)
    {
        
    }
    
    public function edit(Job $job)
    {
        $sections = Section::all();
        return view('admin.jobs.edit', compact('job','sections'));
    }
    
    public function update(Request $request, Job $job)
    {
        $job->name = $request->name;
        $job->section_id = $request->department;
        $job->save();

        return Redirect::to('admin/jobs')
        ->with('edited','ok')
        ->with('notice', ('Información del puesto actualizada correctamente.'));
    }
    
    public function destroy(Job $job)
    {
        $job->delete();
        
        return Redirect::to('admin/jobs')
        ->with('eliminar','ok')
        ->with('notice', 'Información del puesto eliminada correctamente.');
    }
}

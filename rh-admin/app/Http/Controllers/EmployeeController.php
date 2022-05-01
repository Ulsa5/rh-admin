<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Genders;
use App\Models\Job;
use App\Models\Municipality;
use App\Models\Poligraph;
use App\Models\Project;
use App\Models\Verification;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::all();
        $projects = Project::all();
        $jobs = Job::all();
        $municipalities = Municipality::all();
        $departments = Department::all();
        $genders = Genders::all();
        // dd($genders);
        return view('admin.employees.index', compact('employees','projects','jobs','municipalities','departments','genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // $verification = Verification::Find($employee);
        // return view('admin.employees.show', compact('employee','verification'));
        // // dd($employee);

        $verification = Verification::
            join('employees', 'employees.id', '=', 'verifications.employee_id')
            ->select('verifications.*', 'employees.name')
            ->where('employees.id', '=', $employee->id)
            ->get();

        $poligraph = Poligraph::
            join('employees', 'employees.id', '=', 'poligraphs.employee_id')
            ->select('poligraphs.*', 'employees.name')
            ->where('employees.id', '=', $employee->id)
            ->get();

        $comment = Comment::
            join('employees', 'employees.id', '=', 'comments.employee_id')
            ->select('comments.*', 'employees.name')
            ->where('employees.id', '=', $employee->id)
            ->get();

            // dd($verification);
            
            return view('admin.employees.show', compact('employee','verification','poligraph','comment'));

            

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Emp;
use Illuminate\Http\Request;
use App\http\Requests\empRequest;
use App\http\Requests\empUpdate;
class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Emps = Emp::all();
        return view('emp.index', compact('Emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('emp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empRequest $request)
    {
        $category = Emp::create([
            'emp_name' =>$request->emp_name ,
            'emp_mobile' =>$request->emp_mobile,
            'emp_email' =>$request->emp_email,
            'emp_address' =>$request->emp_address
        ]);
            session()->flash('success','Emp Added succesfullly');
        //  return redirect()->back();
        return redirect(route('emps.index'));
    }


    function saveEmp(empRequest $request) {
        $category = Emp::create([
            'emp_name' =>$request->emp_name ,
            'emp_mobile' =>$request->emp_mobile,
            'emp_email' =>$request->emp_email,
            'emp_address' =>$request->emp_address
        ]);
        return [
            'data' => $category
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        return view('emp.create')->with('emp', $emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(empUpdate $request, Emp $emp)
    {
        $emp->update([
            'emp_name' =>$request->emp_name ,
            'emp_mobile' =>$request->emp_mobile,
            'emp_email' =>$request->emp_email,
            'emp_address' =>$request->emp_address
        ]);
       session()->flash('update_success', 'Updated emp successfully');
       return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        $deleted = $emp->delete();
        session()->flash('success', 'Category delete suceessfully');
        return redirect()->back();
    }
    public function getemps(){
        $Emps = Emp::all();
        print_r($Emps);

    }
    public function getparticular_emp($id){
        $getemp = Emp::find($id);
        print_r($getemp);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(10);
        return view('admin.department.index', compact('departments'));
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
        $request->validate([
            'department' => 'required',
            'code'       => 'required',
        ]);
    //    $user = auth()->user();

       $department = new Department();
       $department->name = $request->department;
       $department->code = $request->code;
       $department->save();
       return back()->with('success', 'Added New Department Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required',
            'code'       => 'required',
        ]);
       $user = auth()->user();

       $department = Department::find($id);
       $department->name = $request->department;
       $department->code = $request->code;
       $department->save();
       return back()->with('success', 'Updated Department Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return back()->with('error', 'Department Deleted Succussfuly!');
    }
    public function storeCsv(Request $request){
        $request->validate([
            'csvFile' => 'required',
        ]);
        $csvFile = $request->csvFile;
        
        $csvFile = fopen($csvFile, 'r');
        $csv = [];

        while(($line = fgetcsv($csvFile)) !== FALSE){
            $csv[] = $line;
        }
        fclose($csvFile);
        $data = [];
        // dd($csv[0]);
        foreach($csv as $row_num => $row){
            // return $$row_num[0];
            if($row_num == 0){
                continue;
            }
            $data[] = [
                'name'         => $row[0],
                'code'          => $row[1],
            ];
        }
        Department::upsert(
            $data,
            [
                'code',
            ],
            [
                
                'name',
            ]

        );
        return back()->with('success',' Uploaded Department File Successfuly!');
    }
}

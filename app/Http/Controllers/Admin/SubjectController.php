<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $subjects = Subject::paginate(10);
        return view('admin.subjects.index', compact('subjects', 'departments'));
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
            'course_code'       => 'required',
            'course_title'      => 'required',
            'department_code'     => 'required',
        ]);
        
        $subject = new Subject;
        $subject->department_code = $request->department_code;
        $subject->course_title = $request->course_title;
        $subject->course_code = $request->course_code;
        // return $subject;
        $subject->save();
        return back()->with('success', 'The new subject created successfully!');
        

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
            'course_code'       => 'required',
            'course_title'      => 'required',
            'department_code'     => 'required',
        ]);
        
        $user = auth()->user();
        $subject = Subject::find($id);
        $subject->department_code = $request->department_code;
        // $subject->user_id = $user->id;
        $subject->course_title = $request->course_title;
        $subject->course_code = $request->course_code;
        $subject->save();
        return back()->with('success', 'The new subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return back()->with('error', 'The subject deleted successfully!');

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
        foreach($csv as $row_num => $row){
            // return $$row_num[0];
            if($row_num == 0){
                continue;
            }
            $data[] = [
                'department_code'         => $row[0],
                'course_title'            => $row[1],
                'course_code'             => $row[2],

            ];
        }
        Subject::upsert(
            $data,
            [
                'course_code',
            ],
            [
                
                'department_code',
                'course_title',
            ]

        );
        return back()->with('success',' Uploaded Subject File Successfuly!');
    }
}

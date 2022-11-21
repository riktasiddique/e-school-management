<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.admin-panel');
    }
    public function addTeacher(){
        $teachers = Teacher::paginate(10);
        return view('admin.add_teachers', compact('teachers'));
    }
    public function addTeacherStore(Request $request){
        $request->validate([
            'csvFile' => 'required',
        ]);

        $csvFile = $request->csvFile;
        
        $TeacherFile = fopen($csvFile, 'r');
        $csv = [];

        while(($line = fgetcsv($TeacherFile)) !== FALSE){
            $csv[] = $line;
        }
        fclose($TeacherFile);
        // dd($csv[0]);
        $data = [];
        foreach($csv as $row_num => $row){
            // return $$row_num[0];
            if($row_num == 0){
                continue;
            }
            $data[] = [
                'name'            => $row[0],
                'department'      => $row[1],
                'email'           => $row[2],
                'join_id'         => $row[3],

            ];
        }
        Teacher::upsert(
            $data,
            [
                'join_id',
            ],
            [
                
                'department',
                'email',
                'name'
            ]

        );
        return back()->with('success',' Uploaded Teachers Info Successfuly!');
    }
    
}

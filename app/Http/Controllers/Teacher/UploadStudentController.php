<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class UploadStudentController extends Controller
{
    public function addStudent(){
        $students = Student::paginate(10);
        return view('teacher.add_student', compact('students'));
    }
    public function studentList(){
        return view('teacher.student-list');
    }
    public function addStudentStore(Request $request){
        // return $request->all();
        $validated = $request->validate([
            'csvFile' => 'required',
        ]);
        $user_id = auth()->id();
        $csvFile = $request->file('csvFile');
        $path_1  = $csvFile? Storage::url($request->file('csvFile')->store('/student'. $user_id)) : '';
        $studentFile = fopen($csvFile, 'r');
        $csv = [];
        while (  ( $line = fgetcsv( $studentFile ) ) !== FALSE ) {
            $csv[] = $line;
        }
        fclose( $studentFile );

        // dd( $csv[0] );
        $data = [];
        foreach($csv as $row_num => $row){
            if($row_num == 0){
                continue;
            }
            $data[] =[
                'name'          => $row[0],
                'batch_id'      => $row[1],
                'section'       => $row[2],
            ];
        }
        Student::upsert(
            $data,
            [
                'batch_id',
            ],
            [
                
                'name',
                'section'
            ]

        );
        return back()->with('success', 'Added Student Info successfuly!');

    }
}

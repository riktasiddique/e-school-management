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
        return view('admin.student.add_student', compact('students'));
    }
    public function addStudentStore(Request $request){
        // return $request->all();
        $validated = $request->validate([
            'csvFile' => 'required',
        ]);
        $user_id = auth()->id();
        $csvFile = $request->file('csvFile');
        // $path_1  = $csvFile? Storage::url($request->file('csvFile')->store('/student'. $user_id)) : '';
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
                
                'name'               => $row[0],
                'email'              => $row[1],
                'date_of_birth'      => $row[2],
                'sub_1'              => $row[3],
                'sub_2'              => $row[4],
                'sub_3'              => $row[5],
                'sub_4'              => $row[6],
                'student_id'         => $row[7],
            ];
        }
        // return $data;
        Student::upsert(
            $data,
            [
                'student_id',
            ],
            [
                'name',
                'name',
                'date_of_birth',
                'sub_1',
                'sub_2',
                'sub_3',
                'sub_4',
            ]

        );
        return back()->with('success', 'Added Student Info successfuly!');

    }
    public function viewSubject($id){
        $student = Student::find($id);
        return view('admin.student.view-student-subjects', compact('student'));
    }
}

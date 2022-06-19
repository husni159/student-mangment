<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =  Student::all();
     
        return view('student.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Method1
    //    $student = new Student;
    //    $student->name = $request->name;
    //    $student->age = $request->age;
    //    $student->gender = $request->gender;
    //    $student->report_teacher = $request->teacher;
    //    $student->created_at = date('Y-m-d H:i:s');
    //    $student->updated_at = date('Y-m-d H:i:s');
    //    $student->save();

        //Method2
    // $student = Student::make([
    //     "name" => $request->name,
    //    "age" => $request->age,
    //    "gender" => $request->gender,
    //    "report_teacher" => $request->teacher,
    //    "created_at" => date('Y-m-d H:i:s'),
    //    "updated_at" => date('Y-m-d H:i:s')
    // ]);
    //    $student->save();

    //Method3
    $student = Student::create([
        "name" => $request->name,
       "age" => $request->age,
       "gender" => $request->gender,
       "report_teacher" => $request->teacher,
       "created_at" => date('Y-m-d H:i:s'),
       "updated_at" => date('Y-m-d H:i:s')
    ]);
       return redirect('student');
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
        dd('sdfsf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id)->first();
        
        return view('student.edit')->with('students',  $student);
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
        $student = Student::where('id', $id)->update([
            "name" => $request->name,
           "age" => $request->age,
           "gender" => $request->gender,
           "report_teacher" => $request->teacher,
           "updated_at" => date('Y-m-d H:i:s')
        ]);
           return redirect('student');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('student');
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Marks;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Marks::join('students','students.id','=', 'marks.std_id')
                        ->get(['students.*','marks.*']);
                     
        return view('marks.index',['marks' => $marks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $student = Student::all();
        $student = Student::select('*')->whereNotIn('id',function($query) {
            $query->select('std_id')->from('marks');
         })->get();
        return view('marks.create',['students' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mark = Marks::create([
           "std_id"     => $request->std_id,
           "maths"      => $request->maths,
           "science"    => $request->science,
           "history"    => $request->history,
           "term"       => $request->term,
           "total"      => ($request->maths + $request->science + $request->history),
           "created_at" => date('Y-m-d H:i:s'),
           "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect('mark')->with('success', 'Marks has been added');;        
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
        $student = Marks::join('students','students.id','=', 'marks.std_id')
        ->where('marks.id', $id)->get(['students.*','marks.*'])->first();
      
        return view('marks.edit')->with('students',  $student);
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
        $student = Marks::where('id', $id)->update([
            "maths"      => $request->maths,
            "science"    => $request->science,
            "history"    => $request->history,
            "term"       => $request->term,
            "total"      => ($request->maths + $request->science + $request->history),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
           return redirect('mark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Marks::find($id);
        $student->delete();
        return redirect('mark');
    }
}

@extends('layouts.app')

@section('content')
  <a href="student/create" class="btn btn-primary border " style="float: right;margin-bottom:10px;">Add new student</a>
<table>
  <tr>
   <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Reporting Teacher</th>
    <th>Action</th>
  </tr>
  
  @php 
  $i = 1
  @endphp
  @foreach ($students as $student)
  <tr>
    <td>{{ $i }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->age }}</td>
    <td>{{ $student->gender }}</td>
    <td>{{ $student->report_teacher }}</td>
    <td>
    <a href="student/{{ $student->id }}/edit">Edit</a>/
      <form action="/student/{{ $student->id }}" class="" method="POST"> 
        @csrf 
        @method('delete')
        <button
          type="submit" >Delete
        </button>
      </form>    
  </td>
  </tr>
  @php $i++; @endphp
  @endforeach
</table>

@endsection
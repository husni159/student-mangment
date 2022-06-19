@extends('layouts.app')

@section('content')
 <div class="flex text-center pt-20" style="margin-bottom:300px;margin-left:300px;margin-right:300px;margin-top:150px;">
    <h1 class="text-5xl uppercase bold"> Add Student </h1>
    <form action="/student" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="std-name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group col-md-6">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
            </div>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="radio" id="html" name="gender" value="M" required>
              <label for="html">Male</label>
              <input type="radio" id="css" name="gender" value="F">
              <label for="css">Female</label>
        </div>
        <div class="form-group">
            <label for="teacher">Reporting Teacher</label>
            <input type="text" class="form-control" id="teacher" name="teacher" placeholder="Reporting Teacher" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
 
@endsection
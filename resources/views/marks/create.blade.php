@extends('layouts.app')

@section('content')
 <div class="flex text-center pt-20" style="margin-bottom:300px;margin-left:300px;margin-right:300px;margin-top:150px;">
  
    @if(!empty($students->first()))
    <h1 class="text-5xl uppercase bold"> Add Mark </h1>
    <form action="/mark" method="POST" id="form">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Select Student</label>
                <select class="form-control" name="std_id" id="std_id">                    
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Select Term</label>
                <select class="form-control" name="term" id="term">
                    <option value="One">One</option>
                    <option value="Two">Two</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="teacher">Enter Marks</label>
            <input type="text" class="form-control pt-20 float-number" id="maths" name="maths" placeholder="Maths" style="padding-bottom:10px;" >
            </br>
            <input type="text" class="form-control pt-20 float-number" id="science" name="science" placeholder="Science" >
            </br>
            <input type="test" class="form-control pt-20 float-number" id="history" name="history" placeholder="History" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @else
    <p class="bg-danger text-white p-1">No new students found to add mark</p> 
    @endif
 </div>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
    $(document).ready(function () {
    $('.float-number').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
    $('#form').validate({ // initialize the plugin
        rules: {
            maths: {
                required: true,
                maxlength: 3
            },
            science: {
                required: true,
                maxlength: 3
            },
            history: {
                required: true,
                maxlength: 3
            }
        }
    });
});
</script>
@endsection
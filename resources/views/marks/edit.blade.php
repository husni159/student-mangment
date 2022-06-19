@extends('layouts.app')

@section('content')
 <div class="flex text-center pt-20" style="margin-bottom:300px;margin-left:300px;margin-right:300px;margin-top:150px;">
    <h1 class="text-5xl uppercase bold"> ADD STUDENT </h1>
    <form action="/mark/{{ $students->id }}/ " method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Select Student</label>
                <span  class="form-control pt-20 float"  placeholder=""  disabled>{{ $students->name }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Select Term</label>
                <select class="form-control" name="term" id="term">
                @if($students->term =='One')    
                    <option value="One" selected>One</option>
                @else
                    <option value="One">One</option>
                @endif
                @if($students->term =='Two')  
                    <option value="Two" selected>Two</option>
                @else
                    <option value="Two">Two</option>
                @endif                
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="teacher"><u>Enter Marks</u></label>
            <br>Maths
            <input type="text" class="form-control pt-20 float-number" id="maths" name="maths" placeholder="Maths" style="padding-bottom:10px;" value="{{ $students->maths }}" >
            </br>
            Science
            <input type="text" class="form-control pt-20 float-number" id="science" name="science" placeholder="Science" value="{{ $students->science }}" >
            </br>
            History
            <input type="test" class="form-control pt-20 float-number" id="history" name="history" placeholder="History" value="{{ $students->history }}" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
                maxlength: 5
            },
            science: {
                required: true,
                maxlength: 5
            },
            history: {
                required: true,
                maxlength: 5
            }
        }
    });
});
</script>
@endsection
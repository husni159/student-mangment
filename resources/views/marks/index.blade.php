@extends('layouts.app')

@section('content')
  <a href="mark/create" class="btn btn-primary border " style="float: right;margin-bottom:10px;">Add Mark</a>
  <br>
<table>
  <tr>
   <th>ID</th>
    <th>Name</th>
    <th>Maths</th>
    <th>Science</th>
    <th>History</th>
    <th>Term</th>
    <th>Total Marks</th>
    <th>Created On</th>
    <th>Action</th>
  </tr>
  
  @php 
  $i = 1
  @endphp
  @foreach ($marks as $mark)
    @php 
        $created_date = date('M d, Y H:i:s A', strtotime($mark->created_at));
    @endphp
  <tr>
    <td>{{ $i }}</td>
    <td>{{ $mark->name }}</td>
    <td>{{ $mark->maths }}</td>
    <td>{{ $mark->science }}</td>
    <td>{{ $mark->history }}</td>
    <td>{{ $mark->term }}</td>
    <td>{{ $mark->total }}</td>
    
    <td>{{ $created_date }}</td>
    <td>
    <a href="mark/{{ $mark->id }}/edit">Edit</a>/
      <form action="/mark/{{ $mark->id }}" class="pt-3" method="POST"> 
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
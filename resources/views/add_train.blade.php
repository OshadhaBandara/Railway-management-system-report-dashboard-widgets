@extends('admin_layout')

@section('admincontent')

<div class="container-fluid">

    <div class="container-fluid" >
        <h1>Add Train</h1>
    
        <form action="{{route('addtraindb') }}" method="POST">
            @csrf
             {{--  new use success  & fail message --}}
            @if (Session::has('success'))

            <div class="alert alert-success">{{Session::get('success')}} </div>
                
            @endif
          
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}} </div>
            @endif
          {{--  new use success  & fail message --}}
        <div class="mb-3">
                <label for="trainId" class="form-label">Train ID</label>
                <input type="text" class="form-control" id="trainId" name="train_id" value="{{$data}}">
        </div>

          <div class="mb-3">
            <label for="trainName" class="form-label">Train Name</label>
            <input type="text" class="form-control" id="trainName" name="train_name">
            <span class="text-danger">@error('train_name') {{$message }}@enderror</span>
          </div>
  
    
          
          </div>
    
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    


</div>

@endsection
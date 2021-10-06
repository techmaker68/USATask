@extends('layout')

@section('content')





    <h2>Vertical (basic) form</h2>
    <form action="create" method="post" >
        @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
      <div class="checkbox">
        <label><input type="checkbox" name="remember"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    
@endsection
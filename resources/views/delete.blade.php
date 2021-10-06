@extends('layout')
@section('content')

<form action="delete" method="post">
    @csrf
    <label for="id"> ID</label>
<input type="text" name="id">
<button type="submit"> delete</button>



</form>
    
@endsection
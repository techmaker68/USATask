@extends('layout')

@section('content')
    <ul>


        <form action="show" method="post">
            @csrf
            <label for="id"> ID</label>
<input type="text" name="id">
<button type="submit"> find</button>

<ul>

@foreach ($user as $i)
    
<li>{{$i->email}} {{$i->password}}</li>

@endforeach

</ul>


       
     </form>

         
    




    

    

@endsection


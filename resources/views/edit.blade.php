@extends('layout')

@section('content')

<div class="container">

    <div class="jumbotron">
        <h2>Users Table</h2>
        <table class="table">
          <thead>
            <tr>
                <th>ID</th>
    
              <th>email</th>
              <th>password</th>
    
            </th>
            </tr>
          </thead>
          @foreach ($data as $item)
              
          
          <tbody>
            <tr>
                <td>{{$item->id}}</td>
    
              <td>{{$item->email}}</td>
              <td>{{$item->password}}</td>
              <td>          <th>      <button type="submit" class="btn btn-info">edit</button>
              </td>
              <td>          <th>      <button type="submit" class="btn btn-danger" onclick="registercontroller@del">delete</button>
              </td>
            </tr>
           
          
        </tbody>
        @endforeach  
    </table>


    </div>
    
  </div>

    
@endsection
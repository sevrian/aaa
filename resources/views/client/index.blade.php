@extends('theme.home')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
           {{session ('success')}}
        </div>
    @endif
    <a href="{{ route ('client.create')}}" class="btn btn-info btn-sm">Add Client</a>
    <br><br>
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          
          <th scope="col">Username</th>
          <th scope="col">Surename</th>
          <th scope="col">Prodfile_id</th>

          <th scope="col">Realm_id</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($client as $result =>$cl)
            <tr>
               <td>{{ $cl->username}}</td>
               <td>{{ $cl->surename}}</td>
               <td>{{ $cl->profile_id}}</td>
               <td>{{ $cl->realm_id}}</td>
               <td>
                  <form action="{{route('client.destroy',$cl->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route ('client.edit',$cl->id)}}" class="btn btn-primary btn-sm">Edit</a>
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
               </td>
            </tr>     
         @endforeach
                      
      
      </tbody>
    </table>
@endsection
@extends('theme.home')

@section('content')

@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>

@endif

<form action="{{ route('client.update', $client->id ) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control" name="username" value="{{ $client->username }}">
    </div>
    <div class="form-group">
      <label>Nama </label>
      <input type="text" class="form-control" name="surename" value="{{ $client->surename }}">
  </div>
    
    <div class="form-group">
        <label>Tipe User</label>
        <select class="form-control" name="profile_id">
            <option value="" holder>Pilih Tipe User</option>
            <option value="22" holder @if($client->type == 22)
                selected
                @endif
                >Dosen</option>
            <option value="23" holder @if($client->type == 23)
                selected
                @endif
                >Mahasiswa</option>
            {{-- <option value="24" holder @if($client->type == 24)
                selected
                @endif
                >Karyawan</option> --}}
        </select>
    </div>
    {{-- <div class="form-group">
      <label>Tipe Realm</label>
      <select class="form-control" name="realm_id">
          <option value="" holder>Pilih Tipe Realm</option>
          <option value="17" holder @if($client->type == 17)
              selected
              @endif
              >1G-1Day-BW-1Mbs</option>
          <option value="18" holder @if($client->type == 18)
              selected
              @endif
              >5M-every hour</option>
          
      </select>
  </div> --}}

    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update User</button>
    </div>

</form>


@endsection
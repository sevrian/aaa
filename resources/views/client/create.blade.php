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
<div class="col-8">
<form action="{{ route('client.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>User Name</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="surename">
  </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label>Profil</label>
        <select class="form-control" name="profile_id">
            <option value="" holder>Pilih Tipe client</option>
            <option value="22" holder>Dosen</option>
            <option value="23" holder>Mahasiswa</option>
            {{-- <option value="24" holder>Karyawan</option>
            <option value="25" holder>Direktur</option>
            <option value="26" holder>Pegawai</option>
            <option value="27" holder>Tamu</option>
            <option value="28" holder>Pengelola</option> --}}


        </select>
    </div>
    {{-- <div class="form-group">
      <label>Realm</label>
      <select class="form-control" name="realm_id">
          <option value="" holder>Pilih Tipe Realm</option>
          <option value="36" holder>MESHdesk</option>
          <option value="37" holder>Poltekkes</option>
      </select>
  </div> --}}

  <div class="form-group">
   <button class="btn btn-primary btn-block">Simpan User</button>
</div>

</form>
</div>
@endsection
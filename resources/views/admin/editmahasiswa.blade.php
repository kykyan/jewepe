@extends('admin.master')

@section('title', 'Data Mahasiswa')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('updatemahasiswa', $user->id) }}">
                @method('patch')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NPM</label>
                        <input type="text" class="form-control" name="npm" placeholder="NPM" maxlength="8" required="required" value="{{ $user->npm }}" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Mahasiswa" required="required" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="NPM@jewepe.ac.id" required="required" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" required="required" value="Password Tidak Dapat Diubah" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="birthplace" placeholder="Tempat Lahir" value="{{ $user->birthplace }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthdate" placeholder="Tanggal Lahir" value="{{ $user->birthdate }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Semester</label>
                        <input type="number" class="form-control" name="smst_mhs" placeholder="Semester" min="1" max="8" value="{{ $user->smst_mhs }}">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nomor Telfon</label>
                        <input type="text" class="form-control" name="phone" placeholder="08xxxxxxxxxx" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="gender">
                            @if ($user->gender == 'Perempuan')
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan" selected>Perempuan</option>    
                            @elseif ($user->gender == 'Laki-laki')
                                <option value="Laki-laki" selected>Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            @else
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat Lengkap" value="{{ $user->address }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

@endsection
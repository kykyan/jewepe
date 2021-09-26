@extends('mhs.master')

@section('title', 'Biodata')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biodata Saya</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('updatebiodata') }}" class="mb-3">
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
                        <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#resetPW">
                            Klik disini untuk me-Reset Password
                        </button>
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
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Data</button>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
<div class="modal fade" id="resetPW" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('resetpwbiodata') }}" class="mb-3">
                @method('patch')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password Baru">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
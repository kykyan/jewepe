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
            @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('storemahasiswa') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NPM</label>
                        <input type="text" class="form-control" name="npm" placeholder="NPM" maxlength="8" required="required">
                    </div>
                    <div class="form-group col-md-8">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Mahasiswa" required="required">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="NPM@jewepe.ac.id" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="birthplace" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthdate" placeholder="Tanggal Lahir">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Semester</label>
                        <input type="number" class="form-control" name="smst_mhs" placeholder="Semester" min="1" max="8">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nomor Telfon</label>
                        <input type="text" class="form-control" name="phone" placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="gender">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat Lengkap">
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
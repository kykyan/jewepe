@extends('admin.master')

@section('title', 'Data Mahasiswa')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('createmahasiswa') }}" class="btn btn-primary">Tambah Data Mahasiswa</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
            @if (session('status0'))
                <div class="alert alert-danger">
                    {{ session('status0') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

      <!-- Default box -->
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $u)
            <tr>
              <td>{{ $u->npm }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->email }}</td>
              <td>{{ $u->gender }}</td>
              <td>{{ $u->birthplace }}</td>
              <td>{{ $u->birthdate }}</td>
              <td>
                <a href="{{ route('showmahasiswa', $u->id) }}" class="badge badge-info">Detail</a>
                <a href="{{ route('showkrsmahasiswa', $u->id) }}" class="badge badge-info">KRS</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
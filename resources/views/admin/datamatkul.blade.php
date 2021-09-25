@extends('admin.master')

@section('title', 'Data Mata Kuliah')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mata Kuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('creatematkul') }}" class="btn btn-primary">Tambah Data Mata Kuliah</a>
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
              <th>Kode Mata Kuliah</th>
              <th>Nama</th>
              <th>Jumlah SKS</th>
              <th>Semester</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($matkuls as $m)
            <tr>
              <td>{{ $m->kd_matkul }}</td>
              <td>{{ $m->name }}</td>
              <td>{{ $m->sks }}</td>
              <td>{{ $m->smst_matkul }}</td>
              <td><a href="{{ route('editmatkul', $m->id) }}" class="badge badge-info">Detail</a></td>
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
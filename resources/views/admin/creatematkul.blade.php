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
            <form method="POST" action="{{ route('storematkul') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kd_matkul" placeholder="Masukkan Kode Mata Kuliah" maxlength="8" required="required">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Jumlah SKS</label>
                        <input type="number" class="form-control" name="sks" placeholder="Masukkan Jumlah SKS" required="required">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Semester</label>
                        <input type="number" class="form-control" name="smst_matkul" placeholder="1 - 8" required="required" min="1" max="8">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-12">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Mata Kuliah" required="required">
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
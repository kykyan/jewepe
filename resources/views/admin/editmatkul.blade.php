@extends('admin.master')

@section('title', 'Data Mahasiswa')

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
            <form method="POST" action="{{ route('updatematkul', $matkul->id) }}">
                @method('patch')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kd_matkul" placeholder="Masukkan Kode Mata Kuliah" maxlength="8" required="required" value="{{ $matkul->kd_matkul }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Jumlah SKS</label>
                        <input type="number" class="form-control" name="sks" placeholder="Masukkan Jumlah SKS" required="required" value="{{ $matkul->sks }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Semester</label>
                        <input type="number" class="form-control" name="smst_matkul" placeholder="1 - 8" required="required" min="1" max="8" value="{{ $matkul->smst_matkul }}">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-12">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Mata Kuliah" required="required" value="{{ $matkul->name }}">
                    </div>
                </div>
                <div class="form row">
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
            </form>
                    <button type="button" class="btn btn-danger mx-1" data-toggle="modal" data-target="#exampleModal">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('destroymatkul', $matkul->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

@endsection
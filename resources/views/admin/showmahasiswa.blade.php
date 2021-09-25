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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NPM</label>
                        <p>{{ $user->npm }}</p>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Nama</label>
                        <p>{{ $user->name }}</p>
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tempat Lahir</label>
                        <p>{{ $user->birthplace }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal Lahir</label>
                        <p>{{ date('d M Y', strtotime($user->birthdate)) }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Semester</label>
                        <p>{{ $user->smst_mhs }}</p>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nomor Telfon</label>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Jenis Kelamin</label>
                        <p>{{ $user->gender }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <p>{{ $user->address }}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <a href="{{ route('editmahasiswa', $user->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
                                        <form action="{{ $user->id }}" method="post" class="d-inline">
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

@endsection
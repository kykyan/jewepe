@extends('mhs.master')

@section('title', 'Isi KRS')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Isi KRS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Biodata</h3>
      
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                <h2 style="color: red">PASTIKAN DATA ANDA SUDAH SESUAI</h2>
                <p>Jika belum sesuai silahkan perbarui data melalui halaman <a href="{{ route('biodata') }}">Biodata</a>.</p>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>NPM</label>
                        <input type="text" class="form-control" name="npm" placeholder="Belum Diisi" maxlength="8" required="required" value="{{ $user->npm }}" disabled>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Belum Diisi" required="required" value="{{ $user->name }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="birthplace" placeholder="Belum Diisi" value="{{ $user->birthplace }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="birthdate" placeholder="Belum Diisi" value="{{ $user->birthdate }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Semester</label>
                        <input type="number" class="form-control" name="smst_mhs" placeholder="Belum Diisi" min="1" max="8" value="{{ $user->smst_mhs }}" disabled>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Nomor Telfon</label>
                        <input type="text" class="form-control" name="phone" placeholder="Belum Diisi" value="{{ $user->phone }}" disabled>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="gender" placeholder="Belum Diisi" value="{{ $user->gender }}" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address" placeholder="Belum Diisi" value="{{ $user->address }}" disabled>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Isi Kartu Rencana Studi</h3>
      
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('storekrs') }}">
                @csrf
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah SKS</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($matkul as $m)
                        <tr>
                            <td>{{ $m->kd_matkul }}</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->sks }}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" name="matkul_id[]" value="{{ $m->id }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Pilih
                                </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="col">
                      <button class="btn btn-primary btn-block" type="submit">Submit</button>
                  </div>
                </form> 
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

@endsection
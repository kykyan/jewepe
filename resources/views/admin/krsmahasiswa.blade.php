@extends('admin.master')

@section('title', 'Isi KRS')

@section('content')
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KRS Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah SKS</th>
                        <th scope="col">Semester</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($krs as $u)
                        <tr>
                            <td>{{ $u->kd_matkul }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->sks }}</td>
                            <td>{{ $u->smst_matkul }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </form> 
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

@endsection
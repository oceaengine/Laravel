@extends('template.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Mahasiswa</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Mahasiswa</h3>

                                <div class="card-tools">
                                    <div class="card-tools">
                                        @can('admin')
                                            <a href="/mahasiswa/create" class="btn btn-primary">Tambah</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                          <th>NO</th>
                                          <th>NIM</th>
                                          <th>Nama</th>
                                          <th>Program Studi</th>
                                          <th>Nomor HP</th>
                                          <th>Alamat</th>
                                          <th>Foto</th>
                                          @can('admin')
                                              <th>Aksi</th>
                                          @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $m)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $m->nim }}</td>
                                                <td>{{ $m->nama }}</td>
                                                <td>{{ $m->prodi->nama_prodi }}</td>
                                                <td>{{ $m->no_hp }}</td>
                                                <td>{{ $m->alamat }}</td>
                                                <td><img src="{{ asset('storage/' . $m->foto) }}"  width="100px" height="100px"></td>
                                                @can('admin')
                                                    <td><a href="{{ url("mahasiswa/$m->nim/edit") }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ url("mahasiswa/$m->nim") }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confrm('Yakin ingin dihapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
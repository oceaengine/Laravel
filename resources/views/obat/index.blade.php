@extends('template.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Obat</h1>
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
                                <h3 class="card-title">Data Obat</h3>

                                <div class="card-tools">
                                    <div class="card-tools">
                                        @can('admin')
                                            <a href="/obats/create" class="btn btn-primary">Tambah</a>
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
                                          <th>ID</th>
                                          <th>Nama</th>
                                          <th>Kategori</th>
                                          <th>Harga</th>
                                          <th>Quantity</th>
                                          @can('admin')
                                              <th>Aksi</th>
                                          @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obats as $o)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $o->id_obat }}</td>
                                                <td>{{ $o->nama_obat }}</td>
                                                <td>{{ $o->kategoris->nama_kategori }}</td>
                                                <td>{{ $o->harga }}</td>
                                                <td>{{ $o->quantity }}</td>
                                                @can('admin')
                                                    <td><a href="{{ url("obats/$o->id_obat/edit") }}" class="btn btn-warning">Edit</a>
                                                    <form action="{{ url("obats/$o->id_obat") }}" method="post" class="d-inline">
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
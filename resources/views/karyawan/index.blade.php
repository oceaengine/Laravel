@extends('template.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.b;ade.php">Home</a></li>
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Karyawan</h3>
@can('admin')
  <div class="card-tools">
                <td><a href="/karyawans/create" class="btn btn-primary">Tambah</a>
              </div>
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
                      <th>Nama Karyawan</th>
                      <th>Role</th>
                      @can('admin')
                        <th>Aksi</th>
                      @endcan
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($karyawans as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_pengguna }}</td>
                            <td>{{ $p->id_role }}</td>
                            @can('admin')
                              <td><a href="{{ url("karyawans/$p->id/edit") }}" class="btn btn-warning">Edit</a>
                                <form action="{{ url("karyawans/$p->id") }}" method="post"
                                  class="d-inline">
                                  @method('delete')
                                  @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
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
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
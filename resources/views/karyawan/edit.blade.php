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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Tambah Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url("karyawans/$karyawans->id") }}" method="post">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pengguna">Nama Karyawan</label>
                    <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="{{ $karyawans->nama_pengguna }}">
                </div>
                <div class="form-group">
                  <label for="id_role">Role</label>
                  <select name="id_role" id="id_role" class="form-control select2bs4 @error ('id_role') is-invalid @enderror" style="width: 100%;">
                  <option value="">Pilih Role</option> ;
                    <option selected="selected" data-select2-id="1">Admin</option>
                    <option data-select2-id="2">Apoteker</option>
                    </select>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
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
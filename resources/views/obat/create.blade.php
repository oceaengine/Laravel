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
              <li class="breadcrumb-item active">Data Obat</li>
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
                <h3 class="card-title">Tambah Obat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('obats') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="id_obat">ID</label>
                    <input type="text" name="id_obat" class="form-control @error ('id_obat') is-invalid @enderror" id="id_obat" placeholder="Masukkan ID Obat" value="{{ old('id_obat') }}">
                    @error ('id_obat')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control @error ('nama_obat') is-invalid @enderror" id="nama_obat"
                      placeholder="Masukkan Nama Obat" value="{{ old('nama_obat') }}"> @error ('nama_obat')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="id_kategori">Jenis Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control select2bs4 @error ('id_kategori') is-invalid @enderror" style="width: 100%;">
                    <option value="">Pilih Jenis Kategori</option> ;
                      @foreach ($kategoris as $k)
                    <option value="{{ $k['id'] }}" {{ $k->id == old('id_kategori') ? 'SELECTED' : '' }}>{{ $k['nama_kategori'] }}</option>
                      @endforeach
                    </select> @error ('id_kategori')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control @error ('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Nomor HP" value="{{ old('harga') }}">
                    @error ('harga')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control @error ('quantity') is-invalid @enderror" id="quantity" placeholder="Masukkan quantity" value="{{ old('quantity') }}">
                    @error ('quantity')<div class="invalid-feedback"> {{ $message }} </div> @enderror
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
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
              <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                <h3 class="card-title">Tambah Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('mahasiswa') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control @error ('nim') is-invalid @enderror" id="nim" placeholder="Masukkan nim" value="{{ old('nim') }}">
                    @error ('nim')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control @error ('nama') is-invalid @enderror" id="nama"
                      placeholder="Masukkan Nama Mahasiswa" value="{{ old('nama') }}"> @error ('nama')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="prodi_id">Program Studi</label>
                    <select name="prodi_id" id="prodi_id" class="form-control select2bs4 @error ('prodi_id') is-invalid @enderror" style="width: 100%;">
                    <option value="">Pilih Program Studi</option> ;
                      @foreach ($prodi as $d)
                    <option value="{{ $d['id'] }}" {{ $d->id == old('prodi_id') ? 'SELECTED' : '' }}>{{ $d['nama_prodi'] }}</option>
                      @endforeach
                    </select> @error ('prodi_id')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control @error ('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan Nomor HP" value="{{ old('no_hp') }}">
                    @error ('no_hp')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error ('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan alamat" value="{{ old('alamat') }}">
                    @error ('alamat')<div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label><br>
                    <div class="input-group">
                      <div class="custom-file"> 
                        <input type="file" class="custom-file-input @error ('foto') is-invalid @enderror" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Pilih foto</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    @error ('foto')<div class="invalid-feedback"> {{ $message }} </div> @enderror
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
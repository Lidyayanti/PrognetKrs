@extends('template.mahasiswa.dashboard')

@section('editmahasiswa-active','active')
@section('title',' Edit Mahasiswa')
@section('content')
    <form action="{{ route('mahasiswa.update') }}" method="POST" class="col-12 card shadow" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" value="{{ $mahasiswa->id }}" name="id">
        <h5 class="font-weight-bold text-center text-info bg-info mx-n3 p-3">FORM EDIT MAHASISWA</h5>
        <!-- <div class="col-12 text-center">
            <img src="{{ asset('storage/foto_mahasisa/'.$mahasiswa->foto) }}" alt="" class="img-thumbnail rounded-circle shadow" style="width:150px;height:150px;object-fit:cover;">
        </div> -->
        <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input type="number" name="nim" class="form-control" placeholder="Input NIM" value="{{ $mahasiswa->nim }}" required disabled>
            @error('nim')
                <p class="text-danger"><small>{{ $errors->first('nim') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">NAMA</label>
            <input type="text" name="nama" class="form-control" placeholder="Input Nama" value="{{ $mahasiswa->nama }}" required>
            @error('nama')
                <p class="text-danger"><small>{{ $errors->first('nama') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">ALAMAT</label>
            <textarea type="text" name="alamat" class="form-control" rows="4" placeholder="Input Alamat" required>{{ $mahasiswa->alamat }}</textarea>
            @error('alamat')
                <p class="text-danger"><small>{{ $errors->first('alamat') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">Image</label>
            <input type="file" name="foto_mahasiswa" class="form-control-file" placeholder="Input Name" accept="image/*">
            @error('foto_mahasiswa')
                <p class="text-danger"><small>{{ $errors->first('foto_mahasiswa') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">EMAIL</label>
            <input type="text" step="any" name="email" class="form-control" placeholder="Input email" value="{{ $mahasiswa->email }}" required>
            @error('email')
                <p class="text-danger"><small>{{ $errors->first('email') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">PASSWORD</label>
            <input type="password" step="any" name="password" class="form-control" placeholder="Input password"
            @error('password')
                <p class="text-danger"><small>{{ $errors->first('password') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">TELEPON</label>
            <input type="number" step="any" name="telepon" class="form-control" placeholder="Input Telepon" value="{{ $mahasiswa->telepon }}" required>
            @error('telepon')
                <p class="text-danger"><small>{{ $errors->first('telepon') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">ANGKATAN</label>
            <input type="number" step="any" name="angkatan" class="form-control" placeholder="Input Angkatan" value="{{ $mahasiswa->angkatan }}" required>
            @error('telepon')
                <p class="text-danger"><small>{{ $errors->first('angkatan') }}</small></p>
            @enderror


            <label for="exampleInputEmail1">PROGRAM STUDI</label>
            <select name="program_studi" class="custom-select" required>
                <option value="">Pilih Prodi</option>
                <option value="Teknologi Informasi" @if( $mahasiswa->program_studi == 'Teknologi Informasi') selected @endif>Teknologi Informasi</option>
                <option value="Teknik Mesin" @if( $mahasiswa->program_studi == 'Teknik Mesin') selected @endif>Teknik Mesin</option>
                <option value="Teknik Sipil" @if( $mahasiswa->program_studi == 'Teknik Sipil') selected @endif>Teknik Sipil</option>
                <option value="Teknik Arsitektur" @if( $mahasiswa->program_studi == 'Teknik Arsitektur') selected @endif>Teknik Arsitektur</option>
            </select>
            @error('program_studi')
                <p class="text-danger"><small>{{ $errors->first('program_studi') }}</small></p>
            @enderror

            <div class="col-12 text-center mt-4">
                <a href="{{ url('/mahasiswa/profile') }}" class="btn btn-danger btn-md mx-2">KEMBALI</a>
                <input type="submit" value="SUBMIT" class="btn btn-primary btn-md mx-2">
            </div>

        </div>
    </form>
@endsection
@extends('template.mahasiswa.dashboard')

@section('profile-active','active')
@section('title','Profile')
@section('content')
<div class="col-12">
        <h5 class="font-weight-bold text-center text-dark bg-info mx-n3 p-3">Profile Mahasiswa</h5>
        <!-- <div class="col-12 text-center">
            <img src="{{ asset('storage/foto_mahasiswa/'.$mahasiswa->foto) }}" alt="" class="img-thumbnail rounded-circle shadow" style="width:150px;height:150px;object-fit:cover;">
        </div> -->
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $mahasiswa->nama }}" readonly>

            <label for="exampleInputEmail1">NIM</label>
            <textarea type="number" name="description" class="form-control" rows="4" placeholder="NIM" readonly>{{ $mahasiswa->nim }}</textarea>
            @error('nim')
                <p class="text-danger"><small>{{ $errors->first('nim') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">Angkatan</label>
            <textarea type="number" name="angkatan" class="form-control" rows="4" placeholder="NIM" readonly>{{ $mahasiswa->angkatan }}</textarea>
            @error('angkatan')
                <p class="text-danger"><small>{{ $errors->first('angkatan') }}</small></p>
            @enderror

            <label for="exampleInputEmail1">Telepon</label>
            <textarea type="telepon" name="telepon" class="form-control" rows="4" placeholder="NIM" readonly>{{ $mahasiswa->telepon }}</textarea>
            @error('angkatan')
                <p class="text-danger"><small>{{ $errors->first('telepon') }}</small></p>
            @enderror

            <!-- <label for="exampleInputEmail1">Image</label>
            <input type="file" name="foto" class="form-control-file" placeholder="Image" accept="image/*">
            @error('foto')
                <p class="text-danger"><small>{{ $errors->first('foto_mahasiswa') }}</small></p>
            @enderror -->

            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" step="any" name="alamat" class="form-control" placeholder="Alamat" value="{{ $mahasiswa->alamat}}" readonly>
            @error('alamat')
                <p class="text-danger"><small>{{ $errors->first('alamat') }}</small></p>
            @enderror


            <div class="col-12 text-center mt-4">
                <a href="{{ url('/') }}" class="btn btn-danger btn-md mx-2">KEMBALI</a>
            </div>

            <div class="col-12 text-center mt-4">
                <a href="{{ route('mahasiswa.edit') }}" class="btn btn-success btn-md mx-2">UPDATE</a>
            </div>

        </div>
    </div>

@endsection
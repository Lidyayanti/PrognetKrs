@extends('template.admin.dashboard')

@section('mahasiswa-active','active')
@section('title','Mahasiswa')

@section('breadcrumb')
<li class="breadcrumb-item">Transaksi</li>
<li class="breadcrumb-item">Transaksi KRS</li>
<li class="breadcrumb-item">Transaksi KRS Detail</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">PILIHAN MATAKULIAH</h5>
            <div class="row">
                <div class="col-12 mb-4">
                    <table class="table-sm w-50 table-primary">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <td>: {{ isset($mahasiswa->nama) ? $mahasiswa->nama : "Mahasiswa" }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>: {{ isset($mahasiswa->nim) ? $mahasiswa->nim : "NIM" }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>: {{ isset($mahasiswa->program_studi) ? $mahasiswa->program_studi : "NIM" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">SEMESTER</label>
                            <select name="semester" class="form-control" id="semester">
                                <option value="1" @if($semester == 1) selected @endif>1</option>
                                <option value="2" @if($semester == 2) selected @endif>2</option>
                                <option value="3" @if($semester == 3) selected @endif>3</option>
                                <option value="4" @if($semester == 4) selected @endif>4</option>
                                <option value="5" @if($semester == 5) selected @endif>5</option>
                                <option value="6" @if($semester == 6) selected @endif>6</option>
                                <option value="7" @if($semester == 7) selected @endif>7</option>
                                <option value="8" @if($semester == 8) selected @endif>8</option>
                                <option value="9" @if($semester == 9) selected @endif>9</option>
                                <option value="10" @if($semester == 10) selected @endif>10</option>
                                <option value="11" @if($semester == 11) selected @endif>11</option>
                            </select>
                    </div>
                    <button class="btn-sm" onclick="goToURL()">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display" style="width:100%"></table>
            <div class="row">
            <form action="{{ route('admin.dashboard.mahasiswa.tolak') }}" id="form_submit" class="d-none" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                <input type="hidden" name="semester" value="{{ $semester }}">
            </form>
            <div class="col-12 text-center mt-2">
                <button type="button" onclick="submitWarning()" class="btn btn-sm btn-danger m-2">HAPUS KRS</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: {!! $krss !!},
            columns: [
                { title: "Name Matakuliah", data : "matakuliah.nama_matakuliah"},
                { title: "SKS", data : "matakuliah.sks"},
                { title: "Semester", data: "matakuliah.semester" },
                { title: "Nilai Saat Ini", data: "nilai" },
            ]
        } );
    } );

    function submitWarning(){
        Swal.fire({
            title: '<strong>PERINGATAN !</strong>',
            icon: 'info',
            html:
                'KRS ini akan dihapus dan tidak dapat <b>DIPULIHKAN</b>, ' +
                'Admin wajib memberikan informasi kepada mahasiswa terkait ',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                'Kirim!',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                'Batal',
            cancelButtonAriaLabel: 'Thumbs down'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                document.getElementById("form_submit").submit();
            } else if (result.isDenied) {
                Swal.fire('Check SKS anda kembali', '', 'info');
            }
        })
    }

    function goToURL(){
        let semester = document.getElementById('semester').value;
        window.location.href = "{{ url('/admin/dashboard/mahasiswa/detail') }}"+"/"+semester+"/"+"{{ $mahasiswa->id }}";
    }
</script>
@endpush
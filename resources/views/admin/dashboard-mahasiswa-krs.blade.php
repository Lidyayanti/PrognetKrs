@extends('template.admin.dashboard')

@section('mahasiswa-active','active')
@section('title','Mahasiswa')

@section('breadcrumb')
<li class="breadcrumb-item">Mahasiswa</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">PILIHAN MATAKULIAH</h5>
            <div class="row">
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">SEMESTER</label>
                        <form action="{{ Route('admin.dashboard.mahasiswa.detail',[$mahasiswa->id])}}" method="GET">
                            <select name="semester" class="form-control" id="exampleFormControlSelect1">
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
                    <button class="btn-sm">FILTER</button>
                </div>
            </div>
            </form>
            <form id="form_perbarui_data" method="POST" action="{{ Route('admin.dashboard.mahasiswa.perbarui') }}">
                <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
                @csrf
                @method('post')
                <table id="tableMahasiswa" class="stripe display m-3" style="width:100%"></table>
            </form>
        </div>
        <div class="col-12 p-1 text-center">
            <button type="button" onclick="submitWarning()" class="btn-md px-5 btn-danger">TOLAK</butt>
            <form action="{{ Route('admin.dashboard.mahasiswa.tolak') }}" method="post" id="form_delete">
                @csrf
                @method('post')
                <input type="hidden" value="{{ $mahasiswa->id }}" name="mahasiswa_id">
                <input type="hidden" value="{{ $semester }}" name="semester">
            </form>
            <button type="submit" form="form_perbarui_data" class="btn-md px-5 btn-primary">PERBARUI NILAI</butt>
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
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<select name="nilai['+data+']" class="form-control" id="exampleFormControlSelect1">'+
                                '<option value=""></option>'+
                                '<option value="A">A</option>'+
                                '<option value="B">B</option>'+
                                '<option value="C">C</option>'+
                                '<option value="D">D</option>'+
                                '<option value="E">E</option>'+
                                '<option value="Tunda">TUNDA</option>'+
                            '</select>';
                }},
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
                document.getElementById("form_delete").submit();
            } else if (result.isDenied) {
                Swal.fire('Check SKS anda kembali', '', 'info');
            }
        })
    }
</script>
@endpush
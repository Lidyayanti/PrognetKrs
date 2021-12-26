@extends('template.admin.dashboard')

@section('admin-transaksi-nilai','active')
@section('title','Transaksi Nilai')

@section('breadcrumb')
<li class="breadcrumb-item">Mahasiswa</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card p-2">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">MATAKULIAH</h5>
            <div class="row">
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">SEMESTER</label>
                            <select name="semester" class="form-control" id="semester">
                                <option value="all" @if($semester == "all") selected @endif>all</option>
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
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">PROGRAM STUDI</label>
                            <select name="semester" class="form-control" id="prodi">
                                <option value="all" @if($prodi == "all") selected @endif>all</option>
                                <option value="Teknologi Informasi" @if($prodi == "Teknologi Informasi") selected @endif>Teknologi Informasi</option>
                                <option value="Teknik Mesin" @if($prodi == "Teknik Mesin") selected @endif>Teknik Mesin</option>
                                <option value="Teknik Sipil" @if($prodi == "Teknik Sipil") selected @endif>Teknik Sipil</option>
                                <option value="Teknik Arsitektur" @if($prodi == "Teknik Arsitektur") selected @endif>Teknik Arsitektur</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">STATUS MK</label>
                            <select name="semester" class="form-control" id="status_mk">
                                <option value="all" @if($status_mk == "all") selected @endif>all</option>
                                <option value="Wajib" @if($status_mk == "Wajib") selected @endif>Wajib</option>
                                <option value="Pilihan" @if($status_mk == "Pilihan") selected @endif>Pilihan</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn-sm" onclick="goToURL()">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: {!! $matakuliahs !!},
            columns: [
                { title: "Name Matakuliah", data : "nama_matakuliah"},
                { title: "SKS", data : "sks"},
                { title: "Semester", data: "semester" },
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<a href="{{ route('admin.transaksi.nilai.detail') }}/'+data+'" class="btn btn-sm btn-primary">DETAIL</a>';
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

    function goToURL(){
        let semester = document.getElementById('semester').value;
        let prodi = document.getElementById('prodi').value;
        let status_mk = document.getElementById('status_mk').value;
        window.location.href = "{{ Route('admin.transaksi.nilai') }}"+"/"+prodi+"/"+status_mk+"/"+semester;
    }
</script>
@endpush
@extends('template.admin.dashboard')

@section('admin-transaksi-nilai','active')
@section('title','Transaksi Nilai')

@section('breadcrumb')
<li class="breadcrumb-item">Transaksi</li>
<li class="breadcrumb-item">Transaksi Nilai</li>
<li class="breadcrumb-item">Transaksi Nilai Detail</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card p-2">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">MATAKULIAH DETAIL</h5>
            <div class="row">
                <div class="col-12 mb-4">
                    <table class="table-sm w-50 table-primary">
                        <tr>
                            <th>Nama Matakuliah</th>
                            <td>: {{ isset($matakuliah) ? $matakuliah->nama_matakuliah : "" }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <td>: {{ isset($tahunAjaran) ? $tahunAjaran : "" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">TAHUN AJARAN</label>
                        <input type="number" id="tahunAjaran" class="form-control" min="1900" max="2999" step="1" value="{{ $tahunAjaran }}" />
                    </div>
                </div>
                <div class="col-12 text-left mb-4">
                    <button class="btn-sm" onclick="goToURL()">FILTER</button>
                </div>
            </div>
            <form action="{{ route('admin.dashboard.mahasiswa.perbarui') }}" id="form_submit" method="POST">
                @csrf
                @method('POST')
                <table id="tableMahasiswa" class="stripe display" style="width:100%"></table>
            </form>
            <div class="col-12 text-center mt-2">
                <button type="submit" form="form_submit" class="btn btn-sm btn-primary">PERBAHARUI NILAI</button>
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
            data: {!! $transaksiKrs !!},
            columns: [
                { title: "NIM", data : "mahasiswa.nim"},
                { title: "Name Mahasiswa", data : "mahasiswa.nama"},
                { title: "Tahun Ajaran", data: "tahun_ajaran" },
                { title: "Nilai Saat Ini", data : "nilai"},
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

    function goToURL(){
        let tahunAjaran = document.getElementById('tahunAjaran').value;
        window.location.href = "{{ Route('admin.transaksi.nilai.detail',[$id]) }}"+"/"+tahunAjaran;
    }
</script>
@endpush
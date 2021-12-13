@extends('template.mahasiswa.dashboard')

@section('krs-lihat-active','active')
@section('krs-active','active')
@section('title','KRS Input')

@section('breadcrumb')
<li class="breadcrumb-item">Input KRS</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">KRS ANDA</h5>
            <table id="tablekrs" class="stripe display m-3" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {

$(document).ready(function() {
    $('#tablekrs').DataTable( {
            data: {!! $krss !!},
            columns: [
                { title: "Name Matakuliah", data : "matakuliah.nama_matakuliah"},
                { title: "Kode", data: "matakuliah.kode" },
                { title: "SKS", data: "matakuliah.sks" },
                { title: "Nilai", data: "nilai" },
            ]
        } );
} );
} );
</script>
@endpush
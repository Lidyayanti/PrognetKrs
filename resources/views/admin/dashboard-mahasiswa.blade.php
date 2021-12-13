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
            <h5 class="bg-primary mx-n2 mt-n2 p-2">LIST MAHASISWA</h5>
            <table id="tableMahasiswa" class="stripe display m-3" style="width:100%"></table>
        </div>
        <div class="col-12 p-1 text-center">
            <button type="submit" onclick="submitWarning()" class="btn-md px-5 btn-primary">KIRIM</butt>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: {!! $mahasiswas !!},
            columns: [
                { title: "Name Mahasiswa", data : "nama"},
                { title: "NIM", data : "nim"},
                { title: "Semester", data: "semester" },
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<a href="{{ Route('admin.dashboard.mahasiswa.detail') }}/'+data+'" class="btn-sm btn-primary">LIHAT KRS</a>';
                }},
            ]
        } );
    } );
</script>
@endpush
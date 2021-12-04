@extends('template.mahasiswa.dashboard')

@section('krs-input-active','active')
@section('krs-active','active')
@section('title','KRS Input')

@section('breadcrumb')
<li class="breadcrumb-item">Input KRS</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">PILIHAN MATAKULIAH</h5>
            <table id="tablekrs" class="display m-3" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Matakuliah</th>
                        <th>Kode</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
        <div class="card col-12">
            <h5 class="bg-secondary mx-n2 mt-n2 p-2">PILIHAN ANDA</h5>
            <table id="tableselect" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Matakuliah</th>
                        <th>Kode</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="col-lg-6 col-12 p-1">
            <button class="btn-block btn-secondary">BACK</button>
        </div>

        <div class="col-lg-6 col-12 p-1">
            <button class="btn-block btn-primary">KIRIM</button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#tablekrs').DataTable( {

        } );

        $('#tableselect').DataTable( {

        } );
    } );
</script>
@endpush
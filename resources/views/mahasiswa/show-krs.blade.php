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
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">SEMESTER</label>
                            <select name="semester" id="semester" class="form-control" id="exampleFormControlSelect1">
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
            <table id="tablekrs" class="stripe display" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
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

function goToURL(){
    let semester = document.getElementById('semester').value;
    window.open("{{ url('/mahasiswa/krs/show') }}"+"/"+semester);
}
</script>
@endpush
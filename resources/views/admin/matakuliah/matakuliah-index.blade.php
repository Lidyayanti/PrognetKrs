@extends('template.admin.dashboard')

@section('matakuliah-active','active')
@section('title','Matakuliah')

@section('breadcrumb')
<li class="breadcrumb-item">Matakuliah</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2 text-center">LIST MATAKULIAH</h5>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Prodi</label>
                            <select class="form-control" id="selectProdi">
                                <option value="all">All</option>
                                <option value="Teknologi Informasi" @if($prodi == "Teknologi Informasi" ) selected @endif>Teknologi Informasi</option>
                                <option value="Teknik Mesin" @if($prodi == "Teknik Mesin" ) selected @endif>Teknik Mesin</option>
                                <option value="Teknik Sipil" @if($prodi == "Teknik Sipil" ) selected @endif>Teknik Sipil</option>
                                <option value="Teknik Arsitektur" @if($prodi == "Teknik Arsitektur" ) selected @endif>Teknik Arsitektur</option>
                            </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Semester</label>
                            <select class="form-control" id="selectSemester">
                                <option value="all">All</option>
                                <option value="1" @if( $semester == 1 ) selected @endif>1</option>
                                <option value="2" @if( $semester == 2 ) selected @endif>2</option>
                                <option value="3" @if( $semester == 3 ) selected @endif>3</option>
                                <option value="4" @if( $semester == 4 ) selected @endif>4</option>
                                <option value="5" @if( $semester == 5 ) selected @endif>5</option>
                                <option value="6" @if( $semester == 6 ) selected @endif>6</option>
                                <option value="7" @if( $semester == 7 ) selected @endif>7</option>
                                <option value="8" @if( $semester == 8 ) selected @endif>8</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" onclick="filterMatakuliah()" class="btn-sm px-4 btn-primary">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display m-3" style="width:100%"></table>
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
                { title: "Nama Matakuliah", data : "nama_matakuliah"},
                { title: "Semester", data : "semester"},
                { title: "SKS", data: "sks" },
                { title: "Prodi", data: "prodi" },
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<a href="{{ Route('admin.dashboard.mahasiswa.detail') }}/'+data+'" class="btn-sm btn-primary mr-1">EDIT</a>'+
                           '<a href="{{ Route('admin.dashboard.mahasiswa.detail') }}/'+data+'" class="btn-sm btn-danger mr-1">DELETE</a>';
                }},
            ]
        } );
    } );

    
    function filterMatakuliah(){
        let semester = $('#selectSemester').val();
        let prodi = $('#selectProdi').val();

        console.log(semester,prodi);
        window.location.href = "{{ Route('admin.matakuliah.index') }}"+"/"+prodi+"/"+semester;
    }
</script>
@endpush
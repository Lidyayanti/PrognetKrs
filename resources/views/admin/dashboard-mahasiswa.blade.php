@extends('template.admin.dashboard')

@section('mahasiswa-active','active')
@section('title','Mahasiswa')

@section('breadcrumb')
<li class="breadcrumb-item">Transaksi</li>
<li class="breadcrumb-item">Transaksi KRS</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">LIST MAHASISWA</h5>
            <div class="row">
                <div class="col-12 col-lg-4 mb-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">SEMESTER</label>
                            <select class="form-control" id="semester">
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
                    <button class="btn-sm" onclick="goToURL()">FILTER</button>
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
            data: {!! $mahasiswas !!},
            columns: [
                { title: "Name Mahasiswa", data : "nama"},
                { title: "NIM", data : "nim"},
                { title: "Semester", data: "semester" },
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<a href="{{ Route('admin.dashboard.mahasiswa.detail') }}/'+row.semester+'/'+data+'" class="btn-sm btn-primary">LIHAT KRS</a>';
                }},
            ]
        } );
    } );

    function goToURL(){
        let semester = document.getElementById('semester').value;
        window.location.href = "{{ url('/admin/dashboard/mahasiswa/') }}"+"/"+semester;
    }
</script>
@endpush
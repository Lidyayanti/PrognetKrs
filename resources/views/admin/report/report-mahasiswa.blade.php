@extends('template.admin.dashboard')

@section('report-mahasiswa','active')
@section('title','Report Mahasiswa')

@section('breadcrumb')
<li class="breadcrumb-item">Report Mahasiswa</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row justify-content-between">
            <div class="col-lg-4 col-12 p-0">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total }}</h3>

                    <p>Total Mahasiswa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                </div>
          </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2 text-center">REPORT MAHASISWA</h5>
            <div class="row">
                <div class="col-lg-4 col-12">
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
                <div class="col-lg-4 col-12">
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
                <div class="col-lg-4 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Angkatan</label>
                        <input type="number" id="selectAngkatan" value="{{ $angkatan }}" placeholder="all" class="form-control" min="1990" max="2999">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" onclick="filterMahasiswa()" class="btn-sm px-4 btn-primary">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display m-3" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    let mahasiswas =  {!! $mahasiswas !!}

    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: mahasiswas,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [
                { title: "nim", data : "nim"},
                { title: "Nama", data : "nama"},
                { title: "email", data : "email"},
                { title: "telepon", data : "telepon"},
                { title: "Ambil Matkul", data : "transaksi_krs_count"},
                { title: "Semester", data : "semester"},
            ]
        } );
    } );

    
    function filterMahasiswa(){
        let prodi = $('#selectProdi').val();
        let semester = $('#selectSemester').val();
        let angkatan = $('#selectAngkatan').val();

        console.log(semester,prodi);
        window.location.href = "{{ Route('report.mahasiswa') }}"+"/"+prodi+"/"+semester+"/"+angkatan;
    }

</script>
@endpush
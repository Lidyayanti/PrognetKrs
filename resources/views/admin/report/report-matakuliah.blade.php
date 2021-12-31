@extends('template.admin.dashboard')

@section('report-matakuliah','active')
@section('title','Report Matakuliah')

@section('breadcrumb')
<li class="breadcrumb-item">Report Matakuliah</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row justify-content-between">
            <div class="col-lg-4 col-12 p-0">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total }}</h3>

                    <p>Total Matakuliah</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                </div>
          </div>

          <div class="col-lg-4 col-12 p-0">
                <!-- small box -->
                <div class="small-box mx-1 bg-primary">
                <div class="inner">
                    <h3>{{ $wajib }}</h3>

                    <p>Matakuliah Wajib</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                </div>
          </div>

          <div class="col-lg-4 col-12 p-0">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $pilihan }}</h3>

                    <p>Matakuliah Pilihan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                </div>
          </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2 text-center">REPORT MATAKULIAH</h5>
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
                        <label for="exampleFormControlSelect1" >Status Matkul</label>
                            <select id="status_mk" class="form-control" id="selectSemester">
                                <option value="all">All</option>
                                <option value="Wajib" @if( $status == "Wajib" ) selected @endif>Wajib</option>
                                <option value="Pilihan" @if( $status == "Pilihan" ) selected @endif>Pilihan</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" onclick="filterMatakuliah()" class="btn-sm px-4 btn-primary">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display m-3" style="width:100%"></table>
            <form method="POST" action="{{ Route('admin.matakuliah.update') }}" class="d-none" id="form_update">
                @csrf
                @method('PUT')
                <input type="hidden" id="form_id" name="id">
                <input type="hidden" id="form_nama_matakuliah" name="nama_matakuliah">
                <input type="hidden" id="form_kode" name="kode">
                <input type="hidden" id="form_semester" name="semester">
                <input type="hidden" id="form_sks" name="sks">
                <input type="hidden" id="form_prodi" name="prodi">
            </form>

            <form method="POST" action="{{ Route('admin.matakuliah.store') }}" class="d-none" id="form_store">
                @csrf
                @method('POST')
                <input type="hidden" id="form_create_nama_matakuliah" name="nama_matakuliah">
                <input type="hidden" id="form_create_kode" name="kode">
                <input type="hidden" id="form_create_semester" name="semester">
                <input type="hidden" id="form_create_sks" name="sks">
                <input type="hidden" id="form_create_prodi" name="prodi">
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    let matakuliahs =  {!! $matakuliahs !!}

    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: matakuliahs,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            columns: [
                { title: "Nama Matakuliah", data : "nama_matakuliah"},
                { title: "Semester", data : "semester"},
                { title: "SKS", data: "sks" },
                { title: "Prodi", data: "prodi" },
                { title: "Total Transaksi KRS", data: "transaksi_krs_count" },
            ]
        } );
    } );

    
    function filterMatakuliah(){
        let semester = $('#selectSemester').val();
        let prodi = $('#selectProdi').val();
        let status_mk = $('#status_mk').val();

        console.log(semester,prodi);
        window.location.href = "{{ Route('report.matakuliah') }}"+"/"+prodi+"/"+semester+"/"+status_mk;
    }

</script>
@endpush
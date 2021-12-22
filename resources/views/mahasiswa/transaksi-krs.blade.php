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
            <form action="{{ Route('mahasiswa.krs.store') }}" id="form_submit" method="POST">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">TAHUN AJARAN</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ isset($tahunAjaran) ? $tahunAjaran : 0}}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">SEMESTER</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ isset($user->semester) ? $user->semester : 0}}" disabled>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="form-group">
                            <label for="maxsks">MAX SKS</label>
                            <input type="text" class="form-control" id="maxsks" value="0" disabled>
                        </div>
                    </div>
                </div>
                @csrf
                @method('POST')
                <table id="tablekrs" class="stripe display" style="width:100%"></table>
            </form>
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
        

        $(document).ready(function() {
            $('#tablekrs').DataTable( {
                data: {!! $matakuliahs !!},
                columns: [
                    { title: "Action", data : "id" , render : function (data, type, row, meta) {
                        return '<div class="form-check">'+
                                '<input name="matakuliahs[]" onclick="handleClick(this,'+row.sks+')" class="form-check-input" type="checkbox" value="'+data+'" id="defaultCheck1">'+
                                '<label class="form-check-label" for="defaultCheck1">'+
                                '</label>'+
                                '</div>';
                    }},
                    { title: "Name Matakuliah", data : "nama_matakuliah"},
                    { title: "Kode", data: "kode" },
                    { title: "SKS", data: "sks" },
                    { title: "Semester", data: "semester" }
                ]
            } );
        } );
    } );

    let sks = 0;
    function handleClick(cb,valueSks) {
        if(cb.checked){
            sks += valueSks;
            if(sks > 24){
                sks -= valueSks
                cb.checked = false;
                Swal.fire({
                    icon: "warning",
                    title: "PERINGATAN !",
                    text: "SKS Tidak dapat lebih dari 24",
                })
            }else{
                document.getElementById('maxsks').value = sks;
            }
        }else{
            sks -= valueSks;
            document.getElementById('maxsks').value = sks;
        }
    }

    function submitWarning(){
        Swal.fire({
            title: '<strong>PERINGATAN !</strong>',
            icon: 'info',
            html:
                'Mohon pastikan data yang anda inputkan adalah <b>BENAR</b>, ' +
                'Admin bersama dosen pembimbing akademik anda akan melakukan pengecekan SKS yang anda inputkan sebelum di approve ',
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
                document.getElementById("form_submit").submit();
            } else if (result.isDenied) {
                Swal.fire('Check SKS anda kembali', '', 'info');
            }
        })
    }
</script>
@endpush
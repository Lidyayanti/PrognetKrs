@extends('template.admin.dashboard')

@section('md-mahasiswa-active','active')
@section('title','Mahasiswa')

@section('breadcrumb')
<li class="breadcrumb-item">Master Data</li>
<li class="breadcrumb-item">Mahasiswa</li>
@endsection

@section('content')
<div class="conteiner-fluid">
    <div class="row">
        <div class="col-12 card">
            <h5 class="bg-primary mx-n2 mt-n2 p-2">PILIHAN MATAKULIAH</h5>
            <div class="row">
                <div class="col-12 my-2">
                    <button class="btn btn-sm btn-success" onclick="showFormCreate()">CREATE NEW MAHASISWA</button>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">SEMESTER</label>
                            <select name="semester" class="form-control" id="semester">
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
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">PROGRAM STUDI</label>
                            <select name="semester" class="form-control" id="prodi">
                                <option value="all" @if($prodi == "all") selected @endif>all</option>
                                <option value="Teknologi Informasi" @if($prodi == "Teknologi Informasi") selected @endif>Teknologi Informasi</option>
                                <option value="Teknik Mesin" @if($prodi == "Teknik Mesin") selected @endif>Teknik Mesin</option>
                                <option value="Teknik Sipil" @if($prodi == "Teknik Sipil") selected @endif>Teknik Sipil</option>
                                <option value="Teknik Arsitektur" @if($prodi == "Teknik Arsitektur") selected @endif>Teknik Arsitektur</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button class="btn-sm" onclick="goToURL()">FILTER</button>
                </div>
            </div>
            <table id="tableMahasiswa" class="stripe display" style="width:100%"></table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    let mahasiswas = {!! $mahasiswas !!}

    $(document).ready(function() {
        console.log("ready");
        $('#tableMahasiswa').DataTable( {
            data: {!! $mahasiswas !!},
            columns: [
                { title: "NIM", data : "nim"},
                { title: "Nama", data : "nama"},
                { title: "semester", data : "semester"},
                { title: "Angkatan", data: "angkatan" },
                { title: "telepon", data: "telepon" },
                { title: "email", data: "email" },
                { title: "Action", data : "id" , render : function (data, type, row, meta) {
                    return '<button onclick="showFormEdit('+meta.row+')" class="btn btn-sm btn-primary mr-1">EDIT</button>'+
                           '<button onclick="submitWarning('+data+')" class="btn btn-sm btn-danger mr-1">DELETE</button>'+
                           '<form action="{{ Route('admin.mahasiswa.delete') }}" method="POST" class="d-none" id="form_delete_'+data+'">'+
                           '@csrf'+
                           '@method("DELETE")'+
                           '<input value="'+data+'" name="id" type="hidden" >'
                           '</form>';
                }},
            ]
        } );
    } );

    function submitWarning(index){
        Swal.fire({
            title: '<strong>PERINGATAN !</strong>',
            icon: 'info',
            html:
                'Data mahasiswa ini akan dihapus dan tidak dapat <b>DIPULIHKAN</b>, ' +
                'transaksi KRS juga secara otomatis akan terhapus dari sistem, yakin untuk menghapus ?',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                'Hapus !',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                'Batal',
            cancelButtonAriaLabel: 'Thumbs down'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                document.getElementById("form_delete_"+index).submit();
            } else if (result.isDenied) {
                
            }
        })
    }

    async function showFormEdit(records){

        let mahasiswa = mahasiswas[records]

        const { value: formValues } = await Swal.fire({
        title: 'Form Update Mahasiswa',
        width: '800px',
        html:
            '<form action="{{ Route('admin.mahasiswa.update') }}" method="POST" id="form_update_2" enctype="multipart/form-data">'+
            '@csrf'+
            '@method("PUT")'+
            '<a target="__blank" href="{{ asset('storage/foto_mahasiswa/') }}/'+mahasiswa.foto_mahasiswa+'"><div><img class="img-thumbnail rounded-circle" style="width:150px;height:150px;object-fit:cover;" src="{{ asset('storage/foto_mahasiswa/') }}/'+mahasiswa.foto_mahasiswa+'"></div></a>'+
            '<input name="id" type="hidden" id="nim" class="swal2-input w-50" value="'+mahasiswa.id+'">' +
            '<label class="w-25">NIM</label>'+
            '<input name="nim" id="nim" class="swal2-input w-50" value="'+mahasiswa.nim+'">' +

            '<label class="w-25">NAMA</label>'+
            '<input name="nama" id="nama" class="swal2-input w-50" value="'+mahasiswa.nama+'">' +

            '<label class="w-25">Semester</label>'+ 
            '<select name="semester" id="semester" class="swal2-input w-50">'+
                '<option value="">Pilih Semester</option>'+
                '<option value="1"'+( mahasiswa.semester == 1 ? "selected" : "" )+'>1</option>'+
                '<option value="2"'+( mahasiswa.semester == 2 ? "selected" : "" )+'>2</option>'+
                '<option value="3"'+( mahasiswa.semester == 3 ? "selected" : "" )+'>3</option>'+
                '<option value="4"'+( mahasiswa.semester == 4 ? "selected" : "" )+'>4</option>'+
                '<option value="5"'+( mahasiswa.semester == 5 ? "selected" : "" )+'>5</option>'+
                '<option value="6"'+( mahasiswa.semester == 6 ? "selected" : "" )+'>6</option>'+
                '<option value="7"'+( mahasiswa.semester == 7 ? "selected" : "" )+'>7</option>'+
                '<option value="8"'+( mahasiswa.semester == 8 ? "selected" : "" )+'>8</option>'+
            '</select>'+

            '<label class="w-25">ALAMAT</label>'+
            '<input name="alamat" id="alamat" class="swal2-input w-50" value="'+mahasiswa.alamat+'">' +

            '<label class="w-25">TELEPON</label>'+
            '<input name="telepon" id="telepon" class="swal2-input w-50" value="'+mahasiswa.telepon+'">' +

            '<label class="w-25">EMAIL</label>'+
            '<input name="email" id="email" class="swal2-input w-50" value="'+mahasiswa.email+'">' +

            '<label class="w-25">PASSWORD</label>'+
            '<input name="password" placeholder="isi apabila akan mengganti password" id="password" autocomplete="new-password"  type="password" class="swal2-input w-50 border border-warning" value="">' +

            '<label class="w-25">PASSWORD CONFIRMATION</label>'+
            '<input name="password_confirmation" placeholder="isi apabila akan mengganti password" id="password_confirmation" autocomplete="new-password"  type="password" class="swal2-input w-50 border border-warning" value="">' +

            '<label class="w-25">PRODI</label>'+
            '<select name="program_studi" id="prodi" class="swal2-input w-50">'+
            '<option value="Teknologi Informasi" '+(mahasiswa.prodi == "Teknologi Informasi" ? " selected " : "")+'>Teknologi Informasi</option>'+
            '<option value="Teknik Mesin"'+(mahasiswa.prodi == "Teknik Mesin" ? " selected " : "")+'>Teknik Mesin</option>'+
            '<option value="Teknik Sipil"'+(mahasiswa.prodi == "Teknik Sipil" ? " selected " : "")+'>Teknik Sipil</option>'+
            '<option value="Teknik Arsitektur"'+(mahasiswa.prodi == "Teknik Arsitektur" ? " selected " : "")+'>Teknik Arsitektur</option></select>'+
            
            '<label class="w-25">ANGKATAN</label>'+
            '<input name="angkatan" type="number" id="angkatan" class="swal2-input w-50" value="'+mahasiswa.angkatan+'">'+

            '<label class="w-25">FOTO</label>'+
            '<input name="foto_mahasiswa" type="file" id="foto" class="swal2-file w-50" value="">'+
            '</form>',
        focusConfirm: false,
        preConfirm: () => {
            return {
                id : mahasiswa.id,
                nim : document.getElementById('nim').value,
                nama : document.getElementById('nama').value,
                semester : document.getElementById('semester').value,
                alamat : document.getElementById('alamat').value,
                telepon : document.getElementById('telepon').value,
                email : document.getElementById('email').value,
                password : document.getElementById('password').value,
                password_confirmation : document.getElementById('password_confirmation').value,
                angkatan : document.getElementById('angkatan').value,
                foto : document.getElementById('foto').files,
            }
        }
        });
    
        if (formValues) {

            $("#form_update_2").submit()
            
        }
    }

    async function showFormCreate(){

        const { value: formValues } = await Swal.fire({
        title: 'Form Create Mahasiswa',
        width: '800px',
        html:
            '<form action="{{ Route('admin.mahasiswa.store') }}" method="POST" id="form_create" enctype="multipart/form-data">'+
            '@csrf'+
            '@method("POST")'+
            '<input name="id" type="hidden" id="nim" class="swal2-input w-50">' +
            '<label class="w-25">NIM</label>'+
            '<input name="nim" id="nim" class="swal2-input w-50">' +

            '<label class="w-25">NAMA</label>'+
            '<input name="nama" id="nama" class="swal2-input w-50">' +

            '<label class="w-25">Semester</label>'+ 
            '<select name="semester" id="semester" class="swal2-input w-50">'+
                '<option value="all">Pilih Semester</option>'+
                '<option value="1">1</option>'+
                '<option value="3">2</option>'+
                '<option value="2">3</option>'+
                '<option value="4">4</option>'+
                '<option value="5">5</option>'+
                '<option value="6">6</option>'+
                '<option value="7">7</option>'+
                '<option value="8">8</option>'+
            '</select>'+

            '<label class="w-25">ALAMAT</label>'+
            '<input name="alamat" id="alamat" class="swal2-input w-50">' +

            '<label class="w-25">TELEPON</label>'+
            '<input name="telepon" id="telepon" class="swal2-input w-50">' +

            '<label class="w-25">EMAIL</label>'+
            '<input name="email" id="email" class="swal2-input w-50">' +

            '<label class="w-25">PASSWORD</label>'+
            '<input name="password" placeholder="isi apabila akan mengganti password" id="password" autocomplete="new-password"  type="password" class="swal2-input w-50 border border-warning" value="">' +

            '<label class="w-25">PASSWORD CONFIRMATION</label>'+
            '<input name="password_confirmation" placeholder="isi apabila akan mengganti password" id="password_confirmation" autocomplete="new-password"  type="password" class="swal2-input w-50 border border-warning" value="">' +

            '<label class="w-25">PRODI</label>'+
            '<select name="program_studi" id="prodi" class="swal2-input w-50">'+
            '<option value="">Pilih Prodi</option>'+
            '<option value="Teknologi Informasi" >Teknologi Informasi</option>'+
            '<option value="Teknik Mesin">Teknik Mesin</option>'+
            '<option value="Teknik Sipil">Teknik Sipil</option>'+
            '<option value="Teknik Arsitektur">Teknik Arsitektur</option></select>'+
            
            '<label class="w-25">ANGKATAN</label>'+
            '<input name="angkatan" type="number" id="angkatan" class="swal2-input w-50">'+

            '<label class="w-25">FOTO</label>'+
            '<input name="foto_mahasiswa" type="file" id="foto" class="swal2-file w-50" value="">'+
            '</form>',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nim : document.getElementById('nim').value,
                nama : document.getElementById('nama').value,
                semester : document.getElementById('semester').value,
                alamat : document.getElementById('alamat').value,
                telepon : document.getElementById('telepon').value,
                email : document.getElementById('email').value,
                password : document.getElementById('password').value,
                password_confirmation : document.getElementById('password_confirmation').value,
                angkatan : document.getElementById('angkatan').value,
                foto : document.getElementById('foto').files,
            }
        }
        });
    
        if (formValues) {

            $("#form_create").submit()
            
        }
    }

    function goToURL(){
        let semester = document.getElementById('semester').value;
        let prodi = document.getElementById('prodi').value;
        window.location.href = "{{ Route('admin.mahasiswa.index') }}"+"/"+semester+"/"+prodi;
    }
</script>
@endpush
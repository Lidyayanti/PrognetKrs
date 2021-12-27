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
                    <button class="btn btn-sm btn-success" onclick="showFormStore()">CREATE NEW MAHASISWA</button>
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
<form action="{{ Route('admin.mahasiswa.update') }}" method="POST" id="form_update">
    @csrf
    @method('put')
    <input type="hidden" name='id' id="form_update_id" />
    <input type="hidden" name='nim' id="form_update_nim" />
    <input type="hidden" name='nama' id="form_update_nama" />
    <input type="hidden" name='alamat' id="form_update_alamat" />
    <input type="hidden" name='semester' id="form_update_semester" />
    <input type="hidden" name='telepon' id="form_update_telepon" />
    <input type="hidden" name='email' id="form_update_email" />
    <input type="hidden" name='password' id="form_update_password" />
    <input type="hidden" name='password_confirmation' id="form_update_password_confirmation" />
    <input type="hidden" name='program_studi' id="form_update_program_studi" />
    <input type="hidden" name='angkatan' id="form_update_angkatan" />
    <input type="hidden" name='foto_mahasiswa' id="form_update_foto_mahasiswa" />
</form>
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
                           '<button onclick="submitWarning('+data+')" class="btn btn-sm btn-danger mr-1">DELETE</button>';
                }},
            ]
        } );
    } );

    function submitWarning(){
        Swal.fire({
            title: '<strong>PERINGATAN !</strong>',
            icon: 'info',
            html:
                'KRS ini akan dihapus dan tidak dapat <b>DIPULIHKAN</b>, ' +
                'Admin wajib memberikan informasi kepada mahasiswa terkait ',
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
                document.getElementById("form_delete").submit();
            } else if (result.isDenied) {
                Swal.fire('Check SKS anda kembali', '', 'info');
            }
        })
    }

    async function showFormEdit(records){
        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });

        let mahasiswa = mahasiswas[records]

        const { value: formValues } = await Swal.fire({
        title: 'Form Update Mahasiswa',
        width: '800px',
        html:
            '<input type="hidden" id="nim" class="swal2-input w-50" value="'+mahasiswa.id+'">' +
            '<label class="w-25">NIM</label>'+
            '<input id="nim" class="swal2-input w-50" value="'+mahasiswa.nim+'">' +

            '<label class="w-25">NAMA</label>'+
            '<input id="nama" class="swal2-input w-50" value="'+mahasiswa.nama+'">' +

            '<label class="w-25">Semester</label>'+ 
            '<select id="semester" class="swal2-input w-50">'+
                '<option value="all">All</option>'+
                '<option value="1"'+( mahasiswa.semester == 1 ? "selected" : "" )+'>1</option>'+
                '<option value="3"'+( mahasiswa.semester == 2 ? "selected" : "" )+'>3</option>'+
                '<option value="2"'+( mahasiswa.semester == 3 ? "selected" : "" )+'>2</option>'+
                '<option value="4"'+( mahasiswa.semester == 4 ? "selected" : "" )+'>4</option>'+
                '<option value="5"'+( mahasiswa.semester == 5 ? "selected" : "" )+'>5</option>'+
                '<option value="6"'+( mahasiswa.semester == 6 ? "selected" : "" )+'>6</option>'+
                '<option value="7"'+( mahasiswa.semester == 7 ? "selected" : "" )+'>7</option>'+
                '<option value="8"'+( mahasiswa.semester == 8 ? "selected" : "" )+'>8</option>'+
            '</select>'+

            '<label class="w-25">ALAMAT</label>'+
            '<input id="alamat" class="swal2-input w-50" value="'+mahasiswa.alamat+'">' +

            '<label class="w-25">TELEPON</label>'+
            '<input id="telepon" class="swal2-input w-50" value="'+mahasiswa.telepon+'">' +

            '<label class="w-25">EMAIL</label>'+
            '<input id="email" class="swal2-input w-50" value="'+mahasiswa.email+'">' +

            '<label class="w-25">PASSWORD</label>'+
            '<input id="password" autocomplete="new-password"  type="password" class="swal2-input w-50" value="">' +

            '<label class="w-25">PASSWORD CONFIRMATION</label>'+
            '<input id="password_confirmation" autocomplete="new-password"  type="password" class="swal2-input w-50" value="">' +

            '<label class="w-25">PRODI</label>'+
            '<select id="prodi" class="swal2-input w-50">'+
            '<option value="Teknologi Informasi" '+(mahasiswa.prodi == "Teknologi Informasi" ? " selected " : "")+'>Teknologi Informasi</option>'+
            '<option value="Teknik Mesin"'+(mahasiswa.prodi == "Teknik Mesin" ? " selected " : "")+'>Teknik Mesin</option>'+
            '<option value="Teknik Sipil"'+(mahasiswa.prodi == "Teknik Sipil" ? " selected " : "")+'>Teknik Sipil</option>'+
            '<option value="Teknik Arsitektur"'+(mahasiswa.prodi == "Teknik Arsitektur" ? " selected " : "")+'>Teknik Arsitektur</option></select>'+
            
            '<label class="w-25">ANKATAN</label>'+
            '<input type="number" id="angkatan" class="swal2-input w-50" value="'+mahasiswa.angkatan+'">'+

            '<label class="w-25">FOTO</label>'+
            '<input type="file" id="foto" class="swal2-file w-50" value="">',
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
            var reader = new FileReader();

            reader.readAsDataURL(formValues.foto[0]);

            const file = formValues.foto[0];
            console.log(formValues);
            $('#form_update_id').val(formValues.id)
            $('#form_update_nim').val(formValues.nim)
            $('#form_update_nama').val(formValues.nama)
            $('#form_update_alamat').val(formValues.alamat)
            $('#form_update_semester').val(formValues.semester)
            $('#form_update_telepon').val(formValues.telepon)
            $('#form_update_email').val(formValues.email)
            $('#form_update_password').val(formValues.password)
            $('#form_update_password_confirmation').val(formValues.password_confirmation)
            $('#form_update_program_studi').val(formValues.program_studi)
            $('#form_update_angkatan').val(formValues.angkatan)
            $('#form_update_foto_mahasiswa').val(await toBase64(formValues.foto[0]));
            $("#form_update").submit()
            
        }
    }

    function goToURL(){
        let semester = document.getElementById('semester').value;
        let prodi = document.getElementById('prodi').value;
        window.location.href = "{{ Route('admin.mahasiswa.index') }}"+"/"+semester+"/"+prodi;
    }
</script>
@endpush
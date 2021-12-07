<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDOException;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Auth::user();

        return view('mahasiswa.profile',compact('mahasiswa'));
    }

    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // SECURITY
         $validator = Validator::make($request->all(),[
            'nim' => 'required|numeric|between:0,999',
            'nama' => 'required|min:3|max:100',
            'alamat' => 'required|min:3|max:100',
            'telepon' => 'required|numeric|between:0,999',
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:8',
            'angkatan' => 'required|in:16,17,18,19,20,21',
            'progam_studi' => 'required|in:Teknologi Informasi,Teknik Mesin,Teknik Sipil,Teknik Arsitektur,Teknik Elektro,Teknik Industri',
            'foto_mahasiswa' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff'
        ]);

        if($validator->fails()){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'error',
                'title' => 'Fail !',
                'message' => 'Mohon perhatikan data yang anda inputkan !',
            ])->withErrors($validator->errors())->withInput($request->all());
        }
    // END

    // MAIN LOGIC
        try{
            DB::beginTransaction();
            $foto_mahasiswa = basename($request->file('foto_mahasiswa')->store('public/image/foto_mahasiswa'));
            Profile::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'password' => $request->password,
                'angkatan' => $request->angkatan,
                'program_studi' => $request->program_studi,
                'foto_mahasiswa' => $request->foto_mahasiswa
            ]);
            DB::commit();
        }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
            DB::rollback();
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'success',
                'title' => 'Fail !',
                'message' => 'Terjadi kesalahan pada sistem !',
            ]);
        }
    // END

    // RETURN
        return redirect('/')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Success !',
            'message' => 'Berhasil menambahkan Mahasiswa baru !',
        ]);
    // END
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        // SECURITY
        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:profiles,id',
        ]);

        if($validator->fails()){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'error',
                'title' => 'Fail !',
                'message' => 'ID Mahasiswa Tidak Ditemukan',
            ]);
        }
    // END

    // MAIN LOGIC
        try{
            $mahasiswa = Mahasiswa::findOrFail($id);
        }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'success',
                'title' => 'Fail !',
                'message' => 'Terjadi kesalahan pada sistem !',
            ]);
        }   
    // END

    // RETURN
    return view('mahasiswa.dashboard');
    // END
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
         // SECURITY
    //      $validator = Validator::make(['id' => $id],[
    //         'id' => 'required|exists:mahasiswas,id',
    //     ]);

    //     if($validator->fails()){
    //         return redirect()->back()->with([
    //             'status' => 'fail',
    //             'icon' => 'error',
    //             'title' => 'Fail !',
    //             'message' => 'ID Mahasiswa Tidak Ditemukan !',
    //         ]);
    //     }
    // // END

    // MAIN LOGIC
        try{
            $mahasiswa = Auth::user();
        }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'success',
                'title' => 'Fail !',
                'message' => 'ID Mahasiswa tidak ditemukan !',
            ]);
        }
    // END

    // RETURN
        return view('mahasiswa.editmahasiswa',compact('mahasiswa'));
    // END

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // SECURITY
        $validator = Validator::make($request->all(),[
            'nim' => 'required|numeric|between:0,999',
            'nama' => 'required|min:3|max:100',
            'alamat' => 'required|min:3|max:100',
            'telepon' => 'required|numeric|between:0,999',
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:8',
            'angkatan' => 'required|in:16,17,18,19,20,21',
            'progam_studi' => 'required|in:Teknologi Informasi,Teknik Mesin,Teknik Sipil,Teknik Arsitektur,Teknik Elektro,Teknik Industri',
            'foto_mahasiswa' => 'required|image|mimes:jpg,jpeg,png,bmp,tiff'
        ]);

        if($validator->fails()){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'error',
                'title' => 'Fail !',
                'message' => 'Mohon perhatikan data yang anda inputkan !',
            ])->withErrors($validator->errors())->withInput($request->all());
        }
    // END

    // MAIN LOGIC
        try{
            DB::beginTransaction();

            $mahasiswa = Mahasiswa::findOrFail($request->id);

            if($request->hasFile('foto')){
                $foto_mahasiswa = basename($request->file('foto_mahasiswa')->store('public/image/foto_mahasiswa'));
                $mahasiswa->update(['foto_mahasiswa' => $nama_file]);
            }

            $animal->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'password' => $request->password,
                'angkatan' => $request->angkatan,
                'program_studi' => $request->program_studi,
                'foto_mahasiswa' => $request->foto_mahasiswa
                ]);

            DB::commit();

        }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
            dd($err);
            DB::rollback();
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'success',
                'title' => 'Fail !',
                'message' => 'Terjadi kesalahan pada sistem !',
            ]);
        }
    // END

    // RETURN
        return redirect('/')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Success !',
            'message' => 'Berhasil memperbarui Data !',
        ]);
    // END
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
         // SECURITY
         $validator = Validator::make($request->all(),[
            'id' => 'required|exists:mahasiswas,id',
        ]);

        if($validator->fails()){
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'error',
                'title' => 'Fail !',
                'message' => 'ID Mahasiswa tidak ditemukan !',
            ]);
        }
    // END

    // MAIN LOGIC
        try{
            DB::beginTransaction();
            Mahasiswa::findOrFail($request->id)->delete();
            DB::commit();
        }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
            DB::rollback();
            return redirect()->back()->with([
                'status' => 'fail',
                'icon' => 'success',
                'title' => 'Fail !',
                'message' => 'Terjadi kesalahan pada sistem !',
            ]);
        }
    // END

    // RETURN
        return redirect('/')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Success !',
            'message' => 'Data berhasil terhapus!',
        ]);
    // END
    }
}

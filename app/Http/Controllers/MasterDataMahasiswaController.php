<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDOException;

class MasterDataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($semester = "all", $prodi = "all")
    {
        // SECURITY
            $validator = Validator::make(['semester' => $semester, 'prodi' => $prodi],[
                'semester' => 'required',
                'prodi' => 'required'
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Validasi Gagal !',
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                
                $mahasiswas = Mahasiswa::query();

                if($semester != "all"){
                    $mahasiswas->where('semester',$semester);
                }

                if($prodi != "all"){
                    $mahasiswas->where('program_studi',$prodi);
                }

                $mahasiswas = $mahasiswas->get();

            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Internal Server Error !',
                ]);
            }
        // END
        
        // RETURN
            return view('admin.dashboard-masterdata-mahasiswa-index',compact(['mahasiswas','semester','prodi']));
        // END
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
                'nim' => 'required|numeric',
                'nama' => 'required',
                'alamat' => 'required',
                'semester' => 'required',
                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'required|same:password_confirmation',
                'password_confirmation' => 'required|same:password',
                'program_studi' => 'required',
                'angkatan' => 'required|numeric|between:1990,2999',
                'foto_mahasiswa' => 'nullable|mimes:jpeg,jpg,png,gif',
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Validasi Gagal !',
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                DB::beginTransaction();

                $filename = 'default.jpg';

                if($request->hasFile('foto_mahasiswa')){
                    $filename = basename($request->file('foto_mahasiswa')->store('public/foto_mahasiswa'));
                }

                Mahasiswa::create([
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'semester' => $request->semester,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'foto_mahasiswa' => $filename,
                    'password' => $request->password,
                    'password_confirmation' => $request->password_confirmation,
                    'program_studi' => $request->program_studi,
                    'angkatan' => $request->angkatan,
                ]);

                DB::commit();
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                DB::rollBack();

                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END
        
        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Success !',
                'message' => 'Berhasil membuat mahasiswa baru',
            ]);
        // END
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // SECURITY
            $validator = Validator::make($request->all(),[
                'id' => 'required|numeric',
                'nim' => 'required|numeric',
                'nama' => 'required',
                'alamat' => 'required',
                'semester' => 'required',
                'telepon' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'nullable|same:password_confirmation',
                'password_confirmation' => 'nullable|same:password',
                'program_studi' => 'required',
                'angkatan' => 'required|numeric|between:1990,3000',
                'foto_mahasiswa' => 'nullable',
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Validasi Gagal !',
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                DB::beginTransaction();
                
                $mahasiswa = Mahasiswa::findOrFail($request->id);

                if($request->hasFile('foto_mahasiswa')){
                    $filename = basename($request->file('foto_mahasiswa')->store("public/foto_mahasiswa"));

                    if($mahasiswa->foto_mahasiswa != 'default.jpg'){
                        Storage::delete("public/foto_mahasiswa".$mahasiswa->foto_mahasiswa);
                    }

                    $mahasiswa->update([
                        'foto_mahasiswa' => $filename
                    ]);
                }

                $mahasiswa->update([
                    'id' => $request->id,
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'semester' => $request->semester,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'program_studi' => $request->program_studi,
                    'angkatan' => $request->angkatan,
                ]);

                if(isset($request->password)){
                    $mahasiswa->update([
                        'password' => $request->password
                    ]);
                }

                DB::commit();
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                DB::rollBack();
                
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END
        
        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Success !',
                'message' => 'Berhasil update data mahasiswa',
            ]);
        // END
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // SECURITY
            $validator = Validator::make($request->all(),[
                'id' => 'required',
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Validasi Gagal !',
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                DB::beginTransaction();

                Mahasiswa::findOrFail($request->id)->delete();

                DB::commit();
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                DB::rollBack();
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Internal Server Error',
                    'message' => 'terjadi kesalahan pada sistem',
                ]);
            }
        // END
        
        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Success !',
                'message' => 'Berhasil menghapus data mahasiswa',
            ]);
        // END
    }
}

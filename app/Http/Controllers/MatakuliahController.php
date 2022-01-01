<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDOException;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prodi = "all",$semester = "all")
    {
        // MAIN LOGIC
            try{
                $matakuliahs = Matakuliah::query();
                
                // DOING FILTER
                if($prodi != "all"){
                    $matakuliahs->where('prodi',$prodi);
                }

                if($semester != 'all'){
                    $matakuliahs->where('semester',$semester);
                }
                
                $matakuliahs = $matakuliahs->get();
            }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error !',
                ]);
            }
        // END

        // RETURN
            return view('admin.matakuliah.matakuliah-index',compact(['matakuliahs','prodi','semester']));
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
                'nama_matakuliah' => 'required',
                'semester' => 'required|between:1,8',
                'kode' => 'required',
                'sks' => 'required',
                'prodi' => 'required|in:Teknologi Informasi,Teknik Mesin,Teknik Sipil,Teknik Arsitektur'
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Validasi Gagal !',
                    'message' => 'Validation Error',
                ]);
            
            }
        // END
        
        // MAIN LOGIC
            try{
                DB::beginTransaction();
                
                Matakuliah::create([
                    'nama_matakuliah' => $request->nama_matakuliah,
                    'semester' => $request->semester,
                    'kode' => $request->kode,
                    'sks' => $request->sks,
                    'prodi' => $request->prodi
                ]);
            
                DB::commit();
            }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
                dd($err);
                DB::rollBack();
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error !',
                ]);
            }
        // END
        
        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'success !',
                'message' => 'Berhasil Create Data Matakuliah',
            ]);
        // END
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        // VALIDATOR
            $validator = Validator::make($request->all(),[
                'id' => 'required',
                'nama_matakuliah' => 'required',
                'semester' => 'required|between:1,8',
                'kode' => 'required',
                'sks' => 'required|between:1,6',
                'prodi' => 'required|in:Teknologi Informasi,Teknik Mesin,Teknik Sipil,Teknik Arsitektur'
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Validasi Gagal !',
                    'message' => 'Validation Error',
                ]);
            }
        // ENG

        // MAIN LOGIC
            try{
                DB::beginTransaction();
                
                $matakuliahs = Matakuliah::findOrFail($request->id)->update([
                    'nama_matakuliah' => $request->nama_matakuliah,
                    'semester' => $request->semester,
                    'kode' => $request->kode,
                    'sks' => $request->sks,
                    'prodi' => $request->prodi
                ]);
            
                DB::commit();
            }catch(ModelNotFoundException | QueryException | PDOException | \Throwable | \Exception $err){
                DB::rollBack();
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error !',
                ]);
            }
        // END

        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'success !',
                'message' => 'Berhasil Update Data Matakuliah',
            ]);
        // END
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
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
                    'title' => 'Fail !',
                    'message' => 'Validation Error',
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                DB::beginTransaction();

                Matakuliah::findOrFail($request->id)->delete();

                DB::commit();
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                DB::rollBack();
                return redirect()->back()->with([
                    'status' => 'error',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END
        
        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Success',
                'message' => 'Berhasil Mengahapus Matakuliah',
            ]);
        // END
    }
}

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
        //
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
                'sks' => 'required|between:1,6',
                'prodi' => 'required|Teknologi Informasi,'
            ]);
        // ENG

        // MAIN LOGIC
            try{
                DB::beginTransaction();
                
                $matakuliahs = Matakuliah::findOrFail($request->id)->update([
                    'nama_matakuliah' => $request->nama_matakuliah,
                    'semester' => $request->semester,
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
    public function destroy(Matakuliah $matakuliah)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\TransaksiKrs;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDOException;
use TrxKrs;

class TransaksiKrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // MAIN LOGIC
            try{

                $user = Auth::user();

                $matakuliahs = Matakuliah::orderBy('semester',"ASC")->where('prodi',$user->program_studi)
                                                ->get();
                
                $tahunAjaran = date('Y');

            }catch(ModelNotFoundException | ErrorException | PDOException | QueryException $err){
                return redirect()->back()->with([
                    'status' => 'failed',
                    'icon' => 'failed',
                    'title' => 'Server Error',
                    'message' => 'Server mengalami error !',
                ]);
            }
        // END

        // RETURN
            return view('mahasiswa.transaksi-krs',compact(['matakuliahs','user','tahunAjaran']));
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
                'matakuliahs.*' => 'required|numeric',
                'matakuliahs' => 'required|array'
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Pastikan anda telah memilih matakuliah !',
                ])->withErrors($validator->errors())->withInput($request->all());
            }
        // END

        // MAIN LOGIC
            try{
                $user = Auth::user();

                $arrayInsert = [];

                foreach($request->matakuliahs as $index => $matakuliah){
                    $arrayInsert[] = [
                        'tahun_ajaran' => date("Y"),
                        'semester' => $user->semester,
                        'mahasiswa_id' => $user->id,
                        'matakuliah_id' => $matakuliah,
                        'nilai' => 'tunda',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }

                $oldKrs = TransaksiKrs::where('mahasiswa_id',$user->id)->where('semester',$user->semester)->get();

                TransaksiKrs::destroy($oldKrs->pluck('id'));
                
                TransaksiKrs::insert(
                    $arrayInsert
                );
                
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ])->withErrors($validator->errors())->withInput($request->all());
            }
        // END

        // RETURN
            return redirect()->route('mahasiswa.krs.show',[$user->semester]);
        // END
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiKrs  $transaksiKrs
     * @return \Illuminate\Http\Response
     */
    public function show($semester = 1)
    {
        // VALIDATION
            $validator = Validator::make(['semester' => $semester],[
                'semester' => 'nullable|numeric'
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Pastikan anda telah memilih matakuliah !',
                ])->withErrors($validator->errors())->withInput($request->all());
            }
        // END

        // MAIN LOGIC
        
            $user = Auth::user();
            
            $krss = TransaksiKrs::with(['Mahasiswa','Matakuliah'])->where('mahasiswa_id',$user->id)->where('semester',$semester)->get();
            
        // END

        // RETURN
            return view('mahasiswa.show-krs',compact(['user','krss','semester']));
        // END
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiKrs  $transaksiKrs
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiKrs $transaksiKrs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiKrs  $transaksiKrs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiKrs $transaksiKrs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiKrs  $transaksiKrs
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiKrs $transaksiKrs)
    {
        //
    }
}

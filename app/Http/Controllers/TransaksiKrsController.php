<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\TransaksiKrs;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

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

                $matakuliahs = Matakuliah::where('semester',$user->semester)
                                                ->where('prodi',$user->program_studi)
                                                ->get();

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
            return view('mahasiswa.transaksi-krs',compact('matakuliahs'));
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
     * @param  \App\Models\TransaksiKrs  $transaksiKrs
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiKrs $transaksiKrs)
    {
        //
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

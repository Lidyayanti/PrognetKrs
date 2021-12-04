<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKrs;
use Illuminate\Http\Request;

class TransaksiKrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.transaksi-krs');
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

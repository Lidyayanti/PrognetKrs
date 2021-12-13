<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDOException;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function showMahasiswas(){
        // MAIN LOGIC
            try{
                $mahasiswas = Mahasiswa::orderBy('semester')->get();
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
            return view('admin.dashboard-mahasiswa',compact('mahasiswas'));
        // END
    }

    public function showMahasiswaDetail(Request $request,$id){
        // SECURITY
            
            $semester = $request->get('semester',5);

            $validator = Validator::make(['id' => $id,'semester' => $semester],[
                'id' => 'required|numeric',
                'semester' => 'required|numeric',
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Pastikan Input Sesuai !',
                ]);
            }
        // END

        // MAIN LOGIC
            try{

                $mahasiswa = Mahasiswa::with(['TransaksiKrs' => function($query) use ($semester){
                    $query->with('Matakuliah')->where('semester',$semester);
                }])->findOrFail($id);

                $krss = $mahasiswa->TransaksiKrs;
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END

        // RETURN
            return view('admin.dashboard-mahasiswa-krs',compact(['semester','krss','mahasiswa']));
        // END
    }

    public function perbaruiMahasiswa(Request $request){
        // SECURITY
            $validator = Validator::make($request->all(),[
                'id' => 'required|numeric',
                'nilai' => 'required|array',
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Pastikan Input Sesuai !',
                ]);
            }
        // END

        // MAIN LOGIC
            try{
                dd($request->nilai);
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END

        // RETURN

        // END
    }
}

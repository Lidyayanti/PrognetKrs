<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDOException;

class ReportController extends Controller
{
    public function indexMatakuliah($prodi = "all",$semester = "all",$status = "all"){
        // SECURITY
            $validator = Validator::make(["prodi" => $prodi,"semester" => $semester, "status" => $status],[
                'prodi' => 'required',
                'semester' => 'required',
                'status' => 'required'
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail', 
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Vaidation Error !'
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{

                $matakuliahs = Matakuliah::query();
                
                $total = Matakuliah::count();
                $wajib = Matakuliah::where('status_mk','Wajib')->count();
                $pilihan = Matakuliah::where('status_mk','Pilihan')->count();

                if($prodi != "all"){
                    $matakuliahs->where('prodi',$prodi);
                }

                if($semester != "all"){
                    $matakuliahs->where('semester',$semester);
                }

                if($status != "all"){
                    $matakuliahs->where('status_mk',$status);
                }

                $matakuliahs = $matakuliahs->withCount(['TransaksiKrs'])->get();
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                return redirect()->back()->with([
                    'status' => 'fail', 
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Internal Server Error !'
                ]);
            }
        // END
        
        // RETURN
            return view('admin.report.report-matakuliah',compact(['matakuliahs','prodi','semester','status','total','pilihan','wajib']));
        // END
    }

    public function indexMahasiswa($prodi = "all",$semester = "all",$angkatan = "all"){
        // SECURITY
            $validator = Validator::make(["prodi" => $prodi,"semester" => $semester, "angkatan" => $angkatan],[
                'prodi' => 'required',
                'semester' => 'required',
                'angkatan' => 'required'
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail', 
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Vaidation Error !'
                ]);
            }
        // END
        
        // MAIN LOGIC
            try{
                $mahasiswas = Mahasiswa::query();
                
                $total = Mahasiswa::count();

                if($prodi != "all"){
                    $mahasiswas->where('program_studi',$prodi);
                }

                if($semester != "all"){
                    $mahasiswas->where('semester',$semester);
                }

                if($angkatan != "all"){
                    $mahasiswas->where('angkatan',$angkatan);
                }

                $mahasiswas = $mahasiswas->withCount(['TransaksiKrs'])->get();

            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                return redirect()->back()->with([
                    'status' => 'fail', 
                    'icon' => 'error',
                    'title' => 'Error !',
                    'message' => 'Internal Server Error !'
                ]);
            }
        // END
        
        // RETURN
            return view('admin.report.report-mahasiswa',compact(['mahasiswas','prodi','semester','angkatan','total']));
        // END
    }
}

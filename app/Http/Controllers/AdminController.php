<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\TransaksiKrs;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDOException;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function showMahasiswas($semester = 'all'){
        // VALIDATION
            $validator = Validator::make(['semester' => $semester],[
                'semester' => 'required',
            ]);
            
            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'failed',
                    'icon' => 'failed',
                    'title' => 'Server Error',
                    'message' => 'Validation Error',
                ]);
            }
        // END

        // MAIN LOGIC
            try{
                if($semester == 'all'){
                    $mahasiswas = Mahasiswa::orderBy('semester')->get();
                }else{
                    $mahasiswas = Mahasiswa::where('semester',$semester)->orderBy('semester')->get();
                }
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
            return view('admin.dashboard-mahasiswa',compact('mahasiswas','semester'));
        // END
    }

    public function showMahasiswaDetail($semester = 1,$id){
        // SECURITY

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
                
                foreach($request->nilai as $index => $nilai){
                    if($nilai != null){
                        TransaksiKrs::findOrFail($index)->update(['nilai' => $nilai]);
                    }
                }
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
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Berhasil',
                'message' => 'Berhasil memperbaharui nilai siswa',
            ]);
        // END
    }

    public function tolakMahasiswa(Request $request){
        // SECURITY

        // END

        // MAIN LOGIC
            try{

                $TransaksiKrs = TransaksiKrs::where('mahasiswa_id',$request->mahasiswa_id)->where('semester',$request->semester)->get();

                TransaksiKrs::destroy($TransaksiKrs->pluck('id'));

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
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Berhasil Menghapus KRS',
                'message' => 'Berhasil menghapus KRS',
            ]);
        // END
    }

    public function showTransaksiNilai($prodi = "all", $status_mk = "all", $semester = "all"){
        
        // SECURITY
            $validator = Validator::make(['prodi' => $prodi, 'status_mk' => $status_mk, 'semester' => $semester],[
                'prodi' => 'required',
                'status_mk' => 'required',
                'semester' => 'required'
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
                $matakuliahs = Matakuliah::query();

                if($prodi != "all"){
                    $matakuliahs->where('prodi',$prodi);
                }

                if($status_mk != "all"){
                    $matakuliahs->where('status_mk',$status_mk);
                }

                if($semester != "all"){
                    $matakuliahs->where('semester',$semester);
                }

                $matakuliahs->orderBy('semester','DESC');

                $matakuliahs = $matakuliahs->get();

            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END
        
        // RETURN
            return view('admin.dashboard-transaksi-nilai',compact(['matakuliahs','prodi','semester','status_mk']));
        // END
    }

    public function showTransaksiNilaiDetail($id, $tahunAjaran = "all"){
        // SECURITY
            $validator = Validator::make(['id' => $id, 'tahunAjaran' => $tahunAjaran],[
                'id' => 'required',
                'tahunAjaran' => 'required',
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
                $transaksiKrs = TransaksiKrs::query()->with(['Mahasiswa','Matakuliah'])->where("matakuliah_id",$id);

                if($tahunAjaran != "all"){
                    $transaksiKrs->where("tahun_ajaran",$tahunAjaran);
                }else{
                    $tahunAjaran = date('Y');
                    $transaksiKrs->where("tahun_ajaran",$tahunAjaran);
                }

                $transaksiKrs = $transaksiKrs->get();
                
            }catch(ModelNotFoundException | PDOException | QueryException | \Throwable | \Exception $err) {
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Fail !',
                    'message' => 'Internal Server Error',
                ]);
            }
        // END
        
        // RETURN
            return view('admin.dashboard-transaksi-nilai-detail',compact(['transaksiKrs','tahunAjaran','id']));
        // END
    }
}

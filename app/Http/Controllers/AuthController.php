<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDOException;

class AuthController extends Controller
{
    public function login(Request $request){
        // SECURITY
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Gagal Login',
                    'message' => 'Gagal melakukan login ke dalam sistem, validation fail'
                ]);
            }
        // END

        // MAIN
            try{
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->route('mahasiswa.krs.input');
                }else{
                    return redirect()->back()->with([
                        'status' => 'fail',
                        'icon' => 'error',
                        'title' => 'Gagal Login',
                        'message' => 'Gagal melakukan login ke dalam sistem, tidak ada akun yang cocok'
                    ]);
                }
            }catch(ModelNotFoundException | PDOException | ErrorException | QueryException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Gagal Login',
                    'message' => $err->getMessage()
                ]);
            }
        // END
    }

    public function register(Request $request){
        // SECURITY
            $validator = Validator::make($request->all(),[
                'nama' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
                'email' => 'required',
                'program_studi' => 'required',
                'angkatan' => 'required',
                'foto_mahasiswa' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Gagal Regiister',
                    'message' => 'Gagal melakukan register ke dalam sistem'
                ]);
            }
        // END

        // MAIN
            try{
                
                DB::beginTransaction();

                Mahasiswa::create([
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'program_studi' => $request->program_studi,
                    'angkatan' => $request->angkatan,
                ]);

                DB::commit();

            }catch(ModelNotFoundException | PDOException | ErrorException | QueryException | \Throwable | \Exception $err){
                
                DB::rollback();

                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Gagal Login',
                    'message' => 'Gagal melakukan login ke dalam sistem'
                ]);

            }
        // END

        // RETURN
            return redirect()->back()->with([
                'status' => 'success',
                'icon' => 'success',
                'title' => 'Berhasil Register',
                'message' => 'Anda telah terdaftar sebagai mahasiswa Universitas Udayana'
            ]);
        // END
    }

    public function loginAdmin(){
        return view('admin.welcome-admin');
    }

    public function postLoginAdmin(Request $request){
        // VALIDATION
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Gagal Regiister',
                    'message' => 'Gagal melakukan register ke dalam sistem'
                ]);
            }
        // END

        // MAIN LOGIC
            try{
                if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password])){
                    return redirect()->route('admin.dashboard.mahasiswa');
                }else{
                    return redirect()->back()->with([
                        'status' => 'fail',
                        'icon' => 'error',
                        'title' => 'Gagal Login',
                        'message' => 'Email atau Password Salah'
                    ]);
                }
            }catch(ModelNotFoundException | PDOException | ErrorException | QueryException | \Throwable | \Exception $err){
                return redirect()->back()->with([
                    'status' => 'fail',
                    'icon' => 'error',
                    'title' => 'Server Error',
                    'message' => 'Internal Server Error'
                ]);
            }
        // END

        // RETURN
        return redirect()->route('admin.dashboard.mahasiswa')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Berhasil Login',
            'message' => 'Selamat datang admin'
        ]);
        // END
    }

    public function logoutAdmin(){

        Auth::guard('admin')->logout();
        
        return redirect()->route('admin.login')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Berhasil Logout',
            'message' => 'Berhasil Logout dari sistem Admin'
        ]);
    }

    public function logoutMahasiswa(){

        Auth::logout();
        
        return redirect()->route('welcome.page')->with([
            'status' => 'success',
            'icon' => 'success',
            'title' => 'Berhasil Logout',
            'message' => 'Berhasil Logout dari sistem'
        ]);
    }
}

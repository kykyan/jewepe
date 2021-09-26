<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Matkul;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function datamahasiswa()
    {
        $data['users'] = DB::table('users')->where('role', 1)->get();
        return view('admin.datamahasiswa', $data);
    }

    public function createmahasiswa()
    {
        return view('admin.createmahasiswa');
    }

    public function storemahasiswa(Request $request)
    {
        $mahasiswa = new User;
        $mahasiswa->npm = $request->npm;
        $mahasiswa->name = ucwords($request->name);
        $mahasiswa->email = $request->email;
        $mahasiswa->password = bcrypt($request->password);
        $mahasiswa->gender = $request->gender;
        $mahasiswa->birthplace = ucwords($request->birthplace);
        $mahasiswa->birthdate = $request->birthdate;
        $mahasiswa->phone = $request->phone;
        $mahasiswa->address = ucwords($request->address);
        $mahasiswa->smst_mhs = $request->smst_mhs;

        $cek = User::where('npm', $request->npm)->first();
        if(!empty($cek)){
            return back()->with('alert','NPM Sudah Terdaftar!');
        } else {
            $mahasiswa->save();
            return back()->with('status','Data Berhasil Ditambahkan!');
        }
    }

    public function showmahasiswa(User $user)
    {
        return view('admin.showmahasiswa', compact('user'));
    }

    public function showkrsmahasiswa($id)
    {
        $krs = DB::table('pilmatkuls')
            ->join('matkuls', 'matkuls.id', '=', 'pilmatkuls.matkul_id')
            ->where('user_id', $id)
            ->orderBy('smst_matkul')
            ->get();
        return view('admin.krsmahasiswa', compact('krs'));
    }

    public function editmahasiswa(User $user)
    {
        return view('admin.editmahasiswa', compact('user'));
    }
    
    public function updatemahasiswa(Request $request, $id)
    {
        User::where('id', $id)
        ->update([
            'name' => ucwords($request->name),
            'address' => ucwords($request->address),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'birthplace' => ucwords($request->birthplace),
            'birthdate' => $request->birthdate,
            'smst_mhs' => $request->smst_mhs
        ]);
        return redirect(route('datamahasiswa'))->with('status','Data Berhasil Diubah!');
    }

    public function resetpwmahasiswa(Request $request, $id)
    {
        User::where('id', $id)
        ->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect(route('datamahasiswa'))->with('status','Data Berhasil Diubah!');
    }
    
    public function destroymahasiswa($id)
    {
        User::destroy($id);
        return redirect(route('datamahasiswa'))->with('status0','Data Berhasil Dihapus!');   
    }
    
    // ******************************* //
    // ********** B A T A S ********** //
    // ******************************* //
    
    public function datamatkul()
    {
        $data['matkuls'] = Matkul::all();
        return view('admin.datamatkul', $data);
    }
    
    public function creatematkul()
    {
        return view('admin.creatematkul');
    }
    
    public function storematkul(Request $request)
    {
        $mahasiswa = new Matkul;
        $mahasiswa->kd_matkul = strtoupper($request->kd_matkul);
        $mahasiswa->name = ucwords($request->name);
        $mahasiswa->sks = $request->sks;
        $mahasiswa->smst_matkul = $request->smst_matkul;
        
        $cek = Matkul::where('kd_matkul', $request->kd_matkul)->first();
        if(!empty($cek)){
            return back()->with('alert','Kode Matkul Sudah Terdaftar!');
        } else {
            $mahasiswa->save();
            return back()->with('status','Data Berhasil Ditambahkan!');
        }
    }

    public function editmatkul(Matkul $matkul)
    {
        return view('admin.editmatkul', compact('matkul'));
    }

    public function updatematkul(Request $request, $id)
    {
        Matkul::where('id', $id)
        ->update([
            'name' => ucwords($request->name),
            'kd_matkul' => $request->kd_matkul,
            'sks' => $request->sks,
            'smst_matkul' => $request->smst_matkul
        ]);
        return redirect(route('datamatkul'))->with('status','Data Berhasil Diubah!');
    }

    public function destroymatkul($id)
    {
        Matkul::destroy($id);
        return redirect(route('datamatkul'))->with('status0','Data Berhasil Dihapus!');   
    }
}

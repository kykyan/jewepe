<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Matkul;
use App\Pilmatkul;
use Illuminate\Support\Facades\DB;

class MhsController extends Controller
{
    public function beranda()
    {
        return view('mhs.beranda');
    }

    public function biodata()
    {
        $id = Auth::id();

        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        
        return view('mhs.biodata',['user' => $user]);
    }

    public function updatebiodata(Request $request)
    {
        $id = Auth::id();

        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => ucwords($request->name),
                'address' => ucwords($request->address),
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthplace' => ucwords($request->birthplace),
                'birthdate' => $request->birthdate,
                'smst_mhs' => $request->smst_mhs
            ]);
        return redirect(route('biodata'))->with('status','Data Berhasil Diubah!');
    }

    public function resetpwbiodata(Request $request)
    {
        $id = Auth::id();

        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        return redirect(route('biodata'))->with('status','Data Berhasil Diubah!');
    }
    
    public function halamanisikrs()
    {
        $id = Auth::id();
        $smst = Auth::user()->smst_mhs;
        
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        
        $matkul = DB::table('matkuls')
        ->where('smst_matkul', $smst)->get();
        
        return view('mhs.isikrs',['user' => $user, 'matkul' => $matkul]);
    }
    
    public function storekrs(Request $request)
    {
        if(!empty($request->input('matkul_id'))){
            $krs = [];
            foreach ($request->input('matkul_id') as $key => $value){
                array_push($krs, ['matkul_id' => $value, 'user_id' => Auth::user()->id ]);
            }
            DB::table('pilmatkuls')->insert($krs);
        }
        return redirect(route('biodata'))->with('status','Data Berhasil Diubah!');
    }

    public function krssaya()
    {
        $id = Auth::id();

        $user = DB::table('pilmatkuls')
            ->join('matkuls', 'matkuls.id', '=', 'pilmatkuls.matkul_id')
            ->where('user_id', $id)
            ->where('smst_matkul', Auth::user()->smst_mhs)
            ->get();
        
        return view('mhs.krssaya', compact('user'));
    }
}

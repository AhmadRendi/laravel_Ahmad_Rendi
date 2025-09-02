<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasientController extends Controller
{
    //

    public function store(Request $request){
        try{
            $validateData = $request->validate([
                'nama' => "required|string|max:255",
                'alamat' => "required|string",
                'telepon' => "required|string|max:15",
                'id_rumah_sakit' => "required|integer"
            ]);

            Pasien::create($validateData);

            return response()->json(['message' => "Berhasil Menambahkan Pasien"], 201);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data'], 500);
        }
    }

    public function getAll(){
        try{
            return Pasien::where('is_delete', false)->get();
        }catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasientController extends Controller
{
    //

    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama' => "required|string|max:255",
                'alamat' => "required|string",
                'telepon' => "required|string|max:15",
                'id_rumah_sakit' => "required|integer"
            ]);

            Pasien::create($validateData);

            return response()->json(['message' => "Berhasil Menambahkan Pasien"], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data'], 500);
        }
    }

    private function getRumahSakit()
    {
        try {
            $rumahSakit = new RumahSakitController();
            return $rumahSakit->getAll();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data rumah sakit'], 500);
        }
    }

    public function getAll()
    {
        try {

            $pasien = DB::table('pasiens')
                ->join('rumah_sakit', 'pasiens.id_rumah_sakit', '=', 'rumah_sakit.id')
                ->select('pasiens.id', 'pasiens.nama', 'rumah_sakit.nama as rumah_sakit_nama', 'pasiens.alamat', 'pasiens.telepon')
                ->where('pasiens.is_delete', false)
                ->get();
            return [
                'pasien' => $pasien,
                'dataRumahSakit' => $this->getRumahSakit()
            ];
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }

    public function update(Request $request, $id){
        try{
            $validateData = $request->validate([
                'nama' => "required|string|max:255",
                'alamat' => "required|string",
                'telepon' => "required|string|max:15",
                'id_rumah_sakit' => "required|integer"
            ]);

            $pasien = Pasien::findOrFail($id);
            $pasien->update($validateData);

            return response()->json(['message' => "Berhasil Memperbarui Pasien"], 200);
        }catch(\Exception $e){
            return response()->json(['error' => 'Gagal memperbarui data'], 500);
        }
    }

    public function getById($id){
        try{
            $pasien = DB::table('pasiens')
                ->join('rumah_sakit', 'pasiens.id_rumah_sakit', '=', 'rumah_sakit.id')
                ->select('pasiens.id', 'pasiens.nama', 'rumah_sakit.nama as rumah_sakit_nama', 'pasiens.alamat', 'pasiens.telepon', 'rumah_sakit.id as rumah_sakit_id')
                ->where('pasiens.is_delete', false)
                ->where('pasiens.id', $id)
                ->first();
            return response()->json($pasien, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }

}

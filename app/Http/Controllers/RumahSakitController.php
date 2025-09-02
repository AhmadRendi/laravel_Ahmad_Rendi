<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    //

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:500',
                'telepon' => 'required|string|max:15',
                'email' => 'required|email|max:255',
            ]);

            RumahSakit::create($validatedData);

            return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data'], 500);
        }
    }

    public function getAll(){
        try{
            return RumahSakit::where('is_delete', false)->get();
        }catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }

    public function destroy($id){
        try {
            $rumahSakit = RumahSakit::findOrFail($id);
            $rumahSakit->is_delete = true;
            $rumahSakit->save();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus data'], 500);
        }
    }

    public function update(Request $request, $id){
        try{
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:500',
                'telepon' => 'required|string|max:15',
                'email' => 'required|email|max:255',
            ]);

            $rumahSakit = RumahSakit::findOrFail($id);
            $rumahSakit->update($validatedData);

            return response()->json(['message' => 'Data berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui data'], 500);
        }
    }

    public function getById($id){
        try{
            $rumahSakit = RumahSakit::findOrFail($id);
            return response()->json($rumahSakit, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }
    }
}

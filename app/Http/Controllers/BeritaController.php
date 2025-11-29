<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        if(!$berita){
            return ApiResponse::error(404, 'Data tidak ditemukan');
        }

        if($berita->count() < 1){
            return ApiResponse::error(404, 'Data berita kosong');
        }

        return ApiResponse::success($berita, 'Success get data berita');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_berita' =>['required','string','max:255'],
            'tgl_berita' =>['required','string','max:255'],
            'lokasi_berita' =>['required','string','max:255'],
            'url_berita' =>['required','string'],
            'img_berita' =>['required','string'],
        ]);

        $berita = Berita::create($request->all());
        return ApiResponse::success($berita, 'Success create data berita');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        if(!$berita){
            return ApiResponse::error(404, 'Data tidak ditemukan');
        }

        return ApiResponse::success($berita, 'Success get data berita');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        if(!$berita){
            return ApiResponse::error(404, 'Data tidak ditemukan');
        }
        $berita->update($request->all());
        return ApiResponse::success($berita, 'Success update data berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        if(!$berita){
            return ApiResponse::error(404, 'Data tidak ditemukan');
        }

        $berita->delete();
        return ApiResponse::success($berita, 'Success delete data berita');
    }
}

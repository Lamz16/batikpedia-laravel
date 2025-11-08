<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekomendasi = Rekomendasi::all();
        if ($rekomendasi->isEmpty()) {
            return ApiResponse::error(404, 'Recommendation not found');
        }

        $rekomendasi->each(function ($item) {
            $item->image = url($item->image);
        });
        return ApiResponse::success($rekomendasi, 'Success get data');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|string',
        ]);

        $image = $request->file('image');
        $fileName = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/rekomendasi'), $fileName);

        // Simpan path relatif di database, bukan URL
        $rekomendasi = Rekomendasi::create([
            'image' => 'uploads/rekomendasi/' . $fileName,
            'link' => $request->input('link'),
        ]);

        // Ubah image menjadi URL hanya untuk response
        $rekomendasi->image = url($rekomendasi->image);

        return ApiResponse::success($rekomendasi, 'Success add data recommendation');
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $rekomendasi = Rekomendasi::find($id);
        if (!$rekomendasi) {
            return ApiResponse::error(404, 'Recommendation not found');
        }

        $rekomendasi->image = url($rekomendasi->image);

        return ApiResponse::success($rekomendasi, 'Success get data');
    }

    public function updateRekomendasi(Request $request, int $id)
    {
        $rekomendasi = Rekomendasi::find($id);
        if (!$rekomendasi) {
            return ApiResponse::error(404, 'Recommendation not found');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|string',
        ]);

        // --- Update gambar jika ada ---
        if ($request->hasFile('image')) {
            // Ambil path lama dari database (relatif ke public)
            $oldImage = $rekomendasi->getOriginal('image');

            $image = $request->file('image');
            $fileName = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/rekomendasi'), $fileName);

            // Cek file lama
            $oldImageFullPath = public_path($oldImage);

            // Hapus file lama jika ada
            if ($oldImage && file_exists($oldImageFullPath)) {
                unlink($oldImageFullPath);
            }

            $rekomendasi->image = 'uploads/rekomendasi/' . $fileName;
        }

        // --- Update link, walau kosong ---
        if ($request->has('link')) {
            $rekomendasi->link = $request->input('link', '');
        }

        $rekomendasi->save();
        // Ubah image menjadi URL hanya untuk response
        $rekomendasi->image = url($rekomendasi->image);

        return ApiResponse::success($rekomendasi, 'Success update data recommendation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        $rekomendasi = Rekomendasi::find($id);
        if (!$rekomendasi) {
            return ApiResponse::error(404, 'Recommendation not found');
        }

        if ($rekomendasi->image && file_exists(public_path($rekomendasi->image))) {
            unlink(public_path($rekomendasi->image));
        }


        $rekomendasi->delete();
        return ApiResponse::success($rekomendasi, 'Success delete data recommendation');

    }
}

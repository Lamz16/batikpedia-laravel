<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\katalog_batik;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KatalogBatikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katalog = katalog_batik::with(['provinsi:id_provinsi,nama_provinsi'])->get();
        if ($katalog->isEmpty()) {
            return ApiResponse::error(404, "Data Katalog Batik Tidak Ditemukan");
        }
        $katalog = $katalog->map(function($item) {
            $item->img_batik = url($item->img_batik);
            return $item;
        });

        return ApiResponse::success($katalog, "Berhasil mendapatkan data katalog batik");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id_provinsi',
            'nama_batik' => [
                'required',
                'string',
                'max:255',
                Rule::unique('katalog_batiks', 'nama_batik')->where(fn($query) => $query->whereRaw('LOWER(nama_batik) = LOWER(?)', [$request->nama_batik]))
            ],
            'detail_batik' => ['nullable', 'string'],
            'sejarah_batik' => ['nullable', 'string'],
            'penggunaan' => ['nullable', 'string'],
            'makna' => ['nullable', 'string'],
            'img_batik' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'lat' => 'nullable',
            'lon' => 'nullable',
            'jenis_batik' => 'nullable', 'string',
        ]);

        $img_batik = $request->file('img_batik');
        $fileName = time() . '.' . $img_batik->getClientOriginalExtension();
        $img_batik->move(public_path('uploads/katalog_batik'), $fileName);

        $katalog = katalog_batik::create([
            'provinsi_id' => $request->input('provinsi_id'),
            'nama_batik' => $request->input('nama_batik'),
            'detail_batik' => $request->input('detail_batik'),
            'sejarah_batik' => $request->input('sejarah_batik'),
            'penggunaan' => $request->input('penggunaan'),
            'makna' => $request->input('makna'),
            'img_batik' => 'uploads/katalog_batik/' . $fileName,
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
            'jenis_batik' => $request->input('jenis_batik'),
        ]);

        $katalog->img_batik = url($katalog->img_batik);

        return ApiResponse::success($katalog, 'Success add data Katalog Batik');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $katalog = katalog_batik::with(['provinsi:id_provinsi,nama_provinsi'])->find($id);
        if (!$katalog) { // jika null
            return ApiResponse::error(404, "Data Katalog Batik Tidak Ditemukan");
        }

        $katalog->img_batik = url($katalog->img_batik);
        return ApiResponse::success($katalog, "Berhasil mendapatkan data katalog batik");
    }


    public function updateKatalog(Request $request, int $id)
    {
        $katalog = katalog_batik::find($id);
        if (!$katalog) {
            return ApiResponse::error(404, "Data Katalog Batik Tidak Ditemukan");
        }

        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id_provinsi',
            'nama_batik' => [
                'required',
                'string',
                'max:255',
                Rule::unique('katalog_batiks', 'nama_batik')->where(fn($query) => $query->whereRaw('LOWER(nama_batik) = LOWER(?)', [$request->nama_batik]))
            ],
            'detail_batik' => 'nullable', 'string',
            'sejarah_batik' => 'nullable', 'string',
            'penggunaan' => 'nullable', 'string',
            'makna' => 'nullable', 'string',
            'img_batik' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'lat' => 'nullable',
            'lon' => 'nullable',
            'jenis_batik' => 'nullable', 'string',
        ]);

        if ($request->hasFile('img_batik')) {
            $old_img = $katalog->getOriginal('img_batik');

            $image = $request->file('img_batik');
            $fileName = time() . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/katalog_batik'), $fileName);

            $oldImageFullPath = public_path($old_img);

            if ($old_img && file_exists($oldImageFullPath)) {
                unlink($oldImageFullPath);
            }

            $katalog->img_batik = 'uploads/katalog_batik/' . $fileName;
        }

        foreach (['provinsi_id', 'nama_batik', 'detail_batik', 'sejarah_batik',
                     'penggunaan', 'makna', 'jenis_batik', 'lat', 'lon'
                 ] as $field) {
            if ($request->has($field)) {
                $katalog->$field = $request->input($field);
            }
        }

        $katalog->save();
        $katalog->img_batik = url($katalog->img_batik);

        return ApiResponse::success($katalog, "Success update katalog batik");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $katalog = katalog_batik::find($id);
        if (!$katalog) {
            return ApiResponse::error(404, "Data Katalog Batik Tidak Ditemukan");
        }

        if ($katalog->img_batik && file_exists(public_path($katalog->img_batik))) {
            unlink(public_path($katalog->img_batik));
        }

        $katalog->delete();
        return ApiResponse::success($katalog, "Success delete data katalog batik");
    }
}

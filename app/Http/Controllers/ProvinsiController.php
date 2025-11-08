<?php

namespace App\Http\Controllers;


use App\Helpers\ApiResponse;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProvinsiController extends Controller
{
    /**
     * Get list provinsi
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        if (!$provinsi) {
            return ApiResponse::error(500, 'Gagal mendapatkan data provinsi');
        }

        if ($provinsi->count() < 1) {
            return ApiResponse::error(404, 'Data provinsi kosong');
        }

        return ApiResponse::success($provinsi, 'Success get list provinsi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaProvinsi' => [
                'required',
                'string',
                'max:255',
                Rule::unique('provinsis', 'namaProvinsi')
                    ->where(fn($q) => $q->whereRaw('LOWER(namaProvinsi) = LOWER(?)', [$request->namaProvinsi])
                    )
            ],
            'imgProvinsi' => 'nullable|string',
            'detailProvinsi' => 'nullable|string',
        ]);

        $provinsi = Provinsi::create($request->all());

        return ApiResponse::success($provinsi, 'Success create provinsi', 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $provinsi = Provinsi::find($id);
        if (!$provinsi) {
            return ApiResponse::error(404, 'Gagal mendapatkan data provinsi');
        }
        return ApiResponse::success($provinsi, 'Success get provinsi');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::find($id);
        if (!$provinsi) {
            return ApiResponse::error(404, 'Gagal mendapatkan data provinsi');
        }
        $provinsi->update($request->all());
        return ApiResponse::success($provinsi, "Success update provinsi dengan id $id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return ApiResponse::error(404, 'Gagal mendapatkan data provinsi');
        }

        $provinsi->delete();
        return ApiResponse::success($provinsi, "Success delete provinsi dengan $id");
    }
}

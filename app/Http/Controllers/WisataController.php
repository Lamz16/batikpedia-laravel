<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Wisata;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $wisata = Wisata::all();
        if ($wisata->isEmpty()) {
            return ApiResponse::error(404, "Data Wisata Tidak Ditemukan");
        }

        return ApiResponse::success($wisata, "Success get data wisata");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'namaWisata' => [
                'required',
                'string',
                'max:255',
                Rule::unique('wisatas', 'namaWisata')->where(fn ($query) => $query->whereRaw('LOWER(namaWisata) = LOWER(?)', [$request->namaWisata]))
            ],
            'detailWisata' => 'nullable','string',
            'lat' => 'nullable',
            'lon' => 'nullable',
            'imgWisata' => 'nullable|string',
            'wilayah' => 'nullable|string|max:255',
        ]);

        $wisata = Wisata::create($request->all());
        return ApiResponse::success($wisata, "Success save data wisata");

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $wisata = Wisata::find($id);
        if (!$wisata) {
            return ApiResponse::error(404, "Data Wisata Tidak Ditemukan");
        }

        return ApiResponse::success($wisata, "Success get data wisata");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $wisata = Wisata::find($id);
        if (!$wisata) {
            return ApiResponse::error(404, "Data Wisata Tidak Ditemukan");
        }

        $wisata->update($request->all());
        return ApiResponse::success($wisata, "Success update data wisata dengan id {$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $wisata = Wisata::find($id);
        if (!$wisata) {
            return ApiResponse::error(404, "Data Wisata Tidak Ditemukan");
        }
        $wisata->delete();
        return ApiResponse::success($wisata, "Success delete data wisata");
    }
}

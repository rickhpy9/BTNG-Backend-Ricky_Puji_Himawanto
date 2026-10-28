<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    private function rules(bool $update = false): array
    {
        $req = $update ? 'sometimes|required' : 'required';

        return [
            'nama'        => "$req|string|max:255",
            'brand'       => "$req|string|max:100",
            'harga'       => "$req|integer|min:0",
            'tahun'       => "$req|integer|between:1990," . (date('Y') + 1),
            'transmisi'   => "$req|in:Manual,Matic,CVT",
            'bahan_bakar' => "$req|in:Bensin,Diesel,Hybrid,Listrik",
            'status'      => 'sometimes|in:tersedia,sold',
            'foto'        => 'nullable|url',
        ];
    }

    private function messages(): array
    {
        return [
            'nama.required'  => 'Kolom nama mobil wajib diisi.',
            'harga.required' => 'Kolom harga wajib diisi.',
            'harga.integer'  => 'Kolom harga harus berupa angka.',
            '*.in'           => 'Nilai :attribute tidak valid.',
            'foto.url'       => 'Foto harus berupa URL yang valid.',
        ];
    }

    private function notFound(): JsonResponse
    {
        return response()->json(['message' => 'Data mobil tidak ditemukan'], 404);
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Daftar mobil berhasil diambil',
            'data'    => MobilResource::collection(Mobil::latest()->get()),
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->rules(), $this->messages());
        $mobil = Mobil::create($data);

        return response()->json([
            'message' => 'Data mobil berhasil ditambahkan',
            'data'    => new MobilResource($mobil),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return $this->notFound();
        }

        return response()->json([
            'message' => 'Detail mobil berhasil diambil',
            'data'    => new MobilResource($mobil),
        ], 200);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return $this->notFound();
        }

        $data = $request->validate($this->rules(true), $this->messages());
        $mobil->update($data);

        return response()->json([
            'message' => 'Data mobil berhasil diperbarui',
            'data'    => new MobilResource($mobil),
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return $this->notFound();
        }

        $mobil->delete();

        return response()->json(['message' => 'Data mobil berhasil dihapus'], 200);
    }
}
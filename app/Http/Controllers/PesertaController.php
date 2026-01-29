<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Data Peserta',
            'data' => Peserta::where('jenis_peserta', 'peserta')->get(),
        ];

        return view('peserta.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'status_kamar' => 'required|string|max:255',
                'nip' => 'required|string|max:20|unique:pesertas,nip',
                'no_hp' => 'required|string|max:20|unique:pesertas,no_hp',
                'pangkat' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'satker' => 'required|string|max:255',
                'tanggal_kedatangan' => 'nullable|date',
                'jam_kedatangan' => 'nullable',
                'maskapai' => 'nullable|string|max:255',
                'foto' => 'nullable|image|max:2048',
                'bb' => 'nullable|image|max:2048',
            ]);

            $foto = null;
            $bb = null;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('foto_peserta', 'public');
            }

            if ($request->hasFile('bb')) {
                $bb = $request->file('bb')->store('bukti_bayar', 'public');
            }

            Peserta::create([
                'nama' => $request->nama,
                'status_kamar' => $request->status_kamar,
                'gender' => $request->gender,
                'nip' => $request->nip,
                'no_hp' => $request->no_hp,
                'pangkat' => $request->pangkat,
                'jabatan' => $request->jabatan,
                'satker' => $request->satker,
                'tanggal_kedatangan' => $request->tanggal_kedatangan,
                'jam_kedatangan' => $request->jam_kedatangan,
                'maskapai' => $request->maskapai,
                'foto' => $foto,
                'bb' => $bb,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data peserta berhasil ditambahkan.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        try {
            $peserta = Peserta::findOrFail($id);

            return response()->json($peserta);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'nama' => 'required',
                'gender' => 'required|string|max:255',
                'nip' => 'required',
                'no_hp' => 'required',
                'pangkat' => 'required',
                'jabatan' => 'required',
                'satker' => 'required',
                'status_kamar' => 'required',
                'foto' => 'required|file|mimetypes:image/jpeg,image/png,application/pdf|max:20000',
                'bb'   => 'required|file|mimetypes:image/jpeg,image/png,application/pdf|max:20000',
            ]);

            $peserta = Peserta::findOrFail($id);

            // ====== Update Text Fields ======
            $peserta->nama = $request->nama;
            $peserta->gender = $request->gender;
            $peserta->nip = $request->nip;
            $peserta->no_hp = $request->no_hp;
            $peserta->pangkat = $request->pangkat;
            $peserta->jabatan = $request->jabatan;
            $peserta->satker = $request->satker;
            $peserta->status_kamar = $request->status_kamar;
            $peserta->tanggal_kedatangan = $request->tanggal_kedatangan;
            $peserta->jam_kedatangan = $request->jam_kedatangan;
            $peserta->maskapai = $request->maskapai;

            // ====== Jika Upload Foto Baru ======
            if ($request->hasFile('foto')) {

                // hapus foto lama jika ada
                if ($peserta->foto && Storage::disk('public')->exists($peserta->foto)) {
                    Storage::disk('public')->delete($peserta->foto);
                }

                // simpan foto baru mengikuti format store()
                $foto = $request->file('foto')->store('foto_peserta', 'public');

                $peserta->foto = $foto;
            }

            if ($request->hasFile('bb')) {

                // hapus foto lama jika ada
                if ($peserta->bb && Storage::disk('public')->exists($peserta->bb)) {
                    Storage::disk('public')->delete($peserta->bb);
                }

                // simpan foto baru mengikuti format store()
                $bb = $request->file('bb')->store('bukti_bayar', 'public');

                $peserta->bb = $bb;
            }

            // save update
            $peserta->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try {
            $peserta = Peserta::findOrFail($id);

            // Hapus foto jika ada
            if ($peserta->foto && Storage::disk('public')->exists($peserta->foto)) {
                Storage::disk('public')->delete($peserta->foto);
            }

            if ($peserta->bb && Storage::disk('public')->exists($peserta->bb)) {
                Storage::disk('public')->delete($peserta->bb);
            }

            // Hapus record dari database
            $peserta->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data peserta berhasil dihapus.'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Data peserta tidak ditemukan.'
            ], 404);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Pembayaran',
            'data' => Peserta::where('jenis_peserta', 'peserta')->get(),
        ];

        return view('peserta.pembayaran', $data);
    }

    public function getPembayaran(Request $request)
    {
        $peserta = Peserta::findOrFail($request->id);

        return response()->json($peserta);
    }

    public function updatePembayaran(Request $request, $id)
    {
        try {
            $peserta = Peserta::findOrFail($id);

            if($request->aksi == '1'){
                $peserta->status_bayar = 1;
            }else{
                $peserta->status_bayar = 0;
            }
            
            $peserta->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengubah status verifikasi'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}

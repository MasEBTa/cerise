<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fitur = Fitur::orderBy('urutan')->get();
        // return $fitur;
        return view('fiture', compact('fitur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request)
    {
        // Ambil data dengan urutan yang diketahui
        $data = Fitur::where('urutan', $request->urutan)->first();

        if ($data) {
            $noNow = $data->urutan;
            // Ambil data di atasnya berdasarkan kriteria tertentu
            $dataAbove = Fitur::where('urutan', '<', $data->urutan)
                                ->orderBy('urutan', 'desc')
                                ->first();

            if ($dataAbove !== null) {
                $noAbove = $dataAbove->urutan;
                $data->update(['urutan' => $noAbove]);
                $dataAbove->update(['urutan' => $noNow]);
                return response()->json([
                    "message" => "berhasil menaikkan data",
                    "status" => "success"
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    "message" => "Data ini adalah data teratas",
                    "status" => "success"
                ], Response::HTTP_OK);
            }
        } else {
            return response([
                'message' => 'Data not found',
                'status' => 'not found'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function down(Request $request)
    {
        // Ambil data dengan urutan yang diketahui
        $data = Fitur::where('urutan', $request->urutan)->first();

        if ($data) {
            $noNow = $data->urutan;
            // Ambil data di bawahnya berdasarkan kriteria tertentu
            $dataDibawah = Fitur::where('urutan', '>', $data->urutan)
                                ->first();

            if ($dataDibawah !== null) {
                $noDibawah = $dataDibawah->urutan;
                $data->update(['urutan' => $noDibawah]);
                $dataDibawah->update(['urutan' => $noNow]);
                return response()->json([
                    "message" => "berhasil menurunkan data",
                    "status" => "success"
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    "message" => "Data ini adalah data terbawah",
                    "status" => "success"
                ], Response::HTTP_OK);
            }
        } else {
            return response([
                'message' => 'Data not found',
                'status' => 'not found'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fitur = Fitur::find($id);
        if ($fitur) {
            return view('editfitur', compact('fitur'));
        } else {
            session()->flash('error', 'Data tidak ditemukan.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

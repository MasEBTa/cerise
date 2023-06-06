<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Galery::orderBy('urutan')->get();
        $galery = Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data)
                {
                    return 
                    '<div class="btn-group d-flex justify-content-around rounded" role="group" aria-label="Basic example">'.
                        '<button id="a" data-urutan="'.$data->urutan.'" class="naik btn btn-xs btn-info btn-flat"><i class="bi bi-arrow-up-square"></i></button>'
                        .'<button data-urutan="'.$data->urutan.'" class="turun btn btn-xs btn-danger btn-flat"><i class="bi bi-arrow-down-square"></i></button>'
                        .'<a href="/galery/'.$data->id.'"  class="btn btn-xs btn-warning btn-flat"><i class="bi bi-pencil-square"></i></a>'
                        .'<a href="'.route('hapus_data', ['id' => $data->id]).'"  class="btn btn-xs btn-danger btn-flat"><i class="bi bi-file-x-fill"></i></a>'
                    .'</div>';
                })->rawColumns(['action'])
                ->make(true);
        // return $galery;
        return view('Galery', compact('galery'));
    }
    public function add()
    {
        return view('add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request)
    {
        // Ambil data dengan urutan yang diketahui
        $data = Galery::where('urutan', $request->urutan)->first();
        if ($data) {
            $noNow = $data->urutan;
            // Ambil data di atasnya berdasarkan kriteria tertentu
            $dataAbove = Galery::where('urutan', '<', $data->urutan)
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
        $data = Galery::where('urutan', $request->urutan)->first();

        if ($data) {
            $noNow = $data->urutan;
            // Ambil data di bawahnya berdasarkan kriteria tertentu
            $dataDibawah = Galery::where('urutan', '>', $data->urutan)
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
        $data = Galery::orderBy('created_at', 'desc')->first();
        $urutan = null;
        if ($data) {
            $urutan = $data->urutan + 1;
        } else {
            $urutan = 1;
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            // Lakukan sesuatu dengan path gambar yang diunggah, seperti menyimpan ke database
            // Misalnya, simpan path gambar ke kolom 'image_path' di tabel 'posts'
            // $post->image_path = $imagePath;
            // $post->save();
            $gallery = new Galery;
            $gallery->urutan = $urutan;
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->picture_name = $imagePath;
            $gallery->save();
            return redirect()->route('home');
        }
        return $request;
    }
    public function image(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileToDel = $request->input('toDelete');
            $id = $request->input('idToDelete');

            // cari nama filenya untuk diganti
            $Galery = Galery::find($id);

            // Hapus gambar lama dari storage
            Storage::delete($Galery->picture_name);

            // Simpan gambar dengan nama acak
            $imageName = $image->store('images');

            // perbarui nama
            $Galery->picture_name = $imageName;

            // simpan
            $Galery->update();
    
            return response()->json([
                // 'imageName' => $originalName,
                'savedname' => $imageName,
                'status' => 'success'
            ]);
        }
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
        $Galery = Galery::find($id);
        if ($Galery) {
            return view('editgalery', compact('Galery'));
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
    public function update(Request $request)
    {
        $galery = Galery::find($request->id);
        if ($galery) {
            # code...
            $galery->title = $request->title;
            $galery->description = $request->description;
            // simpan
            $galery->update();
            return redirect()->route('home')->with('success', 'Data berhasil dirubah.');
        } else {
            return redirect()->route('home')->with('error', 'Data Tidak ditemukan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galery = Galery::find($id);
        if ($galery) {
            # code...
            $galery->delete();
            Storage::delete($galery->picture_name);
            return redirect()->route('home')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('home')->with('error', 'Data Tidak ditemukan.');
        }
    }
}

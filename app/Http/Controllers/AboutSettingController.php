<?php

namespace App\Http\Controllers;
use App\Models\Other_setting;
use App\Models\Contact;
use App\Models\Jumbotron;
use App\Models\Daftar_download;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Other_setting::all()[0];
        $contact = Contact::all();
        $daftarDownload = Daftar_download::all()[0];
        $jumbotrons = Jumbotron::where('status', 1)->get()[0];

        return view(
            'about', 
            compact(
                'setting', 
                'contact',
                'jumbotrons',
                'daftarDownload'
            )
        );
    }

    public function image(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileToDel = $request->input('toDelete');
            $id = $request->input('idToDelete');

            // cari nama filenya untuk diganti
            $Other_setting = Other_setting::find($id);
            
            // Hapus gambar lama dari storage
            Storage::delete($Other_setting->logo);

            // Simpan gambar dengan nama acak
            $imageName = $image->store('public/logo');

            // perbarui nama logonya
            $Other_setting->logo = $imageName;
            // simpan
            $Other_setting->update();
    
            return response()->json([
                // 'imageName' => $originalName,
                'savedname' => $imageName,
                'status' => 'success'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        // update di setting
        $setting = Other_setting::all()[0];
        $setting->name = $request->name;
        $setting->about = $request->description;
        $setting->update();
        // update jumbotron
        $jumbotrons = Jumbotron::where('status', 1)->get()[0];
        $jumbotrons->title = $request->title;
        $jumbotrons->description = $request->description;
        $jumbotrons->update();
        // update data contact
        $contact = Contact::all();
        foreach ($contact as $key => $value) {
            if ($value->name == 'phone') {
                $value->description = $request->phone;
                $value->update();
            }

            if ($value->name == 'email') {
                $value->description = $request->email;
                $value->update();
            }
        }
        // daftar dan download
        $daftarDownload = Daftar_download::all()[0];
        $daftarDownload->title_daftar = $request->title_daftar;
        $daftarDownload->title_download = $request->title_download;
        $daftarDownload->update();


        return back();
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

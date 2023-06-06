<?php

namespace App\Http\Controllers;

use App\Models\Jumbotron;
use App\Models\Color;
use App\Models\Fitur;
use App\Models\Carier;
use App\Models\Contact;
use App\Models\Store_category;
use App\Models\Daftar_download;
use App\Models\Other_setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumbotrons = Jumbotron::where('status', 1)->get()[0];
        $color = Color::all()[0];
        $fiturs = Fitur::where('popular', 1)->get();
        $allfiturs = Fitur::all();
        $stores = Store_category::where('status', 1)->get();
        $daftarDownload = Daftar_download::all()[0];
        $setting = Other_setting::all()[0];
        $carier = Carier::where('status', 1)->get();
        $contact = Contact::all();
        return view('welcome', compact('contact','carier','setting', 'jumbotrons', 'color', 'fiturs', 'stores', 'allfiturs', 'daftarDownload'));
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

@extends('layouts.landing')

@section('content')
    <!-- jumbotron -->
    <jumbotron-component 
        :title="'{{ $jumbotrons->title }}'" 
        :description="'{{ $jumbotrons->description }}'"
        :color-primary="'{{ $color->primary_color }}'"
        :name-pic="'{{ asset('storage/'.$jumbotrons->name_pic) }}'"
        :title-color="'{{ $color->text_color2 }}'"
    ></jumbotron-component>
    <!-- ./jumbotron -->

    <!-- fitur popular -->
    <fitur-component 
        :color-body="'rgb(248, 248, 248)'" 
        :color-secondary="'red'"
        :fitur-popular="{{ json_encode($fiturs) }}"
        :base-asset="'{{ asset('storage') }}'"
        id="fitur"
    ></fitur-component>
    <!-- ./fitur popular -->

    <!-- store-type -->
    <store-component
        :store-type="{{ json_encode($stores) }}"
        :base-asset="'{{ asset('storage') }}'"
    ></store-component>
    <!-- ./store-type -->

    <!-- detil-fitur -->
    <detil-fiture
        :fitures="{{ json_encode($allfiturs) }}"
        :base-asset="'{{ asset('storage') }}'"
    ></detil-fiture>
    <!-- ./detil-fitur -->

    <!-- daftar-download-->
    <daftar-download
        :daftar-src="'{{ $daftarDownload->pic_daftar }}'"
        :download-src="'{{ $daftarDownload->pic_download }}'"
        :daftar-title="'{{ $daftarDownload->title_daftar }}'"
        :download-title="'{{ $daftarDownload->title_download }}'"
        :daftar-download="'{{ $daftarDownload->logo_daftar }}'"
        :download-apps="'{{ $daftarDownload->logo_download }}'"
        :link-daftar="'{{ $daftarDownload->link_daftar }}'"
        :link-download="'{{ $daftarDownload->link_download }}'"
        :base-asset="'{{ asset('storage') }}'"
    ></daftar-download>
    <!-- ./daftar-download -->

    <!-- about us -->
    <about-us :about="'{{ $setting->about }}'" id="about"></about-us>
    <!-- ./about us -->

    <!-- carier -->
    <carier-component 
        :cariers="{{ json_encode($carier) }}"
        :base-asset="'{{ asset('storage') }}'"
        id="carier"
    ></carier-component>
    <!-- ./carier -->
@endsection

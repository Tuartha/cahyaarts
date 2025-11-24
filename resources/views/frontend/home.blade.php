@extends('frontend.layouts.app')

@section('title', 'Beranda - CahyaArtBaliqui')
@section('meta_description', 'Sanggar Seni CahyaArt Bali Qui - Jasa Gamelan untuk Upacara Yadnya & Les Musik Tradisional Bali')

@section('content')
    <!-- Hero Section -->
    @include('frontend.sections.hero')

    <!-- About Section -->
    @include('frontend.sections.about')

    <!-- Layanan Section -->
    @include('frontend.sections.services')

    <!-- Gallery Preview Section -->
    @include('frontend.sections.gallery')

    <!-- Contact Section -->
    @include('frontend.sections.contact')

@endsection
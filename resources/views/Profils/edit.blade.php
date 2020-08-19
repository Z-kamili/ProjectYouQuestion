@extends('layouts.app')

@section('content')
<main id="main">
    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Edit Question</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Question</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6 form">  
<form method="Post" action="{{ route('Profils.update',[$posts->id])}}"  enctype="multipart/form-data">
    {{-- token --}}
    @csrf 
    @method('PUT')
    {{-- /token --}}
    @include('layouts.form')

@endsection
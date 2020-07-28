@extends('layouts.app')
@section('content')
<main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Your Question</h2>
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
            <form action="{{ route('posts.store')}}" method="post"   enctype="multipart/form-data" class="php-email-form">
                @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="titre" id="subject" placeholder="Title"/>
              </div>
              <div class="form-group">
                  <select class="form-control" name="ID_opt" id="subject">
                    @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{$post->Desc}}</option>   
                      @endforeach
                  </select>

                {{-- <input type="text" class="form-control" name="password" id="subject" placeholder="text"/>
                <div class="validate"></div> --}}
              </div>
              <div class="form-group">
                {{-- <textarea class="form-control" name="Desc" id="subject" placeholder="Description"></textarea> --}}
                <textarea class="form-control" id="summary-ckeditor" name="Desc" ></textarea>
                <div class="validate"></div>
              </div>
              <div class="form-group-img">  
                <input id="file-upload" type="file" name="image" accept="image/*" onchange="readURL(this);">
              </div>
              @if($errors->any())
              <ul>
              @foreach ($errors->all() as $error)
              <li style="color: red;margin-left:10px">{{$error}}</li>            
              @endforeach
              </ul>
              @endif
              <div class="text-center"><button type="submit">Ask</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Map Section ======= -->

  </main><!-- End #main -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection
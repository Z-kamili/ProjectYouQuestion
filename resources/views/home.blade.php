@extends('layouts.app')

@section('content')
<main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            {{-- {{dd($Data)}} --}}
            @foreach($Data as $data)
            <article class="entry">

              <div class="entry-img">
                <img src="assets/img/blog-post-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
              <a href="{{route('Forum.edit',$data->id)}}">{{$data->titre}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a  href="{{route('Forum.edit',$data->id)}}">{{$data->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12
                      Comments</a></li>
                </ul>
              </div>
              <div class="entry-content">
                <p>

                  
                  {!!substr(($data->Description), 0, 70).'...'!!}
                </p>
                <div class="read-more">
                <a href="{{route('Forum.edit',$data->id)}}">Repondre</a>
                </div>
              </div>
            </article><!-- End blog entry -->
@endforeach
        <!-- End blog entry -->
            <!-- End blog entry -->

            <div class="blog-pagination">
              <ul class="justify-content-center">
                {{-- <li class="disabled"><i class="icofont-rounded-left"></i></li> --}}
                {{-- <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li> --}}
              <li class="links">{{$Data->links()}}</li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">
            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                
                <ul>
                  <li><a href="{{ route('home')}}">ALL</a></li>
                  @foreach ($Categories as $cate)
                  <li><a href="{{route('Search.edit',$cate->Desc)}}">{{$cate->Desc}}</a></li>
                  @endforeach
                </ul>
                
              

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              @foreach ($Data as $data)
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  {{-- <img src="assets/img/recent-posts-1.jpg" alt=""> --}}
                <h4><a  href="{{route('Forum.edit',$data->id)}}">{{substr($data->titre, 0, 20).'...'}}</a></h4>
                <time datetime="2020-01-01">{{$data->created_at}}</time>
                </div>
              @endforeach
              
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div><!-- End .row -->

      </div><!-- End .container -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection

@extends('layouts.app')
@section('content')
<body>
  <!-- ======= Header ======= -->
  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            {{-- <li>Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia reiciendis</li> --}}
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
@foreach ($postForum as $item)
<article class="entry entry-single">
   

    <h2 class="entry-title">
    <a href="#">{{$item->titre}}</a>
    </h2>
    <div class="entry-img">
      <img src="http://localhost:8888/storage/{{$item->path}}" class="images" alt="" title="" />
      </div>
    <div class="entry-meta">
      <ul>
        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{$item->name}}</a></li>
      <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$item->created_at}}</time></a></li>
        <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
      </ul>
    </div>

    <div class="entry-content">
      <p>
       {{$item->Description}}
      </p>

  </article><!-- End blog entry -->
@endforeach
       <!-- End blog author bio -->

            <div class="blog-comments">

              <h4 class="comments-count">{{$countreply}} Reply</h4>

              {{-- <div id="comment-1" class="comment clearfix">
                <img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae
                  est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>
              </div><!-- End comment #1 --> --}}
@foreach($reply as $item)
<div id="comment-2" class="comment clearfix">
  <img src="assets/img/comments-2.jpg" class="comment-img  float-left" alt="">
  <h5><a href="">{{$item->name}}</a><a  class="reply"><i class="icofont-reply" ></i>Reply</a></h5>
  <time datetime="2020-01-01">{{$item->created_at}}</time>
  <p>
{{$item->content}}
  </p>
  <div class="commentaire" name="commentaire">
    <form action="{{ route('Commentpost.store')}}"  method="post"  enctype="multipart/form-data" class="php-email-form">
      @csrf
      <div class="row">
        <div class="col form-group">
          <textarea name="content_commentaire" class="form-control" placeholder="Your Reply"></textarea>
        </div>
        <div class="col form-group">
        <input name="reply_id" type="hidden" class="form-control" value="{{$item->id}}" placeholder="Your Reply"/>
        </div>
      </div>
      @if($errors->any())
      <ul>
      @foreach ($errors->all() as $error)
      <li style="color: red;margin-left:10px">{{$error}}</li>            
      @endforeach
      </ul>
      @endif
      <button type="submit" name="btn-submit" class="btn btn-warning btn-submit">Comment</button>
      <button type="submit"  class="btn btn-danger btn-cancel">Cancel</button>
    </form>
  </div>
  {{-- <div id="comment-reply-1" class="comment comment-reply clearfix">
    <img src="assets/img/comments-3.jpg" class="comment-img  float-left" alt="">
    <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
    <time datetime="2020-01-01">01 Jan, 2020</time>
    <p>
      Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia
      id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero
      nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.
      Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum.
      Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum.
      Expedita et dignissimos distinctio laborum minima fugiat.
      Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem
      quisquam vero rerum neque.
    </p>--}}
@foreach ($comments as $comment)
  @if ($comment->reply_id == $item->id)
   <div id="comment-reply-2" class="comment comment-reply clearfix">
   <h5><a href="">{{$comment->name}}</a><a  class="reply"><i class="icofont-reply" ></i>Reply</a></h5>
    <time datetime="2020-01-01">{{$comment->created_at}}</time>
    <p> 
      {{$comment->content_commentaire}}
    </p>
  </div> 
  <div class="commentaire" name="commentaire">
    <form action="{{ route('Commentpost.store')}}"  method="post"  enctype="multipart/form-data" class="php-email-form">
      @csrf
      <div class="row">
        <div class="col form-group">
          <textarea name="content_commentaire" class="form-control" placeholder="Your Reply"></textarea>
        </div>
        <div class="col form-group">
        <input name="reply_id" type="hidden" class="form-control" value="{{$item->id}}" placeholder="Your Reply"/>
        </div>
      </div>
      @if($errors->any())
      <ul>
      @foreach ($errors->all() as $error)
      <li style="color: red;margin-left:10px">{{$error}}</li>            
      @endforeach
      </ul>
      @endif
      <button type="submit" name="btn-submit" class="btn btn-warning btn-submit">Comment</button>
      <button type="submit"  class="btn btn-danger btn-cancel">Cancel</button>
    </form>
  </div>
  @endif
 
@endforeach

   <!-- End comment reply #2-->

 {{-- </div><!-- End comment reply #1--> --}}

{{--</div>--}}<!-- End comment #2-->
@endforeach<!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                {{-- <p>Your email address will not be published. Required fields are marked * </p> --}}
                <form action="{{ route('Forum.store')}}"  method="post"  enctype="multipart/form-data" class="php-email-form">
                  @csrf
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="content" class="form-control" placeholder="Your Reply"></textarea>
                    </div>
                  </div>
                  @if($errors->any())
                  <ul>
                  @foreach ($errors->all() as $error)
                  <li style="color: red;margin-left:10px">{{$error}}</li>            
                  @endforeach
                  </ul>
                  @endif
                  <button type="submit" class="btn btn-primary ">Post Reply</button>
                </form>
              
              </div>
            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

        </div><!-- End row -->

      </div><!-- End container -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

{{-- script --}}
{{-- <script src="/main.js"></script> --}}

<script>
// $(document).ready ( function(){
//     document.getElementsByClassName('commentaire')[i].style.display = "none";
// });​
let btn = document.getElementsByClassName('reply');
let btn_close = document.getElementsByClassName('btn-cancel');
for(let i=0;i<btn.length;i++){
    btn[i].addEventListener('click',()=>{
        document.getElementsByClassName('commentaire')[i].style.display = "block";
    });
}
for(let i=0;i<btn_close.length;i++){
  btn_close[i].addEventListener('click',(e)=>{
        e.preventDefault();
        document.getElementsByClassName('commentaire')[i].style.display = "none";
    });
}

</script>

{{-- <script type="text/javascript">
 
  $(".btn-submit").click(function(e){

      e.preventDefault();
 
      var content = $("textarea[name=content-commentaire]").val();
 
      $.ajax({
         type:'POST',
         url:"{{ route('Ajaxpost.store') }}",
         data: {content:content, _token: '{{csrf_token()}}' },
         success: function (data) {
       console.log("success");
    },
    error: function (data, textStatus, errorThrown) {
        console.log("Failed");
    },
      });

});
</script> --}}





@endSection
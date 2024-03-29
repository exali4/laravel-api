@extends('layouts.main')
@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{ $post->title }}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{ $post->author->name }}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on {{ $post->date }}</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

      <hr>
     @if($post->image_url)
     <!-- Preview Image -->
     <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
     <hr>
     @endif

     <!-- Post Content -->
     {!! $post->body_html !!}

     <hr>



    </div>

    @include('layouts.sidebar')

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection

@extends('Web.main')

@section('content')


<div class="container-mp nav-wrapper">

    <!--End: Bài viết mới nhất-->

    @include('Web.sidebar')
    @if($postObject && count($postObject) > 0)
    @foreach($postObject as $post)
    <div class="col-md-9" id="layout-page">
        <span class="header-page clearfix">
            <h1>{{$post->name}}</h1>
        </span>

        <div class="content-page">

            {!! $post->content !!}
        </div>
    </div>
    @endforeach
    @else
    <!-- Chuyển hướng người dùng đến trang 404 Not Found -->
    @include('Web.404-error')
    @endif

    <div class="cs_muahang" style="clear: both;">



    </div>








    </section>

    @endsection



    @section('footer')
    @include('Web.footer')
    @endsection
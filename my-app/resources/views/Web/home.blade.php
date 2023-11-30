@extends('Web.main')

@section('content')



<div class="flexslider">
    <ul class="slides">
        @foreach($banner as $banner)
        <li>
            <a href="#">
                <img class="img-responsive" style="width:100%" src="{{ "/storage/" . $banner->thumb }}" alt="" />
            </a>
        </li>
        @endforeach


    </ul>
    <div class="flex-controls"></div>
</div>

<section id="content" class="clearfix container">





    @include('Web.sidebar')

    <h1 class="hidden">Tấn Phong - Thiết bị điện thông minh</h1>

    <div class="col-md-9 col-sm-12 col-xs-12">

        <div class="title-line">
            <h3>tất cả sản phẩm</h3>
        </div>
        <div class="main-content">

            <!-- Sản phẩm trang chủ -->
            <div class="row content-product-list products-resize">
                @foreach ($product as $product)
                <form action="/add-cart" method="POST">
                    <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">

                        <div class="product-block product-resize fixheight" style="height: 421px;">
                            <div class="product-img image-resize view view-third clearfix" style="height: 218px;">

                                @if ($product->firstImage)

                                <a href="/detail/{{$product->id}}-{{ Str::slug($product->name, '-') }}.html" title="{{$product->firstImage->name}}">
                                    <img alt="{{$product->firstImage->name}}" src="{{ "/images/" . $product->firstImage->name }}">
                                </a>

                                @endif
                            </div>

                            <div class="product-detail clearfix">


                                <!-- sử dụng pull-left -->
                                <p class="pro-price"> {{number_format($product->price,0,'','.')}} đ </p>
                                <p class="pro-price-del text-left">
                                </p>
                                <h3 class="pro-name"><a href="/detail/{{$product->id}}-{{ Str::slug($product->name, '-') }}.html" title="{{$product->name}}">{{$product->name}} </a></h3>
                                <input id="quantity" type="hidden" name="quantity" min="1" value="1" class="tc item-quantity" />
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="add-cart">


                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button type="submit" title="{{$product->name}}" style="border: none; background: none; padding: 0; margin: 0;">
                                        <img class="add-cart-img" src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657" alt="cart">
                                    </button>




                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                </div>


                            </div>
                        </div>


                    </div>
                    @csrf

                </form>
                @endforeach
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 pull-center">
                    <a class="btn btn-readmore" href="/sanpham/{{$product->name}}/{{$product->category_id}}" role="button">Xem
                        thêm </a>
                </div>
            </div> -->
        </div>


        <div class="product-list clearfix ">
            <div class="title-line">
                <h3>SẢN PHẨM BÁN CHẠY</h3>
            </div>

            <div class="row content-product-list products-resize">
                @foreach ($topseling as $product)
                <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                    <!--sử dụng end -->

                    <form action="/add-cart" method="POST">

                        <div class="product-block product-resize">
                            <div class="product-img image-resize view view-third clearfix">

                                <a href="/sanpham/detail/{{$product['name']->id}}-{{ Str::slug($product['name']->name, '-') }}.html" title="{{$product['images']->name }}">
                                    <img alt="{{$product['images']->name}}" src="{{ "/images/" . $product['images']->name }}" />
                                </a>

                            </div>

                            <div class="product-detail clearfix">


                                <!-- sử dụng pull-left -->
                                <p class="pro-price"> {{number_format($product['name']->price,0,'','.')}}
                                    đ
                                </p>
                                <p class="pro-price-del text-left">
                                    </h3>
                                <h3 class="pro-name">
                                    <a href="/sanpham/detail/{{$product['name']->id}}-{{ Str::slug($product['name']->name, '-') }}.html" title="aaa">
                                        {{ $product['name']->name }}
                                    </a>
                                </h3>

                                <input id="quantity" type="hidden" name="quantity" min="1" value="1" class="tc item-quantity" />

                                <div class="add-cart">



                                    <button type="submit" title="{{$product['name']->name }}" style="border: none; background: none; padding: 0; margin: 0;">
                                        <img class="add-cart-img" src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657" alt="cart">
                                    </button>




                                    <input type="hidden" name="product_id" value="{{$product['name']->id}}">

                                </div>

                            </div>
                        </div>
                        @csrf
                    </form>

                </div>
                @endforeach
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 pull-center">


                    <a class="btn btn-readmore" href="/sanpham/Tấm pin năng lượng mặt trời" role="button">Xem
                        thêm </a>


                </div>
            </div> -->
        </div>



        <div class="product-list clearfix ">
            <div class="title-line">
                <h3>ĐIỆN CÔNG NGHIỆP</h3>
            </div>

            <div class="row content-product-list products-resize">
                @foreach($tuya as $tuya)
                <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                    <!--sử dụng end -->

                    <form action="/add-cart" method="POST">

                        <div class="product-block product-resize">
                            <div class="product-img image-resize view view-third clearfix">
                                @if ($tuya->firstImage)
                                <a href="/detail/{{ $tuya->id}}-{{ Str::slug( $tuya->name, '-') }}.html" title="{{$tuya->firstImage->name}}">
                                    <img alt="{{$tuya->firstImage->name}}" src="{{ "/images/" . $tuya->firstImage->name }}" alt="{{$tuya->firstImage->name}}" />
                                </a>
                                @endif
                            </div>

                            <div class="product-detail clearfix">


                                <!-- sử dụng pull-left -->
                                <p class="pro-price">{{number_format($tuya->price,0,'','.')}} đ
                                </p>
                                <p class="pro-price-del text-left">
                                    </h3>
                                <h3 class="pro-name"><a href="/detail/{{ $tuya->id}}-{{ Str::slug( $tuya->name, '-') }}.html" title="{{$tuya->name}}">{{$tuya->name}} </a></h3>

                                <input id="quantity" type="hidden" name="quantity" min="1" value="1" class="tc item-quantity" />
                                <div class="add-cart">



                                    <button type="submit" title="{{$tuya->name }}" style="border: none; background: none; padding: 0; margin: 0;">
                                        <img class="add-cart-img" src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657" alt="cart">
                                    </button>




                                    <input type="hidden" name="product_id" value="{{$tuya->id}}">

                                </div>

                            </div>
                        </div>
                        @csrf
                    </form>

                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 pull-center">


                    <a class="btn btn-readmore" href="/sanpham/{{$tuya->name}}/{{$tuya->category_id}}" role="button">Xem
                        thêm </a>


                </div>
            </div>
        </div>


        <!-- End sản phẩm trang chủ -->
    </div>
    <!-- Content-->
    </div>



</section>

<!--Begin: Bài viết mới nhất-->

<div class="post_new" style="clear:both;">
    <div class="container">
        <div class="row">
            <div class="title-line">
                <h3>Bài viết mới nhất</h3>
            </div>

            @foreach($newss as $new)

            <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html">
                    <img class="url-img" src="{{ "/storage/" . $new->thumb }}" alt="{{$new->name}}">
                </a>
                <a href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html" class="title_new_post">
                    <h3>
                        {{$new->name}}
                    </h3>
                </a>
                <p class="time_stamp">
                    <i class="time-date"></i>{{$new->date}}
                </p>
            </div>
            @endforeach

        </div>
    </div>
</div>

<!--End: Bài viết mới nhất-->

<div class="cs_muahang" style="clear: both;">


    <div class="container clearfix">
        <div class="row cs_buy">

            <div class="title-line">
                <h3>CHÍNH SÁCH BÁN HÀNG</h3>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="deliver-top-no deliver-dt" style="padding-left:45px">
                    <a href="">
                        <div class="tit">MIỄN PHÍ VẬN CHUYỂN</div>
                        <div class="descrip">Đơn hàng trên 500.000đ</div>
                    </a>
                </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="deliver-top-no deliver-ch" style="padding-left:45px;background:none !important">
                    <div style="position:absolute;margin-left: -45px;">

                        <img src="https://theme.hstatic.net/1000162838/1000469515/14/icon-day90.png?v=657">

                    </div>
                    <a href="">
                        <div class="tit">CHÍNH SÁCH ĐỔI TRẢ</div>
                        <div class="descrip">Đổi sang sản phẩm khác có giá trị tương đương trong
                            7 ngày</div>
                    </a>
                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="deliver-top-no deliver-pay" style="padding-left:45px">
                    <a href="">
                        <div class="tit">THANH TOÁN NHANH </div>
                        <div class="descrip">Thanh toán khi nhận hàng (COD)</div>
                    </a>
                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="deliver-top-no deliver-phone" style="padding-left:45px">
                    <div class="tit"> GIAO HÀNG TOÀN QUỐC</div>
                    <div class="tit-color"></div>
                    <div class="descrip">Chuyển phát nhanh toàn quốc </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection



@section('footer')
@include('Web.footer')
@endsection
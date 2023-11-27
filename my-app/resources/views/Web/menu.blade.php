<nav id="myMenu" class="navbar-main navbar navbar-default cl-pri">
    <!-- MENU MAIN -->
    <div class="container nav-wrapper check_nav">
        <div class="row">
            <div class="navbar-header">
                <div class="pull-right mobile-menu-icon-wrapper">
                    <ul class="mobile-menu-icon">

                        <li id="cart-target" class="cart">
                            <a href="/carts" class="cart " title="Giỏ hàng">
                                <span class="fa fa-shopping-cart"></span>
                                <span
                                    id="cart-count">{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>
                            </a>
                        </li>

                        <li class="user"><a href="/admin/users/login" title="Đăng nhập" class="fa fa-user"></a></li>

                    </ul>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav clearfix">


                    <li>
                        <a href="/" class=" current" title="Trang chủ">
                            <span>Trang chủ</span>
                        </a>
                    </li>



                    <li class="dropdown">
                        <a href="/sanpham/Sản phẩm" title="Sản phẩm" class="">
                            <span>Sản phẩm</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="/sanpham/Tất cả sản phẩm" title="Tất cả sản phẩm">Tất cả sản
                                    phẩm</a>

                            </li>


                            <li>
                                <a href="/sanpham/Camera" title="Camera">Camera</a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/sanpham/Camera Ip" title="Camera Ip">Ip</a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Camera Analog" title="Camera Analog">Analog</a>
                                    </li>

                                </ul>

                            </li>



                            <li>
                                <a href="/sanpham/Đầu ghi" title="Đầu ghi">Đầu ghi</a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/sanpham/Đầu ghi Ip" title="Đầu ghi Ip">IP</a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Đầu ghi Analog" title="Đầu ghi Analog">
                                            Analog
                                        </a>
                                    </li>





                                </ul>

                            </li>


                            <li>
                                <a href="/sanpham/Phụ kiện" title="Phụ kiện">Phụ kiện</a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/sanpham/Cáp" title="Cáp">Cáp</a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Nguồn" title="Nguồn">
                                            Nguồn
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Chân đế" title="Chân đế">
                                            Chân đế
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Phụ kiện khác" title="Phụ kiện khác">
                                            Phụ kiện khác
                                        </a>
                                    </li>


                                </ul>

                            </li>

                            <li>
                                <a href="/sanpham/Sản phẩm khác" title="Sản phẩm khác">Sản phẩm khác</a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/sanpham/Chuông cửa màn hình" title="Chuông cửa màn hình">Chuông cửa
                                            màn hình</a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Khóa thông minh" title="Khóa thông minh">
                                            Khóa thông minh
                                        </a>
                                    </li>


                                    <li>
                                        <a href="/sanpham/Thiết bị chấm công" title="Thiết bị chấm công">
                                            Thiết bị chấm công
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Switch" title="Switch">
                                            Switch
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Màn hình test camera" title="Màn hình test camera">
                                            Màn hình test camera
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Ổ cứng" title="Ổ cứng">
                                            Ổ cứng
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li>
                                <a href="/sanpham/Sản phẩm dành cho dự án" title="Sản phẩm dành cho dự án">Sản phẩm dành
                                    cho dự án</a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/sanpham/Camera giao thông" title="Camera giao thông">Camera giao
                                            thông</a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Camera chống cháy nổ" title="Camera chống cháy nổ">
                                            Camera chống cháy nổ
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Camera cảm biến nhiệt" title="Camera cảm biến nhiệt">
                                            Camera cảm biến nhiệt
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Server lưu trữ" title="Server lưu trữ">
                                            Server lưu trữ
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/sanpham/Video wall" title="Video wall">
                                            Video wall
                                        </a>
                                    </li>
                                </ul>

                            </li>


                        </ul>
                    </li>



                    <li class="dropdown">
                        <a href="/chinhsach/Chính sách" title="Chính Sách" class="">
                            <span>Chính Sách</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="/chinhsach/Chính sách vận chuyển" title="CHÍNH SÁCH VẬN CHUYỂN">CHÍNH SÁCH VẬN
                                    CHUYỂN</a>

                            </li>

                            <li>
                                <a href="/chinhsach/Chính sách đổi trả" title="CHÍNH SÁCH ĐỔI TRẢ">CHÍNH
                                    SÁCH ĐỔI TRẢ</a>

                            </li>

                            <li>
                                <a href="/chinhsach/Chính sách bảo mật" title="CHÍNH SÁCH BẢO MẬT">CHÍNH
                                    SÁCH BẢO MẬT</a>

                            </li>

                            <li>
                                <a href="/chinhsach/chinhsachdaily" title="CHÍNH SÁCH ĐẠI LÝ">CHÍNH SÁCH
                                    ĐẠI LÝ</a>

                            </li>

                            <li>
                                <a href="/chinhsach/Phương thức thanh toán" title="PHƯƠNG THỨC THANH TOÁN">PHƯƠNG THỨC
                                    THANH
                                    TOÁN</a>

                            </li>

                            <li>
                                <a href="/chinhsach/Thông tin chuyển khoản" title="THÔNG TIN CHUYỂN KHOẢN">THÔNG TIN
                                    CHUYỂN
                                    KHOẢN</a>

                            </li>

                            <li>
                                <a href="/chinhsach/Hướng dẫn mua hàng" title="HƯỚNG DẪN MUA HÀNG">HƯỚNG
                                    DẪN MUA HÀNG</a>

                            </li>

                        </ul>
                    </li>



                    <li>
                        <a href="/tintuc/Tin tức" class="" title="Tin tức">
                            <span>Tin tức</span>
                        </a>
                    </li>



                    <li>
                        <a href="/lien-he" class="" title="Liên Hệ">
                            <span>Liên Hệ</span>
                        </a>
                    </li>



                    <li>
                        <a href="/huongdanmuahang/Hướng dẫn mua hàng" class="" title="Hướng dẫn mua hàng">
                            <span>Hướng dẫn mua hàng</span>
                        </a>
                    </li>


                </ul>

            </div>
            <div class="hidden-xs pull-right right-menu">
                <ul class="nav navbar-nav pull-right">

                    <li id="user-icon" style="display: flex; align-items: center;">
                        <ul>




                            <li> <a class="log" href="/admin/users/login" title="Đăng nhập">Đăng nhập</a>
                            </li>




                        </ul>
                    </li>

                    <li class="">
                        <ul class="nodrop">
                            <li id="search-icon" class="drop-control">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle icon-search"
                                        data-toggle="dropdown" aria-expanded="false">

                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="search-bar">
                                            <div class="">
                                                <form class="col-md-12" action="search.html">
                                                    <input type="hidden" name="type" value="product" />
                                                    <input type="text" name="q" placeholder="Tìm kiếm..." />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Card -->

                    <li class="">
                        <ul class="nodrop">
                            <li id="cart-target1" class="toolbar-cart">
                                <a href="/carts" id="cart-link" title="Giỏ hàng" class="cart">
                                    <span class="icon-cart"></span>
                                    <span>

                                        <span>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>

                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>




                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div><!-- End container  -->






</nav>
@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" name="name" value="{{ $products->name }}" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chuyên mục (*)</label>
                    <select class="form-control" name="slug">
                        <option>-- Chọn chuyên mục --</option>
                        <option {{ $products->slug == 'Camera Ip' ? 'selected':''  }}>Camera Ip
                        </option>
                        <option {{ $products->slug == 'Camera Analog' ? 'selected':''  }}>Camera Analog
                        </option>
                        <option {{ $products->slug == 'Đầu ghi Ip' ? 'selected':''  }}>Đầu ghi Ip</option>
                        <option {{ $products->slug == 'Đầu ghi Analog' ? 'selected':''  }}>Đầu ghi Analog</option>
                        <option {{ $products->slug == 'Cáp' ? 'selected':''  }}>Cáp</option>
                        <option {{ $products->slug == 'Nguồn' ? 'selected':''  }}>Nguồn</option>
                        <option {{ $products->slug == 'Chân đế' ? 'selected':''  }}>Chân đế</option>
                        <option {{ $products->slug == 'Phụ kiện khác' ? 'selected':''  }}>Phụ kiện khác</option>
                        <option {{ $products->slug == 'Chuông cửa màn hình' ? 'selected':''  }}>Chuông cửa màn hình
                        </option>
                        <option {{ $products->slug == 'Khóa thông minh' ? 'selected':''  }}>Khóa thông minh</option>
                        <option {{ $products->slug == 'Thiết bị chấm công' ? 'selected':''  }}>Thiết bị chấm công
                        </option>
                        <option {{ $products->slug == 'Switch' ? 'selected':''  }}>Switch</option>
                        <option {{ $products->slug == 'Màn hình test camera' ? 'selected':''  }}>Màn hình test camera
                        </option>
                        <option {{ $products->slug == 'Camera giao thông' ? 'selected':''  }}>Camera giao thông</option>
                        <option {{ $products->slug == 'Camera chống cháy nổ' ? 'selected':''  }}>Camera chống cháy nổ
                        </option>
                        <option {{ $products->slug == 'Camera cảm biến nhiệt' ? 'selected':''  }}>Camera cảm biến nhiệt
                        </option>
                        <option {{ $products->slug == 'Server lưu trữ' ? 'selected':''  }}>Server lưu trữ</option>
                        <option {{ $products->slug == 'Video wall' ? 'selected':''  }}>Video wall</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Giá</label>
                    <input type="number" name="price" value="{{$products->price }}" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">SKU</label>
                    <input type="text" name="sku" value="{{ $products->SKU }}" class="form-control">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="content" class="ckeditor form-control">{{ $products->content }}</textarea>

        </div>

        <div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{$products->active = 1 ? 'checked=""': ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" {{$products->active = 0 ? 'checked=""': ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="menu">Slider ảnh sản phẩm</label>
            <input type="file" name="images[]" class="form-control" id="upload_multi" multiple>
            <div id="image_show_multi" style="margin-top: 20px;">

                @foreach ($haha as $image)
                <a href="/images/{{ $image->name }}">
                    <img src="/images/{{ $image->name }}" width="100px" style="padding: 5px;">
                </a>
                @endforeach

            </div>
            <input type="hidden" name="images_hidden" id="images_hidden">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update sản phẩm</button>
        </div>
        @csrf


    </form>
</div>

@endsection

@section('admin.footer-js')
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
    })
</script>

<script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    CKEDITOR.replace('content');
</script>
@endsection
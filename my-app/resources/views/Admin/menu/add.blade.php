@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Tên menu</label>
            <input type="text" name="name" class="form-control" id="menu" placeholder="Nhập tên danh mục">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="parent_id">
                <option value="0">Danh mục cha</option>
                @foreach($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea name="description" class="form-control"></textarea>
        </div>


        <div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>

            </div>
        </div>

        <!-- /.card-body -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo menu</button>
    </div>
    @csrf
</form>
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
@endsection
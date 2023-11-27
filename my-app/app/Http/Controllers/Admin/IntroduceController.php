<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Introduce\IntroduceService;
use App\Models\Introduce;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    protected $introduceService;
    public function __construct(IntroduceService $introduceService)
    {
        $this->introduceService = $introduceService;
    }
    public function create()
    {

        return view('Admin.introduce.add', [
            'title' => 'Tạo mới trang'
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->introduceService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('Admin.introduce.list', [
            'title' => 'Danh sách chính sách',
            'introduces' => $this->introduceService->getAll()
        ]);
    }

    public function show(Introduce $introduce)
    {


        return view('Admin.introduce.edit', [
            'title' => 'Chỉnh sửa trang',
            'introduce' => $introduce
        ]);
    }

    public function update(Introduce $introduce, Request $request)
    {
        // dd($request->all());
        $this->introduceService->update($introduce, $request);
        return redirect('/admin/introduces/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->introduceService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chính sách'
            ]);
        }

        return response()->json(['error' => true]);
    }
}

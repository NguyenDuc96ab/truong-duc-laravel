<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Tạo mới sản phẩm',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->productService->create($request);
        return redirect()->back();
    }

    public function index()
    {

        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getAll(),

        ]);
    }

    public function show(Product $product)
    {

        return view('admin.product.edit', [
            'title' => 'Sửa sản phẩm',
            'products' => $product,
            'haha' => $product->imgPro
        ]);
    }

    public function update(Product $product, Request $request)
    {

        $this->productService->update($request, $product);
        return redirect('/admin/products/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Banner\BannerService;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Introduce\IntroduceService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\News\NewsService;
use App\Http\Services\Policy\PolicyService;
use App\Http\Services\Product\ProductService;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class WebMainController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $bannerService;
    protected $policyService;
    protected $newService;
    protected $cartService;
    protected $introduceService;
    public function __construct(
        MenuService $menuService,
        ProductService $productService,
        BannerService $bannerService,
        PolicyService $policyService,
        NewsService $newsService,
        CartService $cartService,
        IntroduceService $introduceService
    ) {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->bannerService = $bannerService;
        $this->policyService = $policyService;
        $this->newService = $newsService;
        $this->cartService = $cartService;
        $this->introduceService = $introduceService;
    }
    public function home()
    {
        $products = $this->productService->getProductAll();
        $tuya = $this->productService->getBySmarthomeTuya('Thiết bị chấm công');
        foreach ($products as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        foreach ($tuya as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        $topseling = $this->cartService->topSellingProducts();
        $productData = [];

        foreach ($topseling as $item) {
            $product = $item->product;

            // Kiểm tra xem sản phẩm có tồn tại trong bảng Product không
            if ($product) {
                $images = $item->images->first();

                $productData[] = [
                    'name' => $product,
                    'images' => $images,
                ];
            } else {
                // Nếu sản phẩm không tồn tại trong bảng Product, xóa nó khỏi bảng Cart
                Cart::where('product_id', $item->product_id)->delete();
            }
        }

        return view('Web.home', [
            'title' => "Trang home",
            'product' => $products,
            'banner' => $this->bannerService->getByActive(),
            'newss' => $this->newService->getNewPost(),
            'tuya' => $tuya,
            'topseling' => $productData,
        ]);
    }

    public function sanpham($slug, Request $request)
    {
        $sortBy = $request->input('sort_by', 'manual'); // Mặc định là 'manual'
        // dd($sortBy);
        $displaySlug = $slug;

        if ($slug == 'Sản phẩm' || $slug == 'Tất cả sản phẩm') {
            $query = Product::query();
        } elseif ($slug == 'Camera') {
            $query = Product::query()->where(function ($query) {
                $query->where('slug', 'Camera Ip')
                    ->orWhere('slug', 'Camera Analog');
            });
        } elseif ($slug == 'Đầu ghi') {
            $query = Product::query()->where(function ($query) {
                $query->where('slug', 'Đầu ghi Ip')
                    ->orWhere('slug', 'Đầu ghi Analog');
            });
        } elseif ($slug == 'Phụ kiện') {
            $query = Product::query()->where('slug', 'Cáp')
                ->orWhere('slug', 'Nguồn')
                ->orWhere('slug', 'Chân đế')
                ->orWhere('slug', 'Phụ kiện khác');
        } elseif ($slug == 'Sản phẩm khác') {

            $query = Product::query()->where(function ($query) {
                $query->where('slug', 'Chuông cửa màn hình')
                    ->orWhere('slug', 'Khóa thông minh')
                    ->orWhere('slug', 'Thiết bị chấm công')
                    ->orWhere('slug', 'Switch')
                    ->orWhere('slug', 'Màn hình test camera')
                    ->orWhere('slug', 'Ổ cứng');
            });
        } elseif ($slug == 'Sản phẩm dành cho dự án') {
            $query = Product::query()->where('slug', 'Camera giao thông')
                ->orWhere('slug', 'Camera chống cháy nổ')
                ->orWhere('slug', 'Camera cảm biến nhiệt')
                ->orWhere('slug', 'Server lưu trữ')
                ->orWhere('slug', 'Video wall');
        } else {
            $query = Product::query()->where('slug', $slug);
        }

        // Thêm điều kiện active bằng 1 vào query
        $query->where('active', 1);
        switch ($sortBy) {
            case 'price-ascending':
                $query->orderBy('price');
                break;
            case 'price-descending':
                $query->orderByDesc('price');
                break;
            case 'title-ascending':
                $query->orderBy('name', 'asc');
                break;

            case 'title-descending':
                $query->orderBy('name', 'desc');
                break;
            case 'created-ascending':
                $query->orderBy('created_at', 'asc');
                break;

            case 'created-descending':
                $query->orderBy('created_at', 'desc');
                break;
        }


        $products = $query->paginate(36);
        foreach ($products as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }
        return view('Web.product.product-list', [
            'products' => $products,
            'displaySlug' => $displaySlug,
            // 'image' =>  $firstImage,
        ]);
    }





    public function detail($id = '', $slug = '')
    {
        $post = $this->productService->getById($id);
        $aaa = $this->productService->getProductItem();
        $Smartswitch = $this->productService->getBySmartswitch('Đầu ghi');
        $cameraItem = $this->productService->getByCamera('Camera');
        //dd($bbb);
        foreach ($aaa as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        foreach ($Smartswitch as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage1 = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage1 = $firstImage1;
            }
        }


        foreach ($cameraItem as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage2 = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage2 = $firstImage2;
            }
        }

        return view('Web.product.product-detail', [
            'postObject' => $post,
            'productt' => $aaa,
            'smartswitch' => $Smartswitch,
            'camera' => $cameraItem
        ]);
    }

    public function chinhsach($slug)
    {
        if (!$slug) {
            // Nếu không có $slug, chuyển hướng đến trang 404
            return view('Web.404-error');
        }
        $post = $this->policyService->getPostListBySlug($slug);
        // dd($post);


        return view('Web.polyci.polyci-list', [
            'postObject' => $post
        ]);
    }


    public function tintuc($category)
    {
        $post = $this->newService->getPostListByCategory($category);
        //dd($post);
        return view('Web.new.new-list', [
            'postObject' => $post,
            'newpost' => $this->newService->getNewPost()
        ]);
    }

    public function index($id = '', $slug = '')
    {
        $post = $this->newService->getById($id);
        // dd($post);
        return view('Web.new.new-detail', [
            'postObject' => $post,
            'newpost' => $this->newService->getNewPost()
        ]);
    }

    public function muahang($slug)
    {
        $post = $this->policyService->getPostListBySlug($slug);
        // dd($post);
        return view('Web.polyci.polyci-list', [
            'postObject' => $post
        ]);
    }

    public function search($query)
    {
        $searchQuery = $query;
        //dd($searchQuery);
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        $productsWithImages = [];

        foreach ($products as $product) {
            // Kiểm tra xem sản phẩm có ảnh không
            if ($product->imgPro->count() > 0) {
                // Lấy ảnh đầu tiên của sản phẩm
                $firstImage = $product->imgPro->first();

                // Thêm thông tin sản phẩm và ảnh vào mảng kết quả
                $productsWithImages[] = [
                    'product' => $product,
                    'firstImage' => $firstImage,
                ];
            }
        }

        return view('Web.search.list', [
            'search' => $searchQuery,
            'itemSearch' => $productsWithImages
        ]);
    }

    public function gioithieu($slug)
    {
        $post = $this->introduceService->getPostListBySlug($slug);
        // dd($post);
        return view('Web.introduce.introduce-list', [
            'postObject' => $post
        ]);
    }
}

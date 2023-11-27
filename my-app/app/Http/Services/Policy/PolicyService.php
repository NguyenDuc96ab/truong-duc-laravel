<?php


namespace App\Http\Services\Policy;


use App\Models\Image_Products;
use App\Models\Menu;
use App\Models\Policy;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PolicyService
{

    public function getAll()
    {
        return Policy::orderby('id')->paginate(20);
    }
    public function create($request)
    {
        try {
            Policy::create([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'slug' => $request->input('slug')
            ]);
            Session::flash('success', 'Tạo chính sách mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo chính sách mới không thành công, xin hãy thử lại');
        }
    }

    public function update($policy, $request)
    {
        try {
            $policy->name = $request->input('name');
            $policy->content = $request->input('content');
            $policy->slug = $request->input('slug');
            $policy->save();
            Session::flash('success', 'Chỉnh sửa chính sách mới thành công');
        } catch (\Exception $err) {

            Session::flash('error', 'Chỉnh sửa danh sách không thành công, xin hãy thử lại');
        }
    }

    public function delete($request)
    {
        $policy = Policy::where('id', $request->input('id'))->first();
        if ($policy) {

            $policy->delete();
            return true;
        }

        return false;
    }

    public function getPostListBySlug($slug)
    {
        $postList = null;
        $postList = Policy::where('slug', $slug)
            ->firstOrFail();

        return [
            'postList' => $postList,

        ];
    }
}

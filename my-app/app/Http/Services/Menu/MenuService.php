<?php


namespace App\Http\Services\Menu;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    public function getAll()
    {
        return Menu::orderby('id')->paginate(20);
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function create($request)
    {
        try {
            Menu::create([                     // create item mới dùng model Menu 
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'active' => (string) $request->input('active'),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            $patch = str_replace('storage', 'public',  $menu->thumb);  // xóa ảnh trong thư mục public
            Storage::delete($patch);
            $menu->delete();
            return true;
        }
        return false;
    }


    public function update($request, $menu)
    {
        try {
            if ($menu->id != $request->input('parent_id')) {
                $menu->parent_id = (int) $request->input('parent_id');
            }
            $menu->name = (string) $request->input('name');
            $menu->description = (string) $request->input('description');
            $menu->active = (string) $request->input('active');
            $menu->save();

            Session::flash('success', 'Update danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function delete($request)
    {
        $menu = Menu::where('id', $request->input('id'))->first();
        if ($menu) {

            try {
                unlink("storage/" . $menu->url);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $menu->delete();
            return true;
        }

        return false;
    }
}

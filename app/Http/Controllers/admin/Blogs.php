<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Blogs extends Controller
{
    use Common_trait;

    public function index()
    {
        $result['blogs'] = DB::table(BLOGS)->select('*')->get();

        return view('admin/blogs/index', $result);
    }

    public function add_blog(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:5|max:50',
            'content' => 'required|min:5',
            'status' => 'required',
            'imgs0' => 'required|mimes:jpg,jpeg,png',
        ],
            [
                'content.min' => 'Add more content',
            ]);

        $inputs = $request->input();
        foreach ($_FILES as $key => $value) {
            if ($value['name'] != '') {
                $img_name = time().'-'.Str::of(md5(time().$request->file($key)->getClientOriginalName()))->substr(0, 50).'.'.$request->file($key)->extension();
                $path = $request->file($key)->storeAs('admin-assets/img/pages/blogs', $img_name);
                $images[] = $img_name;
            }
        }
        $slug = $this->create_unique_slug($inputs['heading'], BLOGS, 'slug');
        $data = [
            'user_id' => trim(session('madminId')),
            'slug' => $slug,
            'heading' => $inputs['heading'],
            'content' => $inputs['content'],
            'imgs' => json_encode($images, JSON_FORCE_OBJECT),
            'status' => $inputs['status'],
        ];
        $result = DB::table(BLOGS)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/blogs')->with('flash-success', 'Blog added successfully');
        } else {
            return redirect('finalize-site-admin/blog-page')->with('flash-error', 'Some error occured in adding blog');
        }
    }

    public function edit_blog($slug = '')
    {
        $result['blog_info'] = DB::table(BLOGS)->where('slug', $slug)->first();

        return view('admin/blogs/edit-blog', $result);
    }

    public function remove_blog_images($slug = '', $key = '')
    {
        $blog_info = DB::table(BLOGS)->where('slug', $slug)->first();

        $blog_imgs = json_decode($blog_info->imgs, true);

        if (count($blog_imgs) > 1) {
            $delete_img = $blog_imgs[$key];
            unset($blog_imgs[$key]);

            $result = DB::table(BLOGS)
              ->where('slug', $slug)
              ->update(['imgs' => json_encode(array_values($blog_imgs), JSON_FORCE_OBJECT)]);

            if ($result) {
                unlink('public/admin-assets/img/pages/blogs/'.$delete_img);

                return redirect('finalize-site-admin/blog-edit/'.$slug)->with('flash-success', 'Image has deleted successfully');
            }
        } else {
            return redirect('finalize-site-admin/blog-edit/'.$slug)->with('flash-error', "Can\'t delete last image");
        }
    }

    public function update_blog(Request $request, $slug = '')
    {
        $request->validate([
            'heading' => 'required|min:5|max:50',
            'content' => 'required|min:5',
            'status' => 'required',
        ],
        [
            'content.min' => 'Add more content',
        ]);

        $blog_info = DB::table(BLOGS)->where('slug', $slug)->first();
        $blog_imgs = json_decode($blog_info->imgs, true);

        $inputs = $request->input();

        foreach ($_FILES as $key => $value) {
            if ($value['name'] != '') {
                $img_name = time().'-'.Str::of(md5(time().$request->file($key)->getClientOriginalName()))->substr(0, 50).'.'.$request->file($key)->extension();
                $path = $request->file($key)->storeAs('admin-assets/img/pages/blogs', $img_name);
                array_push($blog_imgs, $img_name);
            }
        }

        $data = [
            'heading' => $inputs['heading'],
            'content' => $inputs['content'],
            'imgs' => json_encode($blog_imgs, JSON_FORCE_OBJECT),
            'status' => $inputs['status'],
        ];

        $result = DB::table(BLOGS)
                    ->where('slug', '=', $slug)
                    ->update($data);

        if ($result) {
            return redirect('finalize-site-admin/blogs')->with('flash-success', 'Blog added successfully');
        } else {
            return redirect('finalize-site-admin/blog-edit/'.$slug)->with('flash-error', 'No changes made');
        }
    }

    public function blog_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(BLOGS)
                ->where('id', $request->input('id'))
                ->update(['status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function delete_blog($id = '')
    {
        $affected = DB::table(BLOGS)->where('id', '=', $id)->delete();

        if ($affected) {
            return redirect('finalize-site-admin/blogs')->with('flash-success', 'Blog deleted successfully');
        } else {
            return redirect('finalize-site-admin/blogs')->with('flash-error', 'Something went wrong, Please try again');
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    public function homepage(Request $request)
    {
        $welcome = DB::table(HOME_PAGE)->where(array('type' => 'welcome', 'page_name' => 'home'))->get();
        $result['banner'] = DB::table(HOME_PAGE)->where(array('type' => 'banner', 'page_name' => 'home'))->get();
        foreach ($result['banner'] as $key => $value) {
            $result['banner'][$key]->image = url('/public/admin-assets/img/pages/banner') . '/' . $value->image;
            $result['banner'][$key]->welcome_heading = $welcome[0]->heading;
            $result['banner'][$key]->welcome_content = $welcome[0]->content;
        }
        $result['about'] = DB::table(HOME_PAGE)->where(array('type' => 'about', 'page_name' => 'home'))->get();
        $result['services'] = DB::table(HOME_PAGE)->where(array('type' => 'services', 'page_name' => 'home'))->get();
        $result['contact'] = DB::table(HOME_PAGE)->where(array('type' => 'contact', 'page_name' => 'home'))->first();
        $result['contact']->urls = json_decode($result['contact']->urls);

        $response = [
            "message" => "success",
            "data" => $result,
        ];
        return response($response, 201);

    }
    public function getFaq(Request $request)
    {
        $page = $request->page ?? false;
        if ($page === false || trim($request->page) == null) {
            return response(['status' => 'fail', 'message' => ['Some data missing']], 406);
        } else {
            $offset = trim($request->page) * 15;
            $faq = DB::table(FAQ)->where('status', 0)->orderBy('cate_id','asc')->skip($offset)->take(15)->get();
            foreach ($faq as $key => $faq_data) {
                $faq[$key]->cate_name= DB::table(CATE)->where('cat_id',$faq_data->cate_id)->first()->cate_name;
            }
            $total_faq = DB::table(FAQ)->where('status', 0)->get()->count();

            $response = [
                "message" => "success",
                'data' => $faq,
                'count_rows' => $total_faq,
            ];
            return response($response, 201);
        }
    }

    public function getBlog(Request $request)
    {
        $page = $request->page ?? false;
        if ($page === false || trim($request->page) == null) {
            return response(['status' => 'fail', 'message' => ['Some data missing']], 406);
        } else {
            $offset = trim($request->page) * 10;
            $blog = DB::table(BLOGS)->where('status', 0)->skip($offset)->take(10)->get();
            $total_blog = DB::table(BLOGS)->where('status', 0)->get()->count();
            foreach ($blog as $key => $value) {
                $images = json_decode($value->imgs, true);
                foreach ($images as $url) {
                    $imgs[] = url('/public/admin-assets/img/pages/blogs') . '/' . $url;
                }
                $blog[$key]->imgs = $imgs ?? [];
            }
            $response = [
                "message" => "success",
                'data' => $blog,
                'count_rows' => $total_blog,
            ];
            return response($response, 201);
        }
    }
    public function singleBlog(Request $request)
    {
        $slug = trim($request->slug) ?? false;
        if ($slug === false || trim($request->slug) == null) {
            return response(['status' => 'fail', 'message' => ['Some data missing']], 406);
        } else {
            $blog = DB::table(BLOGS)->where(array('status' => 0, 'slug' => $slug))->first();
            if (empty($blog)) {
                return response(['status' => 'fail', 'message' => 'No Blog Found'], 201);
            } else {
                $images = json_decode($blog->imgs, true);
                foreach ($images as $key => $value) {
                    $imgs[] = url('/public/admin-assets/img/pages/blogs') . '/' . $value;
                }
                $blog->imgs = $imgs;
                $response = [
                    "message" => "success",
                    'data' => $blog,
                ];
                return response($response, 201);
            }
        }
    }

    public function terms_and_privacy(Request $request)
    {
        $terms = DB::table(PRIVACY)->where('type', 'terms')->get();
        $privacy = DB::table(PRIVACY)->where('type', 'privacy')->get();
        $response = [
            "message" => "success",
            'terms_and_privacy' => $terms,
            'privacy' => $privacy,
        ];
        return response($response, 201);
    }
    public function about()
    {
        $about = DB::table(HOME_PAGE)->where('page_name', 'about')->get();
        foreach ($about as $key => $value) {
            $about[$key]->image = url('/public/admin-assets/img/pages/about') . '/' . $value->image;
        }
        $response = [
            'message' => "success",
            'data' => $about,
        ];
        return response($response, 201);
    }
    public function contact()
    {
        $contact = DB::table(HOME_PAGE)->where('page_name', 'contact')->first();
        $contact->content = json_decode($contact->content);
        $response = [
            'message' => "success",
            'data' => $contact,
        ];
        return response($response, 201);
    }
}

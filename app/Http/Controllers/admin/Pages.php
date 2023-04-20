<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Pages extends Controller
{
    use Common_trait;

    public function index()
    {
        $result['template'] = DB::table(TEMPLATE)->select('id', 'name', 'slug')->get();
        return view('admin/pages/index', $result);

    }
    public function privacy_page()
    {
        $result['privacy_info'] = DB::table(PRIVACY)->where('type', 'privacy')->first();
        return view('admin/pages/privacy', $result);
    }

    public function edit_privacy(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:4',
            'content' => 'required|min:15',
        ],
            [
                'content.min' => 'Add more content',
            ]);

        $inputs = $request->input();
        $data = array(
            'heading' => trim($inputs['heading']),
            'content' => trim($inputs['content']),
        );
        $result = DB::table(PRIVACY)->where('type', 'privacy')->update($data);

        if ($result) {
            return redirect('finalize-site-admin/privacy-policy')->with('flash-success', 'Privacy edit successfully');
        } else {
            return redirect('finalize-site-admin/privacy-policy')->with('flash-error', 'Some error occured in edit privacy-policy');
        }
    }
    public function terms_condition()
    {
        $result['terms_info'] = DB::table(PRIVACY)->where('type', 'terms')->first();
        return view('admin/pages/terms-condition', $result);
    }
    public function edit_terms_condition(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:4',
            'content' => 'required|min:15',
        ],
            [
                'content.min' => 'Add more content',
            ]);

        $inputs = $request->input();
        $data = array(
            'heading' => trim($inputs['heading']),
            'content' => trim($inputs['content']),
        );
        $result = DB::table(PRIVACY)->where('type', 'terms')->update($data);

        if ($result) {
            return redirect('finalize-site-admin/terms-condition')->with('flash-success', 'T&C edit successfully');
        } else {
            return redirect('finalize-site-admin/terms-condition')->with('flash-error', 'Some error occured in edit T&C');
        }
    }
    public function template_page()
    {
        return view('admin/pages/template/template');
    }
    public function add_template(Request $request)
    {
        $request->validate([
            'template_name' => 'required|min:4|max:20|unique:' . TEMPLATE . ',name',
            'heading' => 'required|min:5|max:150',
            'content' => 'required|min:15',
            'img' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
        ],
            [
                'template_name.unique' => 'This name already exist',
                'content.min' => 'Add more content',
                'heading.max' => 'Remove some heading',
            ]);

        $inputs = $request->input();

        $img_name = time() . '-' . Str::of(md5(time() . $request->file('img')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img')->extension();

        $slug = $this->create_unique_slug($inputs['template_name'], TEMPLATE, 'slug');

        $path = $request->file('img')->storeAs('admin-assets/img/pages/template', $img_name);

        $data = array(
            'slug' => $slug,
            'name' => $inputs['template_name'],
            'heading' => $inputs['heading'],
            'content' => $inputs['content'],
            'img' => $img_name,
            'status' => $inputs['status'],
        );
        $result = DB::table(TEMPLATE)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/template')->with('flash-success', 'Template added successfully');
        } else {
            return redirect('finalize-site-admin/template')->with('flash-error', 'Some error occured in adding template');
        }
    }
    public function edit_template($slug = '')
    {
        $result['template_info'] = DB::table(TEMPLATE)->where('slug', $slug)->first();

        return view('admin/pages/template/edit-template', $result);
    }
    public function update_template(Request $request, $slug = '')
    {
        $request->validate([
            'template_name' => 'required|min:4|max:20',
            'heading' => 'required|min:5|max:150',
            'content' => 'required|min:15',
            'img' => 'mimes:jpg,jpeg,png',
            'status' => 'required',
        ],
            [
                'template_name.unique' => 'This name already exist',
                'content.min' => 'Add more content',
                'heading.max' => 'Remove some heading',
            ]);

        $inputs = $request->input();

        $template = DB::table(TEMPLATE)->where('slug', $slug)->first();

        $new_slug = $this->create_unique_slug($inputs['template_name'], TEMPLATE, 'slug');

        $exist_template = DB::table(TEMPLATE)
            ->where('slug', '=', $new_slug)
            ->where('id', '!=', $template->id)
            ->get();

        if (count($exist_template) > 0) {
            return redirect('finalize-site-admin/template-edit/' . $slug)->with('flash-error', 'This name is already exist');
        } else {
            $data = array(
                'slug' => $new_slug,
                'name' => ucfirst($inputs['template_name']),
                'heading' => $inputs['heading'],
                'content' => $inputs['content'],
                'status' => $inputs['status'],
            );
            if ($request->hasFile('img')) {

                $img_name = time() . '-' . Str::of(md5(time() . $request->file('img')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img')->extension();

                $path = $request->file('img')->storeAs('admin-assets/img/pages/template', $img_name);
                if ($path != '') {
                    Storage::delete('admin-assets/img/pages/template' . $template->img);
                    $data['img'] = $img_name;
                } else {
                    return redirect('finalize-site-admin/template-edit/' . $slug)->with('flash-error', 'Some error occured in uploading image');
                }
            }

            $result = DB::table(TEMPLATE)->where('slug', $slug)->update($data);

            if ($result) {
                return redirect('finalize-site-admin/template-edit/' . $new_slug)->with('flash-success', 'Template updated successfully');
            } else {
                return redirect('finalize-site-admin/template-edit/' . $new_slug)->with('flash-error', 'No changed occured');
            }
        }
    }
    public function delete_template($id = '')
    {
        $template = DB::table(TEMPLATE)->where('id', $id)->first();
        if (!empty($template)) {
            Storage::delete('admin-assets/img/pages/template' . $template->img);
        }
        $result = DB::table(TEMPLATE)->where('id', $id)->delete();

        if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Template delete successfully');
        } else {
            return redirect('finalize-site-admin/pages')->with('flash-error', 'Error in deleting template');
        }
    }
    public function banner()
    {
        $result['banner_data'] = DB::table(HOME_PAGE)->where(array('page_name' => 'home'))->get();
        return view('admin/pages/home/banner', $result);
    }
    public function edit_banner(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'imgs0' => 'required'
            
        ]);
       
        $inputs = $request->input();
        $image = time() . '_' . Str::of(md5(time() . $request->file('imgs0')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('imgs0')->extension();
        $path = $request->file('imgs0')->storeAs('admin-assets/img/pages/banner', $image);

        $checkdata = DB::table(HOME_PAGE)->get();
         
        if(empty($checkdata)){
        $data = array(
            'heading' => $inputs['title'],
            'content' => $inputs['sub_title'],
            'image' => $image,
            'urls' => '',
            'type' => 'section-1' 
        );
         $result = DB::table(HOME_PAGE)->insert($data);

            if ($result) {
               return redirect('finalize-site-admin/pages')->with('flash-success', 'Banner Add successfully');
            } else {
            return redirect('finalize-site-admin/banner')->with('flash-error', 'Some error occured in update banner');
            }
        }else{
        $data = array(
            'heading' => $inputs['title'],
            'content' => $inputs['sub_title'],
            'image' => $image,
            'urls' => '',
            'type' => 'section-1' 
        );

        $result = DB::table(HOME_PAGE)->update($data);

        if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Banner update successfully');
        } else {
            return redirect('finalize-site-admin/banner')->with('flash-error', 'Some error occured in update banner');
        }

    }

    }
    public function remove_banner_images($id = "", $key = "")
    {
        $banner_info = DB::table(HOME_PAGE)->where(array('type' => "banner", 'page_name' => 'home'))->get();

        if (count($banner_info) > 1) {
            $banner_img = DB::table(HOME_PAGE)->where(['id' => $id, 'type' => "banner", 'page_name' => 'home'])->first();

            if (!empty($banner_img)) {
                if (!empty($banner_img->image)) {
                    // unlink('public/admin-assets/img/pages/banner/' . $banner_img->image);
                }
                $result = DB::table(HOME_PAGE)->where(['id' => $id, 'type' => "banner"])->delete();
                return redirect('finalize-site-admin/banner')->with('flash-success', 'Image delete successfully');
            }

        } else {
            return redirect('finalize-site-admin/banner')->with('flash-error', 'Can not delete last image');
        }
    }
    public function welcome()
    {
        $result['welcome_data'] = DB::table(HOME_PAGE)->where(array('type' => "welcome", 'page_name' => 'home'))->first();
        return view('admin/pages/home/welcome', $result);
    }
    public function edit_welcome(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:5|max:50',
            'content' => 'required|min:15',
        ],
            [
                'content.min' => 'Add more content',
                'heading.max' => 'Remove some heading',
            ]);
        $inputs = $request->input();
        $data = array(
            'name' => 'welcome',
            'heading' => trim($inputs['heading']),
            'content' => trim($inputs['content']),
        );
        $result = DB::table(HOME_PAGE)->where(array('type' => "welcome", 'page_name' => 'home'))->update($data);
        if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Welcome data updated successfully');
        } else {
            return redirect('finalize-site-admin/welcome')->with('flash-error', 'No changes occured');
        }
    }
    public function contact()
    {
        $result['contact_data'] = DB::table(HOME_PAGE)->where(array('type' => "contact", 'page_name' => 'home'))->first();

        return view('admin/pages/home/contact', $result);
    }
    public function edit_contact(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:5|max:50',
            'content' => 'required|min:15',
            'facebook' => 'nullable|url',
            'insta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'google' => 'nullable|url',
            'youtube' => 'nullable|url',
        ],
            [
                'content.min' => 'Add more content',
                'heading.max' => 'Remove some heading',
            ]);
        $inputs = $request->input();
        $links = array(
            'facebook' => trim($inputs['facebook']),
            'insta' => trim($inputs['insta']),
            'twitter' => trim($inputs['twitter']),
            'google' => trim($inputs['google']),
            'youtube' => trim($inputs['youtube']),
        );
        $data = array(
            'name' => 'footer',
            'heading' => trim($inputs['heading']),
            'content' => trim($inputs['content']),
            'urls' => json_encode($links),
        );
        $result = DB::table(HOME_PAGE)->where(array('type' => "contact", 'page_name' => 'home'))->update($data);
        if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Contact data updated successfully');
        } else {
            return redirect('finalize-site-admin/contact')->with('flash-error', 'No changes occured');
        }
    }
// ABOUT US PAGE
    public function about_us()
    {
        $result['about_us'] = DB::table(HOME_PAGE)->where(array('page_name' => 'about'))->get();

        return view('admin/pages/about/about', $result);
    }
    public function edit_about_us(Request $request)
    {
        // pre($_POST);
        $request->validate([
            'heading.0' => 'required|min:5|max:50',
            'content.0' => 'required|min:15',
            'img0' => 'mimes:jpg,jpeg,png',
            'heading.1' => 'required|min:5|max:50',
            'content.1' => 'required|min:15',
            'img1' => 'mimes:jpg,jpeg,png',
            'heading.2' => 'required|min:5|max:50',
            'content.2' => 'required|min:15',
            'img2' => 'mimes:jpg,jpeg,png',
            'heading.3' => 'required|min:5|max:50',
            'content.3' => 'required|min:15',
            'img3' => 'mimes:jpg,jpeg,png',
        ], [
            'heading.0.min' => 'Section-1 Add more Heading',
            'heading.1.min' => 'Section-2 Add more Heading',
            'heading.2.min' => 'Section-3 Add more Heading',
            'heading.3.min' => 'Section-4 Add more Heading',
            'heading.0.max' => 'Section-1 Remove some Heading',
            'heading.1.max' => 'Section-2 Remove some Heading',
            'heading.2.max' => 'Section-3 Remove some Heading',
            'heading.3.max' => 'Section-4 Remove some Heading',
            'content.0.min' => 'Section-1 Add more Content',
            'content.1.min' => 'Section-2 Add more Content',
            'content.2.min' => 'Section-3 Add more Content',
            'content.3.min' => 'Section-4 Add more Content',
        ]
        );

        $inputs = $request->input();
        $image_array = ['', '', '', ''];
        if ($_FILES['img0']['name'] != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('img0')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img0')->extension();
            $path = $request->file('img0')->storeAs('admin-assets/img/pages/about', $img_name);
            $image_array[0] = $img_name;
        }
        if ($_FILES['img1']['name'] != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('img1')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img1')->extension();
            $path = $request->file('img1')->storeAs('admin-assets/img/pages/about', $img_name);
            $image_array[1] = $img_name;
        }
        if ($_FILES['img2']['name'] != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('img2')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img2')->extension();
            $path = $request->file('img2')->storeAs('admin-assets/img/pages/about', $img_name);
            $image_array[2] = $img_name;
        }
        if ($_FILES['img3']['name'] != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('img3')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img3')->extension();
            $path = $request->file('img3')->storeAs('admin-assets/img/pages/about', $img_name);
            $image_array[3] = $img_name;
        }
        $count = 0;
        for ($i = 0; $i < 4; $i++) {
            $data = array(
                'name' => 'about-us',
                'heading' => trim($inputs['heading'][$i]),
                'content' => trim($inputs['content'][$i]),
            );
            if ($image_array[$i] != '') {
                $data['image'] = $image_array[$i];
            }
            $result = DB::table(HOME_PAGE)->where(array('type' => "section-" . ($i + 1), 'page_name' => 'about'))->update($data);
            if ($result) {
                $count++;
            }
        }
        if ($count) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'About Us data updated successfully');
        } else {
            return redirect('finalize-site-admin/about-us')->with('flash-error', 'No changes occured');
        }
    }
    // ABOUT US PAGE
    public function contact_us()
    {
        $result['contact_us'] = DB::table(HOME_PAGE)->where(array('page_name' => 'contact'))->first();
        $result['contact_us'] = json_decode($result['contact_us']->content);
        return view('admin/pages/contact/contact', $result);
    }
    public function edit_contact_us(Request $request)
    {
        // pre($_POST);
        $request->validate([
            'contact' => 'required',
            'toll_free' => 'required',
            'business_no' => 'required',
            'email' => 'required',
        ], [
            'business_no.required' => 'Business Number is required',
            'toll_free.required' => 'Toll Free Number is required',
            'contact.required' => 'Contact Number is required',
        ]
        );

        $inputs = $request->input();
        unset($inputs['_token']);
        $inputs = json_encode($inputs);
        $affected = DB::table(HOME_PAGE)->where(array('page_name' => 'contact'))->update(array('content' => $inputs));

        if ($affected) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Contact Us data updated successfully');
        } else {
            return redirect('finalize-site-admin/contact-us')->with('flash-error', 'No changes occured');
        }
    }
    
    public function account_index(){
      
		$result = DB::table(ACCOUNT_PAGE)->get();
        return view('admin/pages/account/account-page')->with(compact('result'));

    }
  
    public function editAccount(Request $request)
    {

        $request->validate([
            'heading' => 'required',
            'cash_blance' => 'required',
            'credit_price' => 'required',
            'status' => 'required'
        ]);

        $inputs = $request->input();

        $data = array(
            'heading' => $inputs['heading'],
            'cash_blance' => $inputs['cash_blance'],
            'credit_price' => $inputs['credit_price'],
            'status' => $inputs['status'],
        );

          $result = DB::table(ACCOUNT_PAGE)->update($data);

		  if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'Account Page Edit Successfully');
        } else {
            return redirect()->back()->with('flash-error', 'Error in Add  Content Creators');
        }


    }



}

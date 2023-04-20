<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cate_model;
use App\Traits\Common_trait;
// use App\Traits\Create_product_tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Category extends Controller
{
    use Common_trait;
    // use Create_product_tables;

    public function __construct()
    {
        $this->cate_model = new Cate_model();
    }

    public function index()
    {
        $result['all_info'] = DB::table(CATE)->get();

        return view('admin/category/index', $result);
    }

    public function category_page()
    {
        return view('admin/category/add-cate');
    }

    public function add_category(Request $request)
    {
        $request->validate(
            [
                'cate_name' => 'required|min:4|max:20|unique:'.CATE,
                'description' => 'required|min:15|max:150',
                // 'img' => 'required|mimes:jpg,jpeg,png',
                'status' => 'required',
            ],
            [
                'cate_name.unique' => 'This name already exist',
                'description.min' => 'Add more description',
                'description.max' => 'Remove some description',
            ]
        );

        $inputs = $request->input();

        // $img_name = time() . '-' . Str::of(md5(time() . $request->file('img')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img')->extension();

        $slug = Str::of($request->input('cate_name'))->slug('-');
        $table_slug = Str::of($request->input('cate_name'))->slug('_');

        // $path = $request->file('img')->storeAs('admin-assets/img/categories', $img_name);

        $this->cate_model->cate_name = $inputs['cate_name'];
        $this->cate_model->description = $inputs['description'];
        $this->cate_model->slug = $slug;
        $this->cate_model->table_slug = $table_slug;
        // $this->cate_model->cate_img = $img_name;
        $this->cate_model->status = $inputs['status'];
        if ($this->cate_model->save()) {
            $insert_id = DB::getPdo()->lastInsertId();
            // $this->create_pro_table_from_cate($table_slug, $insert_id);

            return redirect('finalize-site-admin/category-page')->with('flash-success', 'Category added successfully');
        } else {
            return redirect('finalize-site-admin/category-page')->with('flash-error', 'Some error occured in adding category');
        }
    }

    public function category_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(CATE)
            ->where('cat_id', $request->input('id'))
            ->update(['status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function edit_category($slug = '')
    {
        $result['parent_cate'] = DB::table(CATE)->get();
        $result['cate_info'] = DB::table(CATE)->where('slug', $slug)->first();

        if (!empty($result['cate_info'])) {
            return view('admin/category/edit-cate', $result);
        } else {
            return redirect('finalize-site-admin/categories')->with('flash-error', 'No category found');
        }
    }

    public function update_category(Request $request, $slug = '')
    {
        $request->validate(
            [
                'cate_name' => 'required|min:4|max:20',
                'description' => 'required|min:15|max:150',
                'img' => 'mimes:jpg,jpeg,png',
                'status' => 'required',
            ],
            [
                'cate_name.unique' => 'This name already exist',
                'description.min' => 'Add more description',
                'description.max' => 'Remove some description',
            ]
        );

        $inputs = $request->input();

        $category = DB::table(CATE)->where('slug', $slug)->first();

        $new_slug = Str::of($request->input('cate_name'))->slug('-');

        $exist_category = DB::table(CATE)
            ->where('slug', '=', $new_slug)
            ->where('cat_id', '!=', $category->cat_id)
            ->get();

        if (count($exist_category) > 0) {
            return redirect('finalize-site-admin/category-edit/'.$slug)->with('flash-error', 'This name is already exist');
        } else {
            $cate_data = [
                'cate_name' => ucfirst($inputs['cate_name']),
                'parent_id' => $inputs['parent_id'],
                'description' => $inputs['description'],
                'slug' => $new_slug,
                'status' => $inputs['status'],
            ];

            if ($request->hasFile('img')) {
                $img_name = time().'-'.Str::of(md5(time().$request->file('img')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('img')->extension();

                $path = $request->file('img')->storeAs('admin-assets/img/categories', $img_name);

                if ($path != '') {
                    Storage::delete('admin-assets/img/categories/'.$category->cate_img);
                    $cate_data['cate_img'] = $img_name;
                } else {
                    return redirect('finalize-site-admin/category-edit/'.$slug)->with('flash-error', 'Some error occured in uploading image');
                }
            }

            $affected = DB::table(CATE)
                ->where('slug', $slug)
                ->update($cate_data);

            if ($affected) {
                return redirect('finalize-site-admin/category-edit/'.$new_slug)->with('flash-success', 'Category updated successfully');
            } else {
                return redirect('finalize-site-admin/category-edit/'.$new_slug)->with('flash-error', 'No changed occured');
            }
        }
    }

    // -------------------------SUB CATEGORY-------------------------

    public function sub_category_index()
    {
        $result['all_info'] = DB::table(SUBCATE)->get();

        return view('admin/sub-category/index', $result);
    }

    public function sub_category_page()
    {
        $result['cate_info'] = DB::table(CATE)->get();
        $result['all_info'] = DB::table(SUBCATE)->get();

        return view('admin/sub-category/add-subcate', $result);
    }

    public function sub_add_category(Request $request)
    {
        $request->validate(
            [
                'cat_id' => 'required',
                'subcate_name' => 'required|min:2|max:20|unique:'.SUBCATE,
                'description' => 'required|min:15|max:150',
                'status' => 'required',
            ],
            [
                'subcate_name.unique' => 'This name already exist',
                'description.min' => 'Add more description',
                'description.max' => 'Remove some description',
            ]
        );

        $inputs = $request->input();
        $slug = Str::of($request->input('subcate_name'))->slug('-');

        $data = ['cat_id' => $inputs['cat_id'],
            'parent_id' => $inputs['parent_id'],
            'subcate_name' => ucfirst($inputs['subcate_name']),
            'sub_cate_slug' => $slug,
            'description' => $inputs['description'],
            'status' => $inputs['status'],
        ];

        $result = DB::table(SUBCATE)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/sub-category-page')->with('flash-success', 'Sub Category added successfully');
        } else {
            return redirect('finalize-site-admin/sub-category-page')->with('flash-error', 'Some error occured in adding sub category');
        }
    }

    // -------------------------ATTRIBUTES-------------------------

    public function attributes_page()
    {
        $result['all_info'] = DB::table(ATTR)->select(ATTR.'.*', CATE.'.cate_name')->join(CATE, 'cat_id', 'category')->get();

        $result['all_cate'] = DB::table(CATE)->where('status', 0)->get();

        return view('admin/attributes/index', $result);
    }

    public function add_attribute(Request $request)
    {
        $request->validate([
            'attr_name' => 'required|min:3|max:15|unique:'.ATTR,
            'cat_ids' => 'required',
        ]);
        $inputs = $request->input();
        foreach ($inputs['cat_ids'] as $cat) {
            $slug = $this->create_unique_slug($inputs['attr_name'], ATTR, 'attr_slug');
            $data = [
                'attr_slug' => $slug,
                'attr_name' => ucfirst(trim($inputs['attr_name'])),
                'category' => $cat,
                'role' => '1',
                'adder_id' => trim(session('madminId')),
            ];
            $result = DB::table(ATTR)->insert($data);
        }

        if ($result) {
            return redirect('finalize-site-admin/attributes')->with('flash-success', 'Attribute added successfully');
        } else {
            return redirect('finalize-site-admin/attributes')->with('flash-error', 'Some error occured in adding attribute');
        }
    }

    public function edit_attribute($id = '')
    {
        $result['attr_info'] = DB::table(ATTR)->find($id);
        if (!empty($result['attr_info'])) {
            return view('admin/attributes/edit-attr', $result);
        } else {
            return redirect('finalize-site-admin/attributes')->with('flash-error', 'No attribute found');
        }
    }

    public function update_attribute(Request $request, $id = '')
    {
        $request->validate([
            'attr_name' => [
                'required', 'min:3', 'max:15', Rule::unique(ATTR)->ignore($id),
            ],
        ]);
        $inputs = $request->input();

        $affected = DB::table(ATTR)
            ->where('id', $id)
            ->update(['attr_name' => ucfirst(trim($request->input('attr_name')))]);

        if ($affected) {
            return redirect('finalize-site-admin/attributes')->with('flash-success', 'Attribute updated successfully');
        } else {
            return redirect('finalize-site-admin/attribute-edit/'.$id)->with('flash-error', 'No changed occured');
        }
    }

    // -------------------------BRANDS-------------------------

    public function brands_index()
    {
        $result['all_info'] = DB::table(BRAND)->get();

        return view('admin/brands/index', $result);
    }

    public function add_brand(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:20|unique:'.BRAND.',brand_name',
            'img' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
        ], [
            'unique' => 'This brand is already exist',
        ]);

        $inputs = $request->input();
        $slug = Str::of($request->input('name'))->slug('-');

        $img_name = time().'-'.Str::of(md5(time().$request->file('img')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('img')->extension();
        $path = $request->file('img')->storeAs('admin-assets/img/brands', $img_name);

        $data = [
            'brand_name' => ucfirst($inputs['name']),
            'brand_slug' => $slug,
            'logo' => $img_name,
            'status' => $inputs['status'],
        ];

        $result = DB::table(BRAND)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/brands-page')->with('flash-success', 'Brand added successfully');
        } else {
            return redirect('finalize-site-admin/brands-page')->with('flash-error', 'Some error occured in adding brand');
        }
    }

    public function brand_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(BRAND)
            ->where('id', $request->input('id'))
            ->update(['status' => $status_val]);
        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function edit_brand($slug = '')
    {
        $result['info'] = DB::table(BRAND)->where('brand_slug', $slug)->first();
        if (!empty($result['info'])) {
            return view('admin/brands/edit-brand', $result);
        } else {
            return redirect('finalize-site-admin/brands')->with('flash-error', 'No brand found');
        }
    }

    public function update_brand(Request $request, $slug = '')
    {
        $request->validate([
            'brand_name' => [
                'required', 'min:2', 'max:20', Rule::unique(BRAND)->ignore($slug, 'brand_slug'),
            ],
            'status' => 'required',
        ], [
            'unique' => 'This brand is already exist',
        ]);

        $inputs = $request->input();
        $new_slug = Str::of($request->input('brand_name'))->slug('-');

        $data = [
            'brand_name' => ucfirst($inputs['brand_name']),
            'brand_slug' => $new_slug,
            'status' => $inputs['status'],
        ];

        if ($request->hasFile('img')) {
            $brand_info = DB::table(BRAND)->where('brand_slug', $slug)->first();

            $img_name = time().'-'.Str::of(md5(time().$request->file('img')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('img')->extension();

            $path = $request->file('img')->storeAs('admin-assets/img/brands', $img_name);

            if ($path != '') {
                Storage::delete('admin-assets/img/brands/'.$brand_info->logo);
                $data['logo'] = $img_name;
            } else {
                return redirect('finalize-site-admin/brand-edit/'.$slug)->with('flash-error', 'Some error occured in uploading image');
            }
        }

        $result = DB::table(BRAND)
            ->where('brand_slug', $slug)
            ->update($data);

        if ($result) {
            return redirect('finalize-site-admin/brand-edit/'.$new_slug)->with('flash-success', 'Brand updated successfully');
        } else {
            return redirect('finalize-site-admin/brand-edit/'.$new_slug)->with('flash-error', 'No changes occured');
        }
    }

    // -------------------------TAGS-------------------------

    public function tags_page()
    {
        $result['all_info'] = DB::table(TAGS)->get();

        return view('admin/tags/index', $result);
    }

    public function add_tag(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:15|unique:'.TAGS.',tag_name',
            'status' => 'required',
        ], [
            'unique' => 'This tag is already exist',
        ]);
        $slug = Str::of($request->input('name'))->slug('-');

        $data = [
            'tag_name' => ucfirst(trim($request->input('name'))),
            'tag_slug' => $slug,
            'status' => $request->input('status'),
        ];
        $result = DB::table(TAGS)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/tags')->with('flash-success', 'Tag added successfully');
        } else {
            return redirect('finalize-site-admin/tags')->with('flash-error', 'Some error occured in adding tag');
        }
    }

    public function tag_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(TAGS)
            ->where('id', $request->input('id'))
            ->update(['status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function edit_tag($slug = '')
    {
        $result['info'] = DB::table(TAGS)->where('tag_slug', $slug)->first();

        if (!empty($result['info'])) {
            return view('admin/tags/edit-tag', $result);
        } else {
            return redirect('finalize-site-admin/tags')->with('flash-error', 'No tag found');
        }
    }

    public function update_tag(Request $request, $slug = '')
    {
        $request->validate([
            'tag_name' => [
                'required', 'min:3', 'max:15', Rule::unique(TAGS)->ignore($slug, 'tag_slug'),
            ],
            'status' => 'required',
        ], [
            'unique' => 'This tag is already exist',
        ]);

        $inputs = $request->input();
        $new_slug = Str::of($request->input('tag_name'))->slug('-');

        $data = [
            'tag_name' => ucfirst(trim($request->input('tag_name'))),
            'tag_slug' => $new_slug,
            'status' => $request->input('status'),
        ];

        $result = DB::table(TAGS)
            ->where('tag_slug', $slug)
            ->update($data);

        if ($result) {
            return redirect('finalize-site-admin/tag-edit/'.$new_slug)->with('flash-success', 'Tag updated successfully');
        } else {
            return redirect('finalize-site-admin/tag-edit/'.$new_slug)->with('flash-error', 'No changes occured');
        }
    }

    public function delete_tag($slug = '')
    {
        $result = DB::table(TAGS)->where('tag_slug', $slug)->delete();

        if ($result) {
            return redirect('finalize-site-admin/tags')->with('flash-success', 'Tag deleted successfully');
        } else {
            return redirect('finalize-site-admin/tags')->with('flash-error', 'Error occured in deleting tag');
        }
    }

    // -----------------------------ATTR VALUES-------------------------------

    // -------------------------ATTRIBUTES VALUES-------------------------

    public function attributes_value_page()
    {
        $result['all_value'] = DB::table(ATTR_VALUES)->select(ATTR_VALUES.'.*', ATTR.'.attr_name')->where(ATTR_VALUES.'.status', 0)->join(ATTR, ATTR.'.id', 'attr_id')->get();
        $result['all_attr'] = DB::table(ATTR)->get();
        foreach ($result['all_attr'] as $i => $attr) {
            $arr = [];
            foreach ($result['all_value'] as $j => $value) {
                if ($attr->id == $value->attr_id) {
                    $arr[] = $value->attr_value;
                }
            }
            $arr['attr_value'] = implode(',', ($arr ?? []));
            $a[] = array_merge(($arr ?? []), ((array) $attr ?? []));
        }

        $a = array_filter(($a ?? []), function ($k) {
            if ($k['attr_value'] != null || $k['attr_value'] != '') {
                return $k;
            }
        });
        $result['all_info'] = $a;

        return view('admin/attributes-values/index', $result);
    }

    public function add_attribute_value(Request $request)
    {
        $request->validate([
              'attr_id' => 'required',
              'attr_value' => 'required',
          ]);
          $inputs = $request->input();
          $attr_value = explode(',', $inputs['attr_value']);
          foreach ($attr_value as $value) {
              $slug = $this->create_unique_slug($value, ATTR_VALUES, 'attr_value_slug');
              $data = [
                  'attr_id' => trim($inputs['attr_id']),
                  'attr_value' => trim($value),
                  'attr_value_slug' => $slug,
                ];
                // pre($value);
            $exist = DB::table(ATTR_VALUES)->where(['attr_value' => trim($value), 'attr_id' => trim($inputs['attr_id'])])->first();
            if (empty($exist)) {
                $result = DB::table(ATTR_VALUES)->insert($data);
            } else {
                $update = DB::table(ATTR_VALUES)->where(['attr_value' => trim($value), 'attr_id' => trim($inputs['attr_id'])])->update(['status' => 0]);
                $result = 1;
            }
        }
        $id = DB::getPdo()->lastInsertId();
        if ($result) {
            return redirect('finalize-site-admin/attributes-values')->with('flash-success', 'Attribute values added successfully');
        } else {
            return redirect('finalize-site-admin/attributes-values')->with('flash-error', 'Some error occured in adding attribute value');
        }
    }

    public function edit_attribute_value($id = '')
    {
        $result['all_value'] = DB::table(ATTR_VALUES)->select(ATTR_VALUES.'.*', ATTR.'.attr_name')->where(ATTR_VALUES.'.status', 0)->join(ATTR, ATTR.'.id', 'attr_id')->get();
        $result['attr'] = DB::table(ATTR)->where('id', $id)->get();
        $result['all_attr'] = DB::table(ATTR)->get();
        foreach ($result['attr'] as $i => $attr) {
            $arr = [];
            foreach ($result['all_value'] as $j => $value) {
                if ($attr->id == $value->attr_id) {
                    $arr[] = $value->attr_value;
                }
            }
            $arr['attr_value'] = implode(',', ($arr ?? []));
            $a[] = array_merge(($arr ?? []), ((array) $attr ?? []));
        }

        $a = array_filter(($a ?? []), function ($k) {
            if ($k['attr_value'] != null || $k['attr_value'] != '') {
                return $k;
            }
        });
        $result['attr_info'] = $a[0];
        // pre($result['attr_info']);
        if (!empty($result['attr_info'])) {
            return view('admin/attributes-values/edit-attr-value', $result);
        } else {
            return redirect('finalize-site-admin/attributes-values')->with('flash-error', 'No attribute found');
        }
    }

    public function update_attribute_value(Request $request, $id = '')
    {
        $request->validate([
              'attr_id' => 'required',
              'attr_value' => 'required',
          ]);
        $inputs = $request->input();
        $attr_value = explode(',', $inputs['attr_value']);
        $u = DB::table(ATTR_VALUES)->where(['attr_id' => $id])->update(['status' => 1]);
        foreach ($attr_value as $value) {
            $slug = $this->create_unique_slug($value, ATTR_VALUES, 'attr_value_slug');
            $data = [
                  'attr_id' => trim($inputs['attr_id']),
                  'attr_value' => trim($value),
                  'attr_value_slug' => $slug,
              ];
            $exist = DB::table(ATTR_VALUES)->where(['attr_value' => trim($value), 'attr_id' => trim($inputs['attr_id'])])->first();
            if (empty($exist)) {
                $result = DB::table(ATTR_VALUES)->where('attr_value', '<>', ($value))->insert($data);
            } else {
                $update = DB::table(ATTR_VALUES)->where(['attr_value' => trim($value), 'attr_id' => trim($inputs['attr_id'])])->update(['status' => 0]);
                $result = 1;
            }
        }
        $id = DB::getPdo()->lastInsertId();
        if ($result) {
            return redirect('finalize-site-admin/attributes-values')->with('flash-success', 'Attribute values updated successfully');
        } else {
            return redirect('finalize-site-admin/attribute-value-edit/'.$id)->with('flash-error', 'No changes done');
        }
    }
}

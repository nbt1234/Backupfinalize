<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Products extends Controller
{
    use Common_trait;

    public function index()
    {
        // pre(date('Y-m-d H:i:s'));
        $result['all_info'] = DB::table(PROD)->where('vendor_id', session('mvenId'))->get();

        return view('vendor/products/index', $result);
    }

    public function products_page()
    {
        $result['cate_info'] = DB::table(CATE)->where('status', 0)->get();
        $result['brand_info'] = DB::table(BRAND)->where('status', 0)->get();
        $result['tags_info'] = DB::table(TAGS)->where('status', 0)->get();
        $result['attr_info'] = DB::table(ATTR)->get();

        return view('vendor/products/add-products', $result);
    }

    public function attributesCombination()
    {
        $data = [];
        parse_str($_POST['data'], $data);
        function get_combinations($arrays)
        {
            $result = [[]];
            foreach ($arrays as $property => $property_values) {
                $tmp = [];
                foreach ($result as $result_item) {
                    foreach (explode(',', $property_values) as $property_value) {
                        $tmp[] = array_merge($result_item, [$property => $property_value]);
                    }
                }
                $result = $tmp;
            }

            return $result;
        }

        $product_attr = array_unique($data['product_attr']);
        foreach ($product_attr as $i => $val) {
            if ($val == null || $val == '') {
                unset($product_attr[$i]);
            }
        }
        // array_filter($product_attr);
        foreach ($product_attr as $k => $attr) {
            $attr_val[$k] = $data['attr_val'][$k];
        }
        $combinations = get_combinations($attr_val);
        $html = '<table class="my-2 table table-hover table-bordered table-striped el-table">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>S.No</th>';
        foreach ($product_attr as $attr) {
            if ($attr == '' || $attr == null) {
            } else {
                $html .= '<th>'.$attr.'</th>';
            }
        }
        $html .= '<th>MRP</th>';
        $html .= '<th>Selling Price</th>';
        $html .= '<th>Status</th>';
        $html .= '</tr></thead><tbody>';
        foreach ($combinations as $key => $attr) {
            $html .= '<tr><td>'.$key + 1 .'</td>';
            foreach ($attr as $val) {
                $html .= '<td>'.ucfirst($val).'</td>';
            }
            $html .= "<td class='w-30'><input type='number' name='mrp_price[]' class='form-control'></td>";
            $html .= "<td><input type='number' name='sell_price[]' class='form-control'></td>";
            $html .= "<td><input type='checkbox' name='status-".$key."' class='form-control'></td>";
            $html .= '</tr>';
        }
        $html .= <<<COM
                </tbody>
            </table>
            COM;

        return $html;
    }

    public function vendor_product_insert_demo(Request $request)
    {
        // $request->validate([
        //     'pro_name' => 'required|min:5|max:200',
        //     'description' => 'required|min:20',
        //     'cat_ids' => 'required',
        //     'subcate' => 'required',
        //     'tag' => 'required',
        //     'brands' => 'required',
        //     'price' => 'required|numeric',
        //     'selling_price' => 'required|numeric',
        //     'title' => 'required',
        //     'meta_descr' => 'required',
        //     // 'base_img' => 'required|mimes:jpg,jpeg,png',
        //     'video' => 'max:20000',
        //     'status' => 'required',
        // ], [
        //     'video.max' => 'The :attribute can not greater than 20MB.',
        // ]);

        $product_adder = DB::table(VENDORS)->where('ven_id', session('mvenId'))->first();
        $ven_slug = $product_adder->ven_slug;
        if (!file_exists('public/products/'.$ven_slug)) {
            mkdir('public/products/'.$ven_slug, 0777, true);
        }

        $inputs = $request->input();
        if ($request->file('video')->getClientOriginalName() != '') {
            $video_path = time().'-'.Str::of(md5(time().$request->file('video')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('video')->extension();
            $request->file('video')->storeAs('products/'.$ven_slug, $video_path);
        }

        $slug = $this->create_unique_slug($inputs['pro_name'], PROD, 'pro_slug');

        // $base_img = time() . '-' . Str::of(md5(time() . $request->file('base_img')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('base_img')->extension();
        // $request->file('base_img')->storeAs('products/' . $ven_slug, $base_img);

        // foreach ($request->file() as $key => $value) {
        //     $img_name = time() . '-' . Str::of(md5(time() . $request->file($key)->getClientOriginalName()))->substr(0, 50) . '.' . $request->file($key)->extension();
        //     $imgs_name[] = $img_name;
        //     $path = $request->file($key)->storeAs('products/' . $ven_slug, $img_name);
        // }

        $product_data = [
            'pro_name' => $inputs['pro_name'],
            'vendor_id' => $request->session()->get('mvenId'),
            'pro_slug' => $slug,
            'cate_id' => $inputs['cat_ids'],
            'subcate_ids' => json_encode($inputs['subcate'] ?? '', JSON_FORCE_OBJECT),
            'brand_id' => $inputs['brands'],
            'short_desc' => $inputs['short_decription'],
            'description' => $inputs['description'],
            'tags' => json_encode($inputs['tag'] ?? '', JSON_FORCE_OBJECT),
            // 'other_images' => json_encode($imgs_name, JSON_FORCE_OBJECT),
            'mrp' => $inputs['price'],
            // 'main_image' => $base_img,
            'pro_video' => ($video_path ?? ''),
            'sell_price' => $inputs['selling_price'],
            'meta_title' => $inputs['title'],
            'meta_description' => $inputs['meta_descr'],
            'product_type' => $inputs['product_type'],
            'status' => $inputs['status'],
        ];

        $cate_data = DB::table(CATE)->where('cat_id', $inputs['cat_ids'])->first();
        $vendor_id = session('mvenId');

        // $prod_id = DB::table(MAIN_PROD . $cate_data->table_slug . PRO_CAT)->insertGetId($product_data);
        $prod_id = 3;

        // --------------------------VARIANT--------------------------
        foreach ($inputs['product_attr'] as $key => $value) {
            $attr_slug = Str::of($value)->slug('-');
            $attr_result[$key] = DB::table(ATTR)
                ->where('attr_slug', $attr_slug)
                ->where(function ($query) {
                    $query->where(['adder_id' => session('mvenId'), 'role' => 3])
                        ->orWhere('role', 1);
                })
                ->first();
            if (empty($attr_result[$key])) {
                $data = [
                    'attr_name' => $value,
                    'attr_slug' => $attr_slug,
                    'category' => $cate_data->cat_id,
                    'role' => 3,
                    'adder_id' => $vendor_id,
                ];
                $insert_attr_id = DB::table(ATTR)->insertGetId($data);
                $final_attrs[$key] = DB::table(ATTR)
                    ->where('id', $insert_attr_id)
                    ->first();
            } else {
                $final_attrs[$key] = $attr_result[$key];
            }
        }
        $var_data = [
            'pro_id' => $prod_id,
            'attr_id' => 1,
        ];
        foreach ($final_attrs as $key => $value) {
            $final_attrs[$key]->attr_values = $inputs['attr_val'][$key];
        }
        $attr_val_result_count = 0;
        foreach ($final_attrs as $key => $value) {
            $var_data = [
                'pro_id' => $prod_id,
                'attr_id' => $value->id,
                'cat_id' => $cate_data->cat_id,
            ];
            $var_data_result[$key] = DB::table(MAIN_PROD.$cate_data->table_slug.PRO_VARI)->insertGetId($var_data);

            $all_attr_values = explode(',', $value->attr_values);

            foreach ($all_attr_values as $key1 => $all_attr_value) {
                $attr_value_slug = Str::of($all_attr_value)->slug('-');

                $attr_val_result[$attr_val_result_count] = DB::table(ATTR_VAL)->where(['attr_id' => $value->id, 'attr_value_slug' => $attr_value_slug])->first();
                // pre($attr_val_result);
                if (empty($attr_val_result[$attr_val_result_count])) {
                    $all_attr_val_data = [
                        'attr_id' => $value->id,
                        'attr_value' => ucfirst($all_attr_value),
                        'attr_value_slug' => $attr_value_slug,
                    ];
                    // pre($all_attr_val_data);
                    $insert_attr_val_id = DB::table(ATTR_VAL)->insertGetId($all_attr_val_data);
                    $final_all_attr_values[$attr_val_result_count] = DB::table(ATTR_VAL)
                        ->where('id', $insert_attr_val_id)
                        ->first();
                    $final_all_attr_values[$attr_val_result_count]->variant_id = $var_data_result[$key];
                // pre($final_all_attr_values);
                } else {
                    // pre('$all_attr_val_data');
                    $final_all_attr_values[$attr_val_result_count] = $attr_val_result[$attr_val_result_count];
                    $final_all_attr_values[$attr_val_result_count]->variant_id = $var_data_result[$key];
                }
                ++$attr_val_result_count;
            }
        }

        // --------------------------VARIANT OPTIONS--------------------------
        // pre($final_all_attr_values);
        foreach ($final_all_attr_values as $key => $value) {
            $var_op_data = [
                'pro_id' => $prod_id,
                'cat_id' => $cate_data->cat_id,
                'variant_id' => $value->variant_id,
                'attr_val_id' => $value->id,
            ];
            // $variant_op_result = DB::table(MAIN_PROD . $cate_data->table_slug . PRO_VAR_OP)->insert($var_op_data);
        }
        $arrayName = [$inputs['attr_val']];

        $all_pro_combinations = $this->get_combinations($inputs['attr_val']);

        // pre($inputs);

        foreach ($all_pro_combinations as $key => $all_combination) {
            foreach ($all_combination as $key1 => $value) {
                $product_attrs = array_values($inputs['product_attr']);
                $all_pro_combinations[$key][strtolower($product_attrs[$key1])] = $value;
                unset($all_pro_combinations[$key][$key1]);
            }
        }

        $count = 0;
        foreach ($all_pro_combinations as $key => $value) {
            $combination_keys = array_keys($value);
            $combination_count = count($value);
            // pre($combination_keys);
            $inven_data = [
                'pro_id' => $prod_id,
                'inventory' => json_encode($value),
                'inventory_id' => $slug,
                'mrp' => $inputs['mrp_price'][$key],
                'sell_price' => $inputs['sell_price'][$key],
                'stocks' => 10,
            ];
            if (isset($inputs['status-'.$key])) {
                $inven_data['avail_status'] = 0;
            } else {
                $inven_data['avail_status'] = 1;
            }
            // if ($count <= $combination_count) {
            foreach ($final_all_attr_values as $key1 => $final_all_attr_value) {
                // pre($final_all_attr_values);
                if ($count < count($inputs['product_attr'])) {
                    $attr_value_slug = Str::of($value[$combination_keys[$count]])->slug('-');
                    // pre($attr_value_slug);
                    echo $attr_value_slug;
                    echo $count;
                    if ($final_all_attr_value->attr_value_slug == $attr_value_slug) {
                        $inventory_id[$count] = $final_all_attr_value->id;
                    } else {
                        // pre('asdasd');
                    }
                }
                ++$count;
                // }
                // pre($inventory_id);

                // $count++;
            }
            // pre($inventory_id);
            // $inven_result = DB::table(MAIN_PROD . $cate_data->table_slug . PRO_INVEN)->insert($inven_data);
        }
        pre($inventory_id);

        pre($inven_data);

        if ($inven_data) {
            return redirect('vendor/product-page')->with('flash-success', 'Product added successfully');
        } else {
            return redirect('vendor/product-page')->with('flash-error', 'Some error occured in adding product');
        }
    }

    //---------------------------------Vendor Product Insert Function -----------------------------------

    public function vendor_product_insert(Request $request)
    {
        // $request->validate([
        //     'pro_name' => 'required|min:5|max:200',
        //     'description' => 'required|min:20',
        //     'cat_ids' => 'required',
        //     'subcate' => 'required',
        //     'tag' => 'required',
        //     'brands' => 'required',
        //     'price' => 'required|numeric',
        //     'selling_price' => 'required|numeric',
        //     'title' => 'required',
        //     'meta_descr' => 'required',
        //     'base_img' => 'required|mimes:jpg,jpeg,png',
        //     'video' => 'max:20000',
        //     'status' => 'required',
        // ], [
        //     'video.max' => 'The :attribute can not greater than 20MB.',
        // ]);
        $inputs = $request->input();

        $slug = $this->create_unique_slug(trim($inputs['pro_name']), PROD, 'pro_slug');

        $product_adder = DB::table(VENDORS)->where('ven_id', session('mvenId'))->first();
        // $ven_slug = $product_adder->ven_slug;
        // if (!file_exists('public/products/'.$ven_slug)) {
        //     mkdir('public/products/'.$ven_slug, 0777, true);
        // }

        // if ($request->file('video')->getClientOriginalName() != '') {
        //     $video_path = time().'-'.Str::of(md5(time().$request->file('video')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('video')->extension();
        //     $request->file('video')->storeAs('products/'.$ven_slug, $video_path);
        // }

        // $base_img = time().'-'.Str::of(md5(time().$request->file('base_img')->getClientOriginalName()))->substr(0, 50).'.'.$request->file('base_img')->extension();
        // $request->file('base_img')->storeAs('products/'.$ven_slug, $base_img);

        // foreach ($request->file() as $key => $value) {
        //     $img_name = time().'-'.Str::of(md5(time().$request->file($key)->getClientOriginalName()))->substr(0, 50).'.'.$request->file($key)->extension();
        //     $imgs_name[] = $img_name;
        //     $path = $request->file($key)->storeAs('products/'.$ven_slug, $img_name);
        // }
        $sub_cate_ids = implode(',', $inputs['subcate']);
        $tags = implode(',', $inputs['tag']);

        $product_data = [
            'pro_name' => $inputs['pro_name'],
            'vendor_id' => $request->session()->get('mvenId'),
            'pro_slug' => $slug,
            'cate_id' => $inputs['cat_ids'],
            'subcate_ids' => $sub_cate_ids,
            'brand_id' => $inputs['brands'],
            'short_desc' => $inputs['short_decription'],
            'description' => $inputs['description'],
            'tags' => $tags,
            'gallery' => json_encode($imgs_name ?? [], JSON_FORCE_OBJECT),
            'mrp' => $inputs['price'],
            'main_image' => $base_img ?? '',
            'pro_video' => ($video_path ?? ''),
            'sell_price' => $inputs['selling_price'],
            'meta_title' => $inputs['title'],
            'meta_description' => $inputs['meta_descr'],
            'product_type' => $inputs['product_type'],
            'status' => $inputs['status'],
        ];

        $cate_data = DB::table(CATE)->where('cat_id', $inputs['cat_ids'])->first();

        $vendor_id = session('mvenId');

        $prod_id = DB::table(PROD)->insertGetId($product_data);

        // -------------------------- VARIANT --------------------------
        foreach ($inputs['product_attr'] as $key => $value) {
            $attr_slug = Str::of($value)->slug('-');
            $attr_result[$key] = DB::table(ATTR)
                ->where('attr_slug', $attr_slug)
                ->where(function ($query) {
                    $query->where(['adder_id' => session('mvenId'), 'role' => 3])
                        ->orWhere('role', 1);
                })
                ->first();
            if (empty($attr_result[$key])) {
                $data = [
                    'attr_name' => $value,
                    'attr_slug' => $attr_slug,
                    'category' => $cate_data->cat_id,
                    'role' => 3,
                    'adder_id' => $vendor_id,
                ];
                $insert_attr_id = DB::table(ATTR)->insertGetId($data);
                $final_attrs[$key] = DB::table(ATTR)->where('id', $insert_attr_id)->first();
            } else {
                $final_attrs[$key] = $attr_result[$key];
            }
        }

        foreach ($final_attrs as $key => $value) {
            $final_attrs[$key]->attr_values = $inputs['attr_val'][$key];
        }
        $attr_val_result_count = 0;
        foreach ($final_attrs as $key => $value) {
            // $all_attr_values = explode(',', $value->attr_values);
            $all_attr_values = $value->attr_values;
            
            foreach ($all_attr_values as $key1 => $all_attr_value) {
                $attr_value_slug = Str::of($all_attr_value)->slug('-');
                
                $attr_val_result[$attr_val_result_count] = DB::table(ATTR_VAL)->where(['attr_id' => $value->id, 'attr_value_slug' => $attr_value_slug])->first();
                // pre($attr_val_result);
                if (empty($attr_val_result[$attr_val_result_count])) {
                    $all_attr_val_data = [
                        'attr_id' => $value->id,
                        'attr_value' => ucfirst($all_attr_value),
                        'attr_value_slug' => $attr_value_slug,
                    ];
                    // pre($all_attr_val_data);
                    $insert_attr_val_id = DB::table(ATTR_VAL)->insertGetId($all_attr_val_data);
                    $final_all_attr_values[$attr_val_result_count] = DB::table(ATTR_VAL)
                    ->where('id', $insert_attr_val_id)
                    ->first();
                } else {
                    $final_all_attr_values[$attr_val_result_count] = $attr_val_result[$attr_val_result_count];
                }
                ++$attr_val_result_count;
            }
        }
        // pre($final_all_attr_values);
        // -------------------------- INVENTORY DATA--------------------------

        $product_attr_val = $inputs['attr_val'];
        $variation_product = $inputs['mrp_price'];
        $product_attr_drop = $inputs['product_attr_drop'];

        foreach ($product_attr_drop as $key => $value) {
            $product_attr_drop_data[] = (array)DB::table(ATTR_VAL)->select('id')->where('attr_value', $value)->first();
        }
        // $product_attr_drop_data = json_decode(json_encode($product_attr_drop_data), true);
        // pre($variation_product,true);
        // pre($product_attr_val,true);
        // pre($product_attr_drop);
        $var = '';
        $count = 0;
        foreach ($variation_product as $key => $value) {
            foreach ($product_attr_val as $key1 => $value) {
                $var .= $product_attr_drop_data[$count]['id'];
                $inventory[] = $product_attr_drop[$count];
                ++$count;
            }
            $inventories[] = $inventory;
            unset($inventory);

            $inventory_ids[] = $var;
            $var = '';
        }

        foreach ($inventories as $key => $inventory) {
            foreach ($inventory as $key1 => $value) {
                $product_attrs = array_values($inputs['product_attr']);
                $inventories[$key][strtolower($product_attrs[$key1])] = $value;
                unset($inventories[$key][$key1]);
            }
        }
        // pre($inventories);
        $count = 0;
        foreach ($inventories as $key => $value) {
            $combination_keys = array_keys($value);
            $inven_data = [
                'pro_id' => $prod_id,
                'inventory' => json_encode($value),
                'inventory_id' => $inventory_ids[$key],
                'mrp' => $inputs['mrp_price'][$key],
                'sell_price' => $inputs['sell_price'][$key],
                'stocks' => $inputs['stocks'][$key],
            ];
            if (isset($inputs['status-'.$key])) {
                $inven_data['avail_status'] = 0;
            } else {
                $inven_data['avail_status'] = 1;
            }
            foreach ($final_all_attr_values as $key1 => $final_all_attr_value) {
                if ($count < count($inputs['product_attr'])) {
                    $attr_value_slug = Str::of($value[$combination_keys[$count]])->slug('-');
                    if ($final_all_attr_value->attr_value_slug == $attr_value_slug) {
                        $inventory_id[$count] = $final_all_attr_value->id;
                    } else {
                    }
                }
                ++$count;
            }
            $inven_result[] = DB::table(INVEN)->insertGetId($inven_data);
        }
        foreach ($product_attr_drop_data as $key => $value) {
            $id = DB::table(ATTR_VAL)->where('id', $value['id'])->first();
            $relation_data = [
                'pro_id' => $prod_id,
                'cate_id' => $cate_data->cat_id,
                'inventory_id' => '',
                'attr_id' => $id->attr_id,
                'attr_value_id' => $value['id'],
            ];
            $result = DB::table(PRO_REL)->insert($relation_data);
        }
        if ($prod_id) {
            return redirect('vendor/product-page')->with('flash-success', 'Product added successfully');
        } else {
            return redirect('vendor/product-page')->with('flash-error', 'Product added successfully');
        }
    }

    public function get_product_subcategory_data(Request $request)
    {
        $inputs = $request->input();
        $result['subcate'] = DB::table(SUBCATE)->where('cat_id', $inputs['cat_id'])->get(['subcat_id', 'subcate_name']);
        // Table::select('name','surname')->where('id', 1)->get();
        if (!empty($result['subcate'])) {
            echo json_encode($result['subcate']);
        } else {
            echo 'error';
        }
    }

    public function get_attribute_values_data(Request $request)
    {
        $inputs = $request->input();
        $result['attr_value'] = DB::table(ATTR_VAL)->where('attr_id', $inputs['attr_id'])->get(['id', 'attr_value']);
        // Table::select('name','surname')->where('id', 1)->get();
        if (!empty($result['attr_value'])) {
            echo json_encode($result['attr_value']);
        } else {
            echo 'error';
        }
    }

    public function product_status_change_ven(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(PROD)
            ->where('id', $request->input('id'))
            ->update(['status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function delete_product($id = '')
    {
        //Delete product table data
        $affected = DB::table(PROD)->where('id', '=', $id)->delete();

        if ($affected) {
            //Delete inventory table data
            DB::table(INVEN)->where('pro_id', '=', $id)->delete();

            //Delete product relation table data
            DB::table(PRO_REL)->where('pro_id', '=', $id)->delete();

            return redirect('vendor/products')->with('flash-success', 'Product deleted successfully');
        } else {
            return redirect('vendor/products')->with('flash-error', 'Something went wrong, Please try again');
        }
    }
}

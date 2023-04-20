@extends('vendor/index')
@section('title', 'PRODUCTS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="add-product" role="form" method="post" action="{{ url('vendor/add-product-ven') }}" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title"> Add Product</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header cardout">
                                        <h3 class="card-title">Basic Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pro_name">Name</label>
                                                    <input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="Enter product name" value="pro name{{ old('pro_name') }}">
                                                    @error('pro_name')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_decription">Short Description</label>
                                                    <textarea class="textarea" name="short_decription" placeholder="short_decription">shrt desc{{ old('short_decription') }}</textarea>
                                                    @error('short_decription')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="textarea" name="description" placeholder="description">deas dsa dasd as ddsa da sdf sd fs dfs f  sdfssc{{ old('description') }}</textarea>
                                                    @error('description')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 category-section">
                                                <div class="form-group">
                                                    <label>Categories</label>
                                                    <div class="select2-primary">
                                                        <select class="select2 product-categories" id="cat_ids" name="cat_ids" data-placeholder="Select category" style="width:100%;">
                                                            <option value="">asd</option>
                                                            @foreach ($cate_info as $key => $cate)
                                                            <option value={{ $cate->cat_id }}>
                                                                {{ $cate->cate_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('cat_ids')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 subcategory-section">
                                                <div class="form-group">
                                                    <label>Sub Category</label>
                                                    <div class="select2-primary">
                                                        <select class="select2 subcategories" name="subcate[]" multiple="multiple" data-placeholder="Select sub category" style="width:100%;">
                                                            <option value=''> Select sub category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Brands</label>
                                                    <div class="select2-primary">
                                                        <select class="select2" id="brands" name="brands" data-placeholder="Select brands" style="width:100%;">
                                                            <option value="">Select Brand</option>
                                                            @foreach ($brand_info as $key => $brand)
                                                            <option value={{ $brand->id }}>
                                                                {{ $brand->brand_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('brands')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tags</label>
                                                    <div class="select2-primary">
                                                        <select class="select2" id="tag" name="tag[]" multiple="multiple" data-placeholder="Select Tags" style="width:100%;">
                                                            @foreach ($tags_info as $key => $tag)
                                                            <option value={{ $tag->tag_slug }}>
                                                                {{ $tag->tag_name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('tag')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Product Type</label>
                                                    <div class="select2-primary">
                                                        <select class="form-control select2" id="product_type" name="product_type">
                                                            <option selected value="0">Simple</option>
                                                            <option value="1">Variable</option>
                                                        </select> 
                                                    </div>
                                                    @error('product_type')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="hidden attribute-section w-100">
                                                <!--Variable Content -->
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-md-12 col-sm-12 product-variation-data">


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="status" checked id="active_status" value="0">
                                                    <label for="active_status" class="custom-control-label">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="status" id="inactive_status" value="1">
                                                    <label for="inactive_status" class="custom-control-label">Inactive</label>
                                                </div>
                                                @error('status')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Price</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="price">MRP</label>
                                                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="100{{ old('price') }}">
                                                    @error('price')
                                                    <div class="form-valid-error">{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="selling_price">Selling price</label>
                                                    <input type="text" name="selling_price" class="form-control" id="price" placeholder="Enter price" value="150{{ old('selling_price') }}">
                                                    @error('selling_price')
                                                    <div class="form-valid-error">{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Add SEO</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title">Meta Title</label>
                                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="meta{{ old('title') }}">
                                                    @error('title')
                                                    <div class="form-valid-error">{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_descr">Meta Description</label>
                                                    <input type="text" name="meta_descr" class="form-control" id="meta_descr" placeholder="Enter meta description" value=" meta desc{{ old('meta_descr') }}">
                                                    @error('meta_descr')
                                                    <div class="form-valid-error">{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Product Images</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="imgs">Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="base_img" class="custom-file-input" id="base_img">
                                                <label class="custom-file-label" for="base_img">Choose Image</label>
                                            </div>
                                        </div>
                                        @error('base_img')
                                        <div class="form-valid-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="product-imgs-section">
                                        <label for="imgs">Gallery Image</label>
                                        <div class="row product-img-block0">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img" class="custom-file-input" id="img">
                                                            <label class="custom-file-label" for="img">Choose
                                                                Image</label>
                                                        </div>
                                                    </div>
                                                    @error('img')
                                                    <div class="form-valid-error">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn add-product-ven-img btn-block btn-warning"><i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="imgs">Product Video</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*" class="custom-file-input" id="video">
                                                <label class="custom-file-label" for="video">Choose Video</label>
                                            </div>
                                        </div>
                                        @error('video')
                                        <div class="form-valid-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</div>
<!-- </div> -->
</div>
</section>
</div>
<div class="hidden" id="attr_option">
    <option value="">Select Attribute</option>
    @foreach ($attr_info as $key => $attr)
    <option value={{ $attr->attr_name }} data-id={{$attr->id}}>{{ $attr->attr_name }}</option>
    @endforeach
</div>

@stop
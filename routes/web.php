<?php

use App\Http\Controllers\admin\Blogs;
// -------------------------------ADMIN-------------------------------
use App\Http\Controllers\admin\Category;
use App\Http\Controllers\admin\Social;
use App\Http\Controllers\admin\Creators;
use App\Http\Controllers\admin\Faqs;
use App\Http\Controllers\admin\PaymentHistory;
use App\Http\Controllers\admin\Login;
use App\Http\Controllers\admin\Pages;
use App\Http\Controllers\admin\Settings;
use App\Http\Controllers\admin\Subadmin;
use App\Http\Controllers\admin\Tournament;
use App\Http\Controllers\admin\Vendors;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\vendor\Inventory;
// ---------------------------------------VENDOR---------------------------------------

use App\Http\Controllers\vendor\Products;
use App\Http\Controllers\vendor\Vendor_home;
use App\Http\Controllers\vendor\Ven_login;
use Illuminate\Support\Facades\Route;

Route::middleware('preventBackHistory')->group(function () {

// ---------------------------------------ADMIN---------------------------------------
    Route::view('access-denied', 'admin/denied-access');
    Route::get('/', [HomeController::class, 'index']);
    Route::middleware('admin_not_in')->group(function () {Route::view('finalize-admin-login', 'admin/login');});
    Route::prefix('finalize-admin-login')->middleware('admin_not_in')->group(function () {
        Route::view('/login', 'admin/login');
        Route::post('/login-insert', [Login::class, 'check_login']);

        Route::view('/forget-password', 'admin/forget-password');
        Route::post('/forget-password/verify', [Login::class, 'forget_password_insert']);

        Route::view('/forget-key', 'admin/otp');
        Route::post('/key-verify', [Login::class, 'forget_key_verify']);

        Route::view('/recover-password', 'admin/recover-password');
        Route::post('/recover-password-save', [Login::class, 'save_recover_password']);
    });

    Route::middleware('admin_in')->group(function () {
        Route::view('finalize-site-admin', 'admin/dashboard');
    });
    Route::prefix('finalize-site-admin')->middleware('admin_in')->group(function () {
        Route::view('dashboard', 'admin/dashboard');

        Route::middleware('subadmin_verify:subadmin_section')->group(function () {
            Route::get('/subadmin', [Subadmin::class, 'index']);
            Route::view('/subadmin-page', 'admin/subadmin/add-subadmin');
            Route::post('/subadmin-add', [Subadmin::class, 'add_subadmin']);
            Route::post('/subadmin-status-change', [Subadmin::class, 'subadmin_status_change']);
            Route::get('/subadmin-access/{id}', [Subadmin::class, 'subadmin_access_ctrl']);
            Route::post('/subadmin-insert-access/{id}', [Subadmin::class, 'insert_subadmin_access']);
            // Route::get('/subadmin-edit/{id}', [Subadmin::class, 'edit_subadmin']);
            // Route::post('/subadmin-update/{id}', [Subadmin::class, 'update_subadmin']);
        });

        Route::middleware('subadmin_verify:category_section')->group(function () {
            Route::get('/categories', [Category::class, 'index']);
            Route::get('/category-page', [Category::class, 'category_page']);
            Route::post('/category-add', [Category::class, 'add_category']);
            Route::post('/category-status-change', [Category::class, 'category_status_change']);
            Route::get('/category-edit/{id}', [Category::class, 'edit_category']);
            Route::post('/category-update/{id}', [Category::class, 'update_category']);
        });

        Route::middleware('subadmin_verify:sub_category_section')->group(function () {
            Route::get('/sub-categories', [Category::class, 'sub_category_index']);
            Route::get('/sub-category-page', [Category::class, 'sub_category_page']);
            Route::post('/sub-category-add', [Category::class, 'sub_add_category']);
            Route::post('/category-status-change', [Category::class, 'category_status_change']);
            Route::get('/sub-category-edit/{id}', [Category::class, 'edit_category']);
            Route::post('/sub-category-update/{id}', [Category::class, 'update_category']);
        });


        Route::get('/creators', [Creators::class, 'index']);
        Route::get('/creators-content-page', [Creators::class, 'creators_page']);
        Route::post('/creators-add', [Creators::class, 'content_creators_add']);
        Route::get('/creators-edit/{id}', [Creators::class, 'edit_creators']);
        Route::post('/creators-update/{id}', [Creators::class, 'update_creators']);
        Route::get('/creators-delete/{id}', [Creators::class, 'delete_creators']);
        

        Route::get('/tournament', [Tournament::class, 'index']);
        Route::get('/add-tournament', [Tournament::class, 'add_tournament']);
        Route::post('/tournament-page', [Tournament::class, 'save_tournament']);
        Route::get('/edit-tournament/{id}', [Tournament::class, 'edit_tournament']);
        Route::post('/edit-tournament-page/{id}', [Tournament::class, 'update_tournament']);
        Route::get('/tournament-delete/{id}', [Tournament::class, 'delete_tournament']);

        Route::get('/social-users', [Social::class, 'index']);
        Route::post('/edit-social-user', [Social::class, 'editSocialUser']); 

        Route::get('/payment-history', [PaymentHistory::class, 'index']);
         
        Route::get('/account-page', [Pages::class, 'account_index']);
        Route::post('/account-page-edit', [Pages::class, 'editAccount']);  

        Route::get('/brands', [Category::class, 'brands_index']);
        Route::view('brands-page', 'admin/brands/add-brand');
        Route::post('/brand-add', [Category::class, 'add_brand']);
        Route::post('/brand-status-change', [Category::class, 'brand_status_change']);
        Route::get('/brand-edit/{id}', [Category::class, 'edit_brand']);
        Route::post('/brand-update/{id}', [Category::class, 'update_brand']);

        Route::get('/attributes', [Category::class, 'attributes_page']);
        Route::post('/attribute-add', [Category::class, 'add_attribute']);
        Route::get('/attribute-edit/{id}', [Category::class, 'edit_attribute']);
        Route::post('/attribute-update/{id}', [Category::class, 'update_attribute']);

        Route::get('/attributes-values', [Category::class, 'attributes_value_page']);
        Route::post('/attribute-value-add', [Category::class, 'add_attribute_value']);
        Route::get('/attribute-value-edit/{id}', [Category::class, 'edit_attribute_value']);
        Route::post('/attribute-value-update/{id}', [Category::class, 'update_attribute_value']);

        Route::get('/tags', [Category::class, 'tags_page']);
        Route::post('/tag-add', [Category::class, 'add_tag']);
        Route::post('/tag-status-change', [Category::class, 'tag_status_change']);
        Route::get('/tag-edit/{id}', [Category::class, 'edit_tag']);
        Route::post('/tag-update/{id}', [Category::class, 'update_tag']);
        Route::get('/tag-delete/{id}', [Category::class, 'delete_tag']);

        Route::get('/vendors', [Vendors::class, 'index']);
        Route::post('/vendor-status-change', [Vendors::class, 'vendor_status_change']);

        //////////////// SITE PAGES//////////////////
        Route::get('/pages', [Pages::class, 'index']);
        // SITE BANNER
        Route::get('/banner', [Pages::class, 'banner']);
        Route::get('/banner/remove-image/{id}/{key}', [Pages::class, 'remove_banner_images']);
        Route::post('/banner-edit', [Pages::class, 'edit_banner']);
        // SITE WELCOME
        Route::get('/welcome', [Pages::class, 'welcome']);
        Route::post('/welcome-edit', [Pages::class, 'edit_welcome']);
        // SITE ABOUT
        Route::get('/about', [Pages::class, 'about']);
        Route::post('/about-edit', [Pages::class, 'edit_about']);
        // SITE SERVICES
        Route::get('/services', [Pages::class, 'services']);
        Route::post('/services-edit', [Pages::class, 'edit_services']);
        // SITE CONTACT
        Route::get('/contact', [Pages::class, 'contact']);
        Route::post('/contact-edit', [Pages::class, 'edit_contact']);

        // ABOUT US
        Route::get('/about-us', [Pages::class, 'about_us']);
        Route::post('/about-us-edit', [Pages::class, 'edit_about_us']);

        // CONTACT US
        Route::get('/contact-us', [Pages::class, 'contact_us']);
        Route::post('/contact-us-edit', [Pages::class, 'edit_contact_us']);

        Route::get('/privacy-policy', [Pages::class, 'privacy_page']);
        Route::post('/privacy-edit', [Pages::class, 'edit_privacy']);
        Route::get('/terms-condition', [Pages::class, 'terms_condition']);
        Route::post('/terms-condition-edit', [Pages::class, 'edit_terms_condition']);

        Route::get('template', [Pages::class, 'template_page']);
        Route::post('/template-add', [Pages::class, 'add_template']);
        Route::get('/template-edit/{slug}', [Pages::class, 'edit_template']);
        Route::post('/template-update/{slug}', [Pages::class, 'update_template']);
        Route::get('/template-delete/{id}', [Pages::class, 'delete_template']);

        Route::get('/setting', [Settings::class, 'index']);
        Route::post('/setting-paypal-edit', [Settings::class, 'update_paypal']);

        Route::middleware('subadmin_verify:faq_section')->group(function () {
            Route::get('/faqs', [Faqs::class, 'index']);
            Route::get('/faq-page', [Faqs::class, 'faq_page']);
            // Route::view('/faq-page', 'admin/faqs/add-faq');
            Route::post('/faq-add', [Faqs::class, 'add_faq']);
            Route::get('/faq-edit/{id}', [Faqs::class, 'edit_faq']);
            Route::post('/faq-update/{id}', [Faqs::class, 'update_faq']);
            Route::post('/faq-status-change', [Faqs::class, 'faq_status_change']);
            Route::get('/faq-delete/{id}', [Faqs::class, 'delete_faq']);
        });

        Route::middleware('subadmin_verify:blog_section')->group(function () {
            Route::get('/blogs', [Blogs::class, 'index']);
            Route::view('/blog-page', 'admin/blogs/add-blog');
            Route::post('/blog-add', [Blogs::class, 'add_blog']);
            Route::get('/blog-edit/{slug}', [Blogs::class, 'edit_blog']);
            Route::post('/blog-update/{slug}', [Blogs::class, 'update_blog']);
            Route::post('/blog-status-change/', [Blogs::class, 'blog_status_change']);
            Route::get('/blog/remove-image/{slug}/{key}', [Blogs::class, 'remove_blog_images']);
            Route::get('/blog-delete/{id}', [Blogs::class, 'delete_blog']);
        });
    });

    Route::get('/finalize-site-admin/logout', [Login::class, 'logout']);

// ---------------------------------------END ADMIN---------------------------------------

// ---------------------------------------VENDOR---------------------------------------

    Route::prefix('vendor')->middleware('vendor_not_in')->group(function () {
        Route::view('/login', 'vendor/login');
        Route::post('/login-insert', [Ven_login::class, 'check_login']);

        Route::view('/signup', 'vendor/signup');
        Route::post('/signup-insert', [Ven_login::class, 'check_signup']);
        Route::post('/google-login', [Ven_login::class, 'social_login']);

        Route::view('/forget-password', 'vendor/forget-password');
        Route::post('/forget-password/verify', [Ven_login::class, 'forget_password_insert']);

        Route::view('/forget-key', 'vendor/otp');
        Route::post('/key-verify', [Ven_login::class, 'forget_key_verify']);

        Route::view('/recover-password', 'vendor/recover-password');
        Route::post('/recover-password-save', [Ven_login::class, 'save_recover_password']);

        Route::get('login/facebook', [Ven_login::class, 'redirectToFacebook'])->name('login.facebook');
        Route::get('login/facebook/callback', [Ven_login::class, 'handleFacebookLogin']);

        Route::get('login/google', [Ven_login::class, 'redirectToGoogle'])->name('login.google');
        Route::get('login/google/callback', [Ven_login::class, 'handleGoogleLogin']);
    });

    Route::prefix('vendor')->middleware('vendor_in')->group(function () {
        Route::view('dashboard', 'vendor/dashboard');

        // PRODUCT SECTION
        Route::get('/products', [Products::class, 'index']);
        Route::get('/product-page', [Products::class, 'products_page']);
        Route::get('/product-delete/{id}', [Products::class, 'delete_product']);
        Route::post('/add-product-ven', [Products::class, 'vendor_product_insert']);
        Route::post('/product-status-change', [Products::class, 'product_status_change_ven']);

        // INVENTORY SECTION
        Route::get('/inventory', [Inventory::class, 'index']);
        Route::get('/product-page', [Products::class, 'products_page']);
        Route::get('/product-delete/{id}', [Products::class, 'delete_product']);
        Route::post('/add-product-ven', [Products::class, 'vendor_product_insert']);

        Route::post('/attr-combination', [Products::class, 'attributesCombination']);
        Route::post('/get-product-subcategory', [Products::class, 'get_product_subcategory_data']);
        Route::post('/get-attribute-values', [Products::class, 'get_attribute_values_data']);

        Route::get('/edit-profile', [Vendor_home::class, 'edit']);
        Route::post('/update-profile', [Vendor_home::class, 'update']);
    });

    Route::get('/vendor/logout', [Ven_login::class, 'logout']); 
});
// ---------------------------------------END VENDOR---------------------------------------


//--------------------------------Payment Integration---------------------------------------
 Route::get('/payment/{tournament_id}', [PaymentController::class, 'index']);
 Route::get('/success', [PaymentController::class, 'successPage']);
 Route::post('/pay', [PaymentController::class, 'pay']);


//----------------------------------Password --------------------
 Route::get('/Forgot-Password', [ForgotPasswordController::class, 'index']);
Route::post('/reset-password', [ForgotPasswordController::class, 'reset_password']);
Route::get('/password-reset-form', function(){return view('front/new-password');});
Route::post('/new-password', [ForgotPasswordController::class, 'new_password']);


 //----------------------------------------Payment Integration End -------------------------------------------------
Route::get('/signup', [SignupController::class, 'index']);
Route::get('/sign-out', [SignupController::class, 'sign_out']);
Route::post('/User-Signup', [SignupController::class, 'sign_up']);
Route::get('/signin', [SigninController::class, 'index']);
Route::post('/User-Signin', [SigninController::class, 'sign_in']);



Route::get('/home', [HomeController::class, 'index']);
Route::get('/account', [AccountController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/credit-referrals', function () {return view('front/credit-referrals');});
Route::get('/you-did-it', function () {return view('front/you-did-it');});

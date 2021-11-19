<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

//Trang đăng nhập
Route::get('page-login', 'HomeController@page_login');

//Đăng xuất
Route::get('logout', 'AdminController@logout');

//ĐĂNG NHẬP CSDL
Route::post('post-login', 'AdminController@post_login');





//======================================================//
//TRANG CHỦ
Route::get('/', 'HomeController@index');

//Trang sản phẩm
Route::get('page-product', 'HomeController@page_product');

//Trang phân loại
Route::get('page-category/{category_name}/{id_category}', 'HomeController@page_category');

//Trang hiển thị chi tiết sản phẩm
Route::get('page-product-detail/{product_name}/{id_product}', 'HomeController@page_product_detail');

//Trang hiển thị bình luận
Route::post('post-comment-user/{id_user}/{id_product}','HomeController@post_comment_user');

//Trang bấm trả lời bình luận(Thêm mới trả lời bình luận)
Route::post('post-reply-comment/{id_user}/{id_comment}', 'HomeController@post_reply_comment');

//Thêm vào giỏ hàng (Dùng trong trang chi tiết sản phẩm)
Route::post('add-to-cart/{id_user}/{id_product}', 'HomeController@add_to_cart');

//Nhấp thêm vào giỏ hàng (Dùng trong trang index và trang cửa hàng)
Route::get('add-cart/{id_user}/{id_product}','HomeController@add_cart');




//Trang đăng ký
Route::get('page-sign-up', 'HomeController@page_sign_up');

//Xử lý đăng ký
Route::post('post-sign-up', 'HomeController@post_sign_up');

//Trang giỏ hàng
Route::get('page-cart/{id_user}', 'HomeController@page_cart');

//Trang giỏ hàng
Route::put('update-cart/{id_user}/{id_cart}', 'HomeController@update_cart');

//Xóa sản phẩm trong giỏ hàng
Route::get('delete-product-cart/{id_cart}','HomeController@delete_product_cart');

//Trang liên lạc
Route::get('page-contact', 'HomeController@page_contact');

//Trang tin tức
Route::get('page-news', 'HomeController@page_news');




//=======================================//
//Trang hồ sơ cá nhân
Route::get('page-profile-user-information', 'HomeController@page_profile_user');

//Trang đổi mật khẩu người dùng
Route::get('page-change-password', 'HomeController@page_change_password');

//Trang chờ thanh toán
Route::get('page-wait-payment/{id_user}', 'HomeController@page_wait_payment');

//HỦY ĐƠN HÀNG TRONG TRANG CHỜ THANH TOÁN
Route::get('delete_order/{id_order}','HomeController@delete_order');

//Trang hiển thị trạng thái giao hàng
Route::get('page-product-deliveried/{id_user}', 'HomeController@page_product_deliveried');

//Trang đã đã hủy
Route::get('page-product-cancelled/{id_user}', 'HomeController@page_product_cancelled');


//Trang thanh toán
Route::get('page-checkout/{id_user}', 'HomeController@page_checkout');

//Đặt hàng thanh toán
Route::post('checkout-payment/{id_user}', 'HomeController@checkout_payment');

//Trang chỉnh sửa thông tin khách hàng
Route::get('page-edit-info-user/{id_user}', 'HomeController@page_edit_info_user');

//Cập nhật thông tin khách hàng
Route::put('update-info-user/{id_user}', 'HomeController@update_info_user');

//==================================================================================//





Route::middleware([CheckLogin::class])->group(function () {
    //==================================================================================//
    //ADMIN
    Route::get('page-admin', 'AdminController@page_admin');
    

    //Hiển thị profile admin
    Route::get('infor-profile-user/{id_user}', 'AdminController@infor_profile_user');

    //Cập nhật thông tin admin
    Route::put('update-infor-user/{id_user}', 'AdminController@update_infor_user');

    //Thay đổi mật khẩu quản trị viên
    Route::get('change-pass/{id_user}', 'AdminController@change_pass');

    //Thay đổi mật khẩu quản trị viên
    Route::post('update-change-password/{id_user}', 'AdminController@update_change_password');


    //Quyền truy cập
    Route::get('page-role-access', 'AdminController@page_role_access');


    //Thay đổi truy cập
    Route::get('page-change-role/{id_role}', 'AdminController@page_change_role');

    //Thay doi truy cap CSDL
    Route::put('update-role/{id_role}', 'AdminController@update_role');

    //Quan tri vien
    Route::get('page-administation', 'AdminController@page_administation');

    //Thêm quyền
    Route::get('page-add-admin', 'AdminController@page_add_admin');


    //Nhân viên
    Route::get('page-employee', 'AdminController@page_employee');

    //Xóa nhân viên
    Route::get('delete-emloyee/{id_emloyee}', 'AdminController@delete_employee');

    //Khách hàng
    Route::get('page-customer', 'AdminController@page_customer');

    //Loại sản phẩm
    Route::get('page-category-product', 'AdminController@page_category_product');

    //Xóa loại sản phẩm
    Route::get('delete-category/{id_category}', 'AdminController@delete_category');


    //DS sản phẩm
    Route::get('page-list-product', 'AdminController@page_list_product');

    //Hiển thị sản phẩm trong edit_product của admin
    Route::get('edit-product/{id_product}', 'AdminController@edit_product');

    //Cập nhật thông tin sản phẩm
    Route::put('update-product/{id_product}', 'AdminController@update_product');

    //Xóa sản phẩm
    Route::get('delete-product/{id_product}','AdminController@delete_product');

    //Thêm sản phẩm
    Route::get('add-product', 'AdminController@add_product');

    //Thay đổi sản phẩm
    Route::get('edit-product/{id_product}', 'AdminController@edit_product');

    //Xem chi tiết sản phẩm
    Route::get('see-product/{id_product}', 'AdminController@see_product');

    //Nhà cung cấp
    Route::get('product-supplier', 'AdminController@product_supplier');


    //Xóa nhà cung cấp
    Route::get('delete-supplier/{id_supplier}','AdminController@delete_supplier');

    //Thay đổi nhà cung cấp
    Route::get('edit-supplier', 'AdminController@edit_supplier');

    //Quản lý hóa đơn
    Route::get('admin-order', 'AdminController@admin_order');

    //Duyệt hóa đơn
    Route::get('approve-order/{id}', 'AdminController@approve_order');

    //Hủy đơn hàng đang vận chuyển
    Route::get('cancel-order/{id}', 'AdminController@cancel_order');

    //Chi tiết hóa đơn
    Route::get('admin-order-detail/{id}', 'AdminController@admin_order_detail');

    //Xuất hóa đơn
    Route::get('export-order/{id}', 'AdminController@export_order');

    //Quản lý slider
    Route::get('slider-manage', 'AdminController@slider_manage');

    //Xóa slider
    Route::get('delete-slider/{id_slider}','AdminController@delete_slider');

    //==================================================================================//


    //PHƯƠNG THỨC POST VÀO CSDL

    //Thêm quyền truy cập CSDL=======================================================//
    Route::post('post-add-role-access', 'AdminController@post_add_role_access');


    //Phuong thức thêm mới quản trị và nhân viên
    Route::post('post-add-admin', 'AdminController@post_admin');

    //Phương thức thêm loại sản phẩm CSDL
    Route::post('post-add-category', 'AdminController@post_add_category');

    //Phương thức thêm sản phẩm CSDL
    Route::post('post-product', 'AdminController@post_product');

    //Phương thức thêm nhà cung cấp CSDL
    Route::post('post-supplier', 'AdminController@post_supplier');

    //Phương thức thêm slider CSDL
    Route::post('post-slider', 'AdminController@post_slider');
});






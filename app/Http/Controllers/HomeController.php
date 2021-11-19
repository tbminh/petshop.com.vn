<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comment;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ProductSupplier;
use App\Reply_comment;
use App\ShoppingCart;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Hàm hiển thị trang chủ
    public function index()
    {
        $show_sliders = Slider::all();
        $show_product_latests = Product::latest()->take(7)->get();
        $show_category_latests = Categories::latest()->take(6)->get();
        return view('home.index',
            [
                'show_sliders'=>$show_sliders,
                'data'=>$show_product_latests,
                'show_categories'=>$show_category_latests
            ]);
    }

    //HÀM HIỂN THỊ SẢN PHẨM TÌM KIẾM
    public function page_product(Request $request)
        {
            $seach = $request->input('inputSearch');
            if ($seach != "") {
                $show_products = Product::where('product_name', 'like', '%'.$seach.'%')->paginate(2);
            }else{
                $show_products = Product::paginate(8);
            }
            return view('home.page_product', ['show_products' => $show_products]);
        }

    
    
        //Hàm hiển thị sản phẩm thuộc loại nào
    public function page_category($category_name, $id_category)
    {
        $category_id = Categories::find($id_category);
        $show_cate_products = Product::where('category_id', $id_category)->latest()->get();
        return view('home.page_category',
        [
            'category_id'=>$category_id,
            'show_cate_products'=>$show_cate_products
        ]);
    }

    //HÀM HIỂN THỊ CHI TIẾT SẢN PHẨM
    public function page_product_detail($product_name, $id_product)
    {
        $view_detail_product = Product::find($id_product);
        $view_id_supplier = ProductSupplier::where('product_id',$view_detail_product->id)->get();
        $get_categories = Categories::where('id', $view_detail_product->category_id)->get();
        $show_comments = Comment::where('product_id', $id_product)->get();

        return view('home.product_detail',
        [
        'view_detail_product'=>$view_detail_product,
        'get_categories'=>$get_categories,
        'view_id_supplier'=>$view_id_supplier,
        'show_comments'=>$show_comments
        ]);
    }

    //HÀM GỬI BÌNH LUẬN (Thêm mới bình luận vào csdl )
    public function post_comment_user(Request $request, $id_user, $id_product){
        $add_comment = new Comment();
        $add_comment->user_id = $id_user;
        $add_comment->product_id = $id_product;
        $add_comment->comment_content = $request->input('input_comment_content');
        $add_comment->save();
        return redirect()->back();
    }

    //Hàm trả lời bình luận csdl(Thêm mới trả lời bình luân csdl)
    public function post_reply_comment(Request $request, $id_user, $id_comment)
    {
        $add_reply_comment = new Reply_comment();
        $add_reply_comment->reply_comment_content = $request->input('input_reply_comment_content');
        $add_reply_comment->user_id = $id_user;
        $add_reply_comment->comment_id = $id_comment;
        $add_reply_comment->save();
        return redirect()->back();
    }

    //Hàm thêm giỏ hàng dùng cho trang chi tiết
    public function add_to_cart(Request $request, $id_user, $id_product){
        $quality = $request->input('quality');
        $get_cart_product = DB::table('shopping_carts')->get();
        $get_qty_product = DB::table('products')->where('id', $id_product)->first();
        $qty_product = $get_qty_product->product_quality;
        foreach ($get_cart_product as $value){
            $id_pro_db = $value->product_id;
            $qty_db = $value->cart_quality;
        }

        if ($quality > $qty_product ) {
            return redirect()->back()->with('alert', 'Số lượng Sản Phẩm chỉ còn '.$qty_product . ' '.$get_qty_product->product_unitprice);
        }
        elseif ((!isset($qty_db)) && (!isset($id_pro_db))) {
            $add_cart = new ShoppingCart();
            $add_cart->user_id = $id_user;
            $add_cart->product_id = $id_product;
            $add_cart->cart_quality = $request->input('quality');
            $add_cart->save();
        }else{
            if ($id_product == $id_pro_db) {
                ShoppingCart::where('product_id', $id_product)->update(['cart_quality' => $qty_db + $quality]);
            }else{
                $add_cart = new ShoppingCart();
                $add_cart->user_id = $id_user;
                $add_cart->product_id = $id_product;
                $add_cart->cart_quality = $request->input('quality');
                $add_cart->save();
            }
        }
        return redirect()->back();
    }

    //Cập nhật trang giỏ hàng
    public function update_cart(Request $request, $id_user, $id_cart)
    {
        //Lấy id_cart và id_user gán vào biến $cart_id
        $get_cart_user = DB::table('shopping_carts')->where([['id','=',$id_cart], ['user_id','=',$id_user]])->first();
        $cart_id = $get_cart_user->id;

        //Truy xuất sản phẩm hiện tại
        $get_qty_pro = DB::table('products')->where('id',$get_cart_user->product_id)->first();

        //Lấy số lượng người dùng nhập vào để cập nhật
        $qty = $request->input('inputQty');

        //Lấy số lượng sản phẩm hiện tại có trong giỏ hàng để so sánh
        $qty_pro = $get_qty_pro->product_quality;

        if($qty > $qty_pro){
            // $update_carts = ShoppingCart::find($cart_id);
            // $update_carts->cart_quality =$qty_pro;
            // $update_carts->save();
            // return redirect()->back()->with('alert', 'Số lượng sản phẩm chỉ còn '. $qty_pro. ' ' .$get_qty_pro->product_unitprice);
            return redirect()->back()->with('alert', 'Số lượng sản phẩm không đủ '); //Dùng cho trường hợp kinh tế
        }
        else{
            $update_carts = ShoppingCart::find($cart_id);
            $update_carts->cart_quality = $request->input('inputQty');
            $update_carts->save();
            return redirect()->back();
        }
    }

    //HÀM THÊM VÀO GIỎ HÀNG (Dùng trong trang index)
    public function add_cart($id_user, $id_product){
        $add_cart = new ShoppingCart();
        $add_cart->user_id = $id_user;
        $add_cart->product_id = $id_product;
        $add_cart->cart_quality = 1;
        $add_cart->save();

        return redirect()->back();
    }

    //Hàm hiển thị trang giỏ hàng
    public function page_cart($id_user)
    {
        $show_carts = ShoppingCart::where('user_id', $id_user)->get();
        return view('home.page_cart', ['show_carts'=>$show_carts]);
    }



    //HÀM XÓA SẢN PHẨM TRONG GIỎ HÀNG
    public function delete_product_cart($id_cart)
    {
        ShoppingCart::where('id','=',$id_cart)->delete();
        return redirect()->back();
    }

    //HÀM HIỂN THỊ TRANG ĐĂNG NHẬP
    public function page_login()
    {
        if ((Auth::check() && Auth::user()->role_id == 1) || Auth::check() && Auth::user()->role_id == 2){
            return redirect('page-admin');
        }else{
            return view('home.page_login');
        }
    }

    //HÀM HIỂN THỊ TRANG ĐĂNG KÝ
    public function page_sign_up()
    {
        return view('home.page_sign_up');
    }

    //Hàm xử lý đăng ký
    public function post_sign_up(Request $request)
    {
        $this->validate($request,[
            'inputUsername'=>'unique:users,username'
        ],[
            'inputUsername.unique'=>'Tên tài khoản đã tồn tại!'
        ]);

        $add_sign_up = new User();
        $add_sign_up->role_id  = 3;
        $add_sign_up->full_name = $request->input('inputFullname');
        $add_sign_up->username = $request->input('inputUsername');
        $add_sign_up->password = bcrypt($request->input('inputPassword'));
        $add_sign_up->phone = $request->input('inputPhone');
        $add_sign_up->email = $request->input('inputEmail');
        $add_sign_up->save();

        return redirect('page-login')->with('message_sign_up', 'Đã đăng ký thành công. Vui lòng đăng nhập!');
    }

    //Hàm hiển thị trang liên lạc
    public function page_contact()
    {
        return view('home.page_contact');
    }

    //Hàm hiển thị tin tức
    public function page_news()
    {
        return view('home.page_news');
    }



    //==============================================
    //PROFILE USER
    //Hàm hiển thị trang hồ sơ cá nhân
    public function page_profile_user()
    {
        return view('home.profile_user.profile_user_infor');
    }

    //Cập nhật thông tin khách hàng
    public function page_edit_info_user($id_user)
    {
        $edit_user = User::find($id_user);
        return view('home.profile_user.update_info_user', ['edit_user'=>$edit_user]);
    }

    public function update_info_user(Request $request,$id_user)
    {
        $edit_user = User:: find($id_user);
        $edit_user->full_name = $request->input('inputFullname');
        $edit_user->sex = $request->input('inputSex');
        $edit_user->phone = $request->input('inputPhone');
        $edit_user->adress = $request->input('inputAddress');
        $edit_user->birthday = $request->input('inputBirthday');
        $edit_user->email = $request->input('inputEmail');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $edit_user->avatar = $image_name;
        }
        $edit_user->save();
        return redirect()->back()->with('message','Đã cập nhật thông tin');
    }

    //Hàm đổi mật khẩu người dùng
    public function page_change_password()
    {
        return view('home.profile_user.change_password');
    }


    //Hàm hiển thị trang chờ thanh toán
    public function page_wait_payment($id_user)
    {
        $show_orders = Order::where([['user_id', $id_user], ['order_status', 0]])->get();
        return view('home.profile_user.wait_payment', ['show_orders'=>$show_orders]);
    }

    //HÀM XÓA ĐƠN HÀNG TRONG TRANG CHỜ THANH TOÁN
    public function delete_order($id_order)
    {
        Order::where('id', $id_order)->update(['order_status'=> 2]);
        return redirect()->back();
    }

    //Hàm hiển thị trang đã giao hàng
    public function page_product_deliveried($id_user)
    {
        $display_orders = Order::where([['user_id',$id_user],['order_status', 1]])->get();
        return view('home.profile_user.product_deliveried',['display_orders'=>$display_orders]);
    }

    //Hàm hiển thị trang đã hủy
    public function page_product_cancelled($id_user)
    {
        $show_orders_cancels = Order::where([['user_id', $id_user], ['order_status', 2]])->get();
        return view('home.profile_user.product_cancelled',['show_orders_cancels'=>$show_orders_cancels]);
    }





    //==============================================//

    //Hàm hiển thị trang thanh toán
    public function page_checkout($id_user)
    {
        $show_carts = ShoppingCart::where('user_id', $id_user)->get();
        return view('home.page_checkout',['show_carts'=>$show_carts]);
    }

    //Hàm đặt hàng
    public function checkout_payment(Request $request, $id_user)
    {
        //Thêm đơn hàng mới
        $add_order = new Order();
        $add_order->user_id = $id_user;
        $add_order->order_status = 0;
        $add_order->order_amount = $request->input('inputMethodPayment');
        $add_order->save();

        //Lay ID don hang cao nhat (moi nhat)
        $get_id_max_order = DB::table('orders')->max('id');


        $get_carts = DB::table('shopping_carts')->where('user_id',$id_user)->get();
        foreach ($get_carts as $get_cart){
            //lay gia goc cua san pham
            $get_prices = DB::table('products')->where('id', $get_cart->product_id)->first();
            //Them chi tiet don hang
            $add_order_detail = new OrderDetail();
            $add_order_detail->order_id = $get_id_max_order;
            $add_order_detail->product_id = $get_cart->product_id;
            $add_order_detail->total_quality= $get_cart->cart_quality;
            $add_order_detail->total_price= ($get_cart->cart_quality * $get_prices->product_price);
            $add_order_detail->save();

            $quality_product = $get_prices->product_quality;
            $quality_cart = $get_cart->cart_quality;

            $quality = $quality_product - $quality_cart;

            DB::table('products')->where('id', $get_cart->product_id)->update(['product_quality' => $quality]);
        }

        DB::table('shopping_carts')->where('user_id', $id_user)->delete();

        return redirect('page-wait-payment/'.$id_user);

    }

    //==============================================
}




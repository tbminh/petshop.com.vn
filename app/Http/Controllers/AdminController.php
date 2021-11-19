<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comment;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ProductSupplier;
use App\RoleAccess;
use App\Slider;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //HÀM XỬ LÍ ĐĂNG NHẬP=============================//
    public function post_login(Request $request)
    {
        $username = $request->input('inputUsername');
        $password = $request->input('inputPassword');

        //Đặt kiểu kiện để chuyển hướng đến page-admin hoặc trang chủ
        if (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 1])) {
            return redirect('page-admin');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 2])){
            return redirect('page-admin');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 3])){
            return redirect('/');
        }else{
            $message = $request->session()->get('message');
            return redirect()->back()->with('message','');
        }
    }

    //HÀM HIỂN THỊ TRANG CHỦ ADMIN
    public function page_admin()
    {
        $show_order_lastests = Order::where('order_status',0)->take(5)->get();
        $qty_order = DB::table('orders')->get();
        $qty_pro = DB::table('products')->get();
        $qty_usr = User::where('role_id', 3)->get();
        if ((Auth::check() && Auth::user()->role_id == 1) || Auth::check() && Auth::user()->role_id == 2){
            return view('admin.index_admin',
                ['show_order_lastests'=> $show_order_lastests,
                 'qty_order'=>$qty_order,
                 'qty_pro'=>$qty_pro,
                 'qty_usr'=>$qty_usr]);

        }
        else{
            return redirect('page-login');
        }
    }

    //Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('page-login');
    }


    //Hàm hiển thị trang index admin
    public function page_index_admin()
    {
        return view('admin.index_admin');
    }


    //Hồ sơ quản trị viên
    public function edit_profile_admin($id_user)
    {
        return view('admin.profile_admin.edit_profile_admin');
    }

    //Đổi mật khẩu quản trị viên
    public function change_pass($id_user)
    {
        $user_ids = User::find($id_user);
        return view('admin.profile_admin.change_pass',['user_ids'=>$user_ids]);
    }

    //Đổi mật khẩu quản trị viên
    public function update_change_password(Request $request, $id_user)
    {
        $users = DB::table('users')->where('id', $id_user)->get();

        $old_pass = $request->input('inputPassOld');
        $new_pass = $request->input('inputPassNew');
        $new_pass_confirm = $request->input('inputPassComfirmNew');

        $change = User::find($id_user);

        foreach($users as $val_users){
            //Lấy mật khẩu trong DB lưu vào biến
            $db_pass = $val_users->password;

            if(password_verify($old_pass,$db_pass)){
                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('inputPassComfirmNew'));
                    $change->save();

                    $mes = session()->get('mes');
                    return redirect()->back()->with('mes','');
                }else{
                    return redirect()->back()->with('message_error_pass_old_comfirm','Xác nhận mật khẩu sai!');
                }
            }else{
                return redirect()->back()->with('message_error_pass_old','Mật khẩu cũ không đúng!');
            }
        }
    }


    //Hàm hiển thị thông tin cá nhân
    public function infor_profile_user($id_user)
    {
        $infor_user = User::find($id_user);
        return view('admin.profile_admin.edit_profile_admin', ['infor_user'=>$infor_user]);
    }


    //Cập nhật thông tin cá nhân
    public function update_infor_user(Request $request, $id_user)
    {
        $update_infor_user = User:: find($id_user);
        $update_infor_user->sex = $request->input('inputSex');
        $update_infor_user->phone = $request->input('inputPhone');
        $update_infor_user->adress = $request->input('inputAddress');
        $update_infor_user->birthday = $request->input('inputBirthday');
        $update_infor_user->email = $request->input('inputEmail');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $update_infor_user->avatar = $image_name;
        }
        $update_infor_user->save();

        return redirect()->back()->with('message','Đã cập nhật thông tin');
    }


    //QUẢN LÝ NGƯỜI DÙNG
    //Hàm hiển thị trang quyền truy cập
    public function page_role_access()
    {
        $show_user_roles = User::latest()->paginate(5);
        return view('admin.user_manage.role_access',['show_user_roles'=>$show_user_roles]);
    }

    //HÀM THÊM QUYỀN TRUY CẬP
    public function post_add_role_access(Request $request){
        $this->validate($request,[
            'inputRoleName'=>'unique:role_accesses,role_name'
        ],[
            'inputRoleName.unique'=>'Tên quyền đã tồn tại'
        ]);

        $add_role_access = new RoleAccess();
        $add_role_access->role_name = $request->input('inputRoleName');
        $add_role_access->role_discribe = $request->input('inputDescript');
        $add_role_access->save();

        return redirect()->back();
    }

    //Hàm hiển thị trang thay đổi quyền
    public function page_change_role($id_role)
    {
        $role_ids = User::find($id_role);
        return view('admin.user_manage.change_role',['role_ids'=>$role_ids]);
    }

    //Hàm hiển thị trang thay đổi quyền
    public function update_role(Request $request, $id_role)
    {
        $update_role = User::find($id_role);
        $update_role->role_id = $request->input('inputRoleId');
        $update_role->save();

        return redirect('page-role-access')->with('message','Đã thay đổi quyền');
    }

    //HÀM HIỂN THỊ TRANG QUẢN TRỊ
    public function page_administation()
    {
        $show_admins = User::where('role_id',1)->latest()->paginate(5);
        return view('admin.user_manage.administation',['show_admins'=>$show_admins]);
    }

    //Hàm thêm quản trị
    public function page_add_admin()
    {
        return view('admin.user_manage.add_admin');
    }

    //=======================================================//
    //HÀM THÊM MỚI ADMIN-NV CSDL
    public function post_admin(Request $request)
    {
        //Thực hiện thứ nhát
        $this->validate($request,[
            'inputUserName'=>'unique:users,username',
            'inputEmail'=>'unique:users,email',
        ],[
            'inputUserName.unique'=>'Tên tài khoản đã tồn tại',
            'inputEmail.unique'=>'Email đã tồn tại'
        ]);

        $add_admin = new User();
        $add_admin->role_id = $request->input('inputRoleId');
        $add_admin->full_name = $request->input('inputFullName');
        $add_admin->username = $request->input('inputUserName');
        $add_admin->password = bcrypt($request->input('inputPassword')); //Mã hóa mật khẩu
        $add_admin->email = $request->input('inputEmail');
        $add_admin->adress = $request->input('inputAddress');
        $add_admin->phone = $request->input('inputPhoneNumber');
        $add_admin->sex = $request->input('inputSex');
        $add_admin->birthday = $request->input('inputBirthday');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $add_admin->avatar = $image_name;
        }
        $add_admin->save();

        //Thực hiện thứ 2
        $latest_user = DB::table('users')->latest()->first();
        if ($latest_user->role_id == 1) {
            return redirect('page-administation')->with('message','Đã thêm người dùng quản trị');
        }else{
            return redirect('page-employee')->with('message','Đã thêm người dùng nhân viên');
        }
    }

    //HÀM HIỂN THỊ TRANG NHÂN VIÊN LẤY TỪ CSDL
    public function page_employee()
    {
        $show_employee = User::where('role_id', 2)->latest()->paginate(10);
        return view('admin.user_manage.employee',['show_employee'=>$show_employee]);
    }

    //HÀM XÓA TRANG NHÂN VIÊN
    public function delete_employee($id_emloyee)
    {
        //Cách 1
        User::destroy($id_emloyee);

        //Cách 2
        //User::where('id','=',$id_emloyee)->delete();
        return redirect()->back()->with('message','Đã xóa nhân viên');
    }

    //HÀM HIỂN THỊ TRANG KHÁCH HÀNG
    public function page_customer()
    {
        return view('admin.user_manage.customer');
    }



    //QUẢN LÝ SẢN PHẨM

    //HÀM HIỂN THỊ LOẠI SẢN PHẨM LẤY TỪ CSDL
    public function page_category_product()
    {
        $show_categories = Categories::latest()->paginate(5);
        return view('admin.product_manage.page_category',['show_categories'=>$show_categories]);
    }

    //HÀM THÊM LOẠI SẢN PHẨM CSDL=============================//
    public function post_add_category(Request $request)
    {
        $this->validate($request,[
            'inputCategory'=>'unique:categories,category_name',
        ],[
            'inputCategory.unique'=>'Tên loại đã tồn tại',
        ]);

        $add_category = new Categories();
        $add_category->category_name = $request->input('inputCategory');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $add_category->category_image = $image_name;
        }

        $add_category->save();

        return redirect()->back()->with('message','Đã thêm loại sản phẩm');
    }

        //HÀM XÓA LOẠI SẢN PHẨM
        public function delete_category($id_category)
        {
            Categories::where('id','=',$id_category)->delete();
            return redirect()->back()->with('message','Đã xóa loại sản phẩm');
        }


    //Hàm thêm sản phẩm (tạo page)
    public function add_product()
    {
        return view('admin.product_manage.add_product');
    }

    //HÀM HIỂN THỊ DANH SÁCH SẢN PHẨM CSDL
    public function page_list_product()
    {
        $show_products = Product::latest()->paginate(5);
        return view('admin.product_manage.list_product',['show_products'=>$show_products]);
    }


    //HÀM THÊM MỚI SẢN PHẨM=========================///
    public function post_product(Request $request)
    {
        $add_product = new Product();
        $add_product->category_id = $request->input('inputCategoryId');
        $add_product->product_name = $request->input('inputName');
        $add_product->product_quality = $request->input('inputQuality');
        $add_product->product_price = $request->input('inputPrice');
        $add_product->product_decribe = $request->input('inputDescription');
        $add_product->product_unitprice = $request->input('inputUnitPrice');
        $add_product->product_tax = $request->input('inputSupplierId');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $add_product->product_img = $image_name;
        }
        $add_product->save();

        //Thực hiện 3
        $max_id_product = DB::table('products')->max('id');

        //Thực hiện 4
        $add_pro_sup = new ProductSupplier();
        $add_pro_sup->product_id = $max_id_product;
        $add_pro_sup->supplier_id= $request->input('inputSupplierId');
        $add_pro_sup->save();


        return redirect('page-list-product')->with('message','Đã thêm sản phẩm');
    }

    //HÀM XÓA SẢN PHẨM
    public function delete_product($id_product)
    {
        Product::where('id','=',$id_product)->delete();
        return redirect()->back()->with('message','Đã xóa sản phẩm thành công!');
    }


    //Hàm xem chi tiết sản phẩm
    public function see_product($id_product)
    {
        $view_detail = Product::find($id_product);
        $get_category = Categories::where('id',$view_detail->category_id)->get();
        $show_comments = Comment::where('product_id', $id_product)->get();
        return view('admin.product_manage.see_product',
            ['view_detail'=>$view_detail,
             'get_category'=>$get_category,
             'show_comments'=>$show_comments]);
    }


    //Hàm đổi sản phẩm
    public function edit_product($id)
    {
        $infor_product = Product::find($id);
        return view('admin.product_manage.edit_product', ['infor_product'=>$infor_product]);
    }

    //Cập nhật thông tin sản phẩm
    public function update_product(Request $request, $id_product)
    {
        $update_infor_product = Product:: find($id_product);
        $update_infor_product->product_name = $request->input('inputName');
        $update_infor_product->product_price = $request->input('inputPrice');
        $update_infor_product->product_quality  = $request->input('inputQuality');
        $update_infor_product->product_unitprice = $request->input('inputUnit');
        $update_infor_product->product_decribe = $request->input('inputDecribe');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $update_infor_product->product_img = $image_name;
        }
        $update_infor_product->save();

        return redirect()->back()->with('message','Đã cập nhật thông tin sản phẩm');
    }


    //HÀM THÊM MỚI NHÀ CUNG CẤP
    public function post_supplier(Request $request)
    {
        $add_supplier = new Supplier();
        $add_supplier->supplier_name = $request->input('inputName');
        $add_supplier->supplier_address = $request->input('inputAddress');
        $add_supplier->supplier_decribe = $request->input('inputDecribe');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $add_supplier->supplier_image = $image_name;
        }
        $add_supplier->save();

        return redirect()->back()->with('message','Đã thêm sản phẩm');
    }


    //HÀM HIỂN THỊ NHÀ CUNG CẤP
    public function product_supplier()
    {
        $show_suppliers = DB::table('suppliers')->paginate(5);
        return view('admin.product_manage.product_supplier',['show_suppliers'=>$show_suppliers]);
    }

    //HÀM XÓA NHÀ CUNG CẤP
    public function delete_supplier($id_supplier)
    {
        Supplier::where('id','=',$id_supplier)->delete();
        return redirect()->back()->with('message','Đã xóa nhà cung cấp thành công!');
    }


    //Hàm đổi nhà cung cấp
    public function edit_supplier()
    {
        return view('admin.product_manage.edit_supplier');
    }


    //Quản lý hóa đơn

    //Hàm quản lý hóa đơn
    public function admin_order()
    {
        $show_orders = Order::latest()->paginate(5);
        return view('admin.admin_order',['show_orders' => $show_orders]);
    }

    //Hàm duyệt đơn hàng
    public function approve_order($id)
    {
        Order::where('id', $id)->update(['order_status'=>1]);
        return redirect()->back();
    }

    //Hàm hủy đơn hàng
    public function cancel_order($id)
    {
        Order::where('id', $id)->update(['order_status'=>2]);
        return redirect()->back(); //Quay lại trang web hiện tại khi đã thay đổi trạng thái $show_orders
    }

    //Hàm hóa đơn chi tiết
    public function admin_order_detail($id)
    {
        $show_order = Order::find($id);
        return view('admin.admin_order_detail',['show_order'=>$show_order]);
    }

    //Hàm xuất hóa đơn
    public function export_order($id)
    {
        $show_export = Order::find($id);
        return view('admin.export_order',['show_export'=>$show_export]);
    }



    //HÀM THÊM MỚI SLIDER
    public function post_slider(Request $request)
    {
        $add_slider = new Slider();
        $add_slider->product_id = $request->input('inputProductID');
        $add_slider->slider_title = $request->input('inputTitle');
        $add_slider->slider_content = $request->input('inputContent');

        if($request->hasFile('inputFileImage')){
            $image = $request->file('inputFileImage');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'), $image_name);
            $add_slider->slider_image = $image_name;
        }
        $add_slider->save();

        return redirect()->back()->with('message','Đã thêm thành công');
    }

    //Hiển thị slider
    public function slider_manage()
    {
        $show_sliders = DB::table('sliders')->paginate(5);
        return view('admin.slider_manage',['show_sliders'=>$show_sliders]);
    }

    //HÀM XÓA SLIDER
    public function delete_slider($id_slider)
    {
        Slider::where('id','=',$id_slider)->delete();
        return redirect()->back()->with('message','Đã xóa slider');
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\User;
use DB;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $slide = Slide::all();
        $new_products = Product::where('new',1)->paginate(8);
        $best_sellers = BillDetail::selectRaw('id_product, products.id, products.name, products.image, products.unit_price, products.promotion_price, sum(quantity) as sumqty')
                            ->join('products', 'id_product', '=', 'products.id')
                            ->groupBy('id_product', 'products.id', 'products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
                            ->orderBy('sumqty', 'desc')
                            ->paginate(8);
        return view('pages.homePage', compact('slide','new_products', 'best_sellers'));
    }

    public function getProductType($type){
        if($type != 0){
            $prod_type = Product::where('id_type',$type)->get();
            $getNameType = ProductType::where('id',$type)->value('name'); //to get name of type
        } else {
            $prod_type = Product::all();
            $getNameType = 'All Products'; //to get name of type
        }
        $prd_types = ProductType::all(); //to make the menu

        return view('pages.product_type', compact('prod_type', 'prd_types', 'getNameType'));
    }

    public function getProductDetail($id_prod){
        $product = Product::find($id_prod);
        $typeOfProd = ProductType::where('id',$product->id_type)->get(); //to get description and name of type
        $relatedProds = Product::where('id_type',$product->id_type)->paginate(6);
        $new_products = Product::where('new',1)->take(5)->get();
        $best_sellers = BillDetail::selectRaw('id_product, products.id, products.name, products.image, products.unit_price, products.promotion_price, sum(quantity) as sumqty')
                            ->join('products', 'id_product', '=', 'products.id')
                            ->groupBy('id_product', 'products.id', 'products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
                            ->orderBy('sumqty', 'desc')
                            ->take(5)->get();
        return view('pages.product', compact('product', 'typeOfProd', 'relatedProds','new_products', 'best_sellers'));
    }
    
    public function getAdd2Cart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getRemoveItem($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getReduceItem($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    
    public function getCheckout(){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $product_in_cart = $cart->items;
        return view('pages.checkout', compact('product_in_cart'));
    }

    public function postCheckOut(Request $req){
        $cart = Session('cart')?Session::get('cart'):null;
        if($cart != null){
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone_number;
            $customer->note = $req->note;
            $customer->save();
    
            $bill = new Bill;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment;
            $bill->note = $customer->note;
            $bill->save();
    
            foreach($cart->items as $key => $value){
                $bill_detail = new BillDetail;
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = $value['price'];
                $bill_detail->save();
            }
            Session::forget('cart');
            return redirect()->back()->with('announcement',1); // has product in cart
        } else {
            return redirect()->back()->with('announcement',0); // cart is empty
        }

    }

    public function getContact(){
        return view('pages.contact');
    }

    public function getAbout(){
        return view('pages.about_us');
    }
    
    public function getLogin(){
        return view('pages.users.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required|min:8|max:30',
            ],
            [
                'email.required' => 'Please enter email',
                'email.email' => 'Incorrect email format',
                'password.required' => 'Please enter password',
                'password.min' => 'Password must be at least 8 characters',
                'password.max'=>'Password must be at most 30 characters'
            ]
        );
        $account = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($account)){
            return redirect()->intended('index');
        } else {
            return redirect()->back()->with('unsuccess', 1);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('index');
    }
    
    public function getSignup(){
        return view('pages.users.signup');
    }

    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:8|max:30',
                'full_name'=>'required',
                'repassword'=>'required|same:password'
            ],
            [
                'email.required'=>'Please enter email',
                'email.email'=>'Incorrect email format',
                'email.unique'=>'Email already in use',
                'password.required'=>'Please enter password',
                'repassword.same'=>'Passwords are not the same',
                'password.min'=>'Password must be at least 8 characters',
                'password.max'=>'Password must be at most 30 characters'
            ]
        );

        User::insert(
            [
                'full_name' => $req->full_name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'phone' => $req->phone,
                'address' => $req->address
            ]
        );

        return redirect()->back()->with('success', 'Create account successful');
    }
    
    public function getSearch(Request $req){
        $prod_type = Product::where('name','like','%'.$req->search.'%')->get();
        $prd_types = ProductType::all(); //to make the menu
        $getNameType = 'Search: '.$req->search;

        return view('pages.product_type', compact('prod_type', 'prd_types', 'getNameType'));
    }

    public function getProfileAccount($id_user){
        $user = User::find($id_user);
        return view('pages.users.profile_user', compact('user'));
    }

    public function getUpdateProfile(Request $req, $id){
        User::where('id', $id)->update(
            [
                'full_name'=>$req->full_name,
                'email'=>$req->email,
                'address'=>$req->address,
                'phone'=>$req->phone
            ]
        );
        return redirect()->back()->with('message', 'Update successful');
    }
    

    public function getSecurity($id_user){
        $user = User::find($id_user);
        return view('pages.users.security', compact('user'));
    }

    public function getChangePass(Request $req, $id_user){
        $user = User::find($id_user);
        if(Hash::check($req->current_pass, $user->password)){
            $this->validate($req,
                [
                    'new_pass'=>'required|min:8|max:30',
                    're_pass'=>'required|same:new_pass'
                ],
                [
                    'new_pass.required'=>'Please enter password',
                    're_pass.same'=>'Passwords are not the same',
                    'new_pass.min'=>'Password must be at least 8 characters',
                    'new_pass.max'=>'Password must be at most 30 characters'
                ]
            );
            User::where('id', $id_user)->update(
                [
                    'password'=>Hash::make($req->new_pass)
                ]
            );
            return redirect()->back()->with(['message'=>'Change password successful', 'flag'=>'success', 'icon'=>'check', 'color'=>'green']);
        } else {
            return redirect()->back()->with(['message'=>'Incorrect current password', 'flag'=>'danger', 'icon'=>'times', 'color'=>'red']);
        }

        // return view('pages.users.security', compact('user'));
    }
}

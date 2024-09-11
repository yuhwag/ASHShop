<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getListProd(){
        $products = Product::all();
        return view('pages.admin.list_product', compact('products'));
    }
    public function getSearchInList(Request $req){
        $products = Product::where('name','like','%'.$req->search_list.'%')->get();
        return view('pages.admin.list_product', compact('products'));
    }

    //...Add...
    public function getAddProdPage(){
        return view('pages.admin.add_product');
    }
    public function getAddProduct(Request $req){
        Product::insert(
            [
                'name'=>$req->name,
                'id_type'=>$req->type,
                'description'=>$req->description,
                'unit_price'=>$req->price,
                'promotion_price'=>$req->promote,
                'image'=>$req->image, 
                'new'=>$req->new
            ]
        );
        return redirect()->intended('list_product')->with('message', 'Add successful');
    }

    //.. 
    public function getEditProdPage($id){
        $product = Product::where('id', $id)->get();
        $type_name = ProductType::all();
        return view('pages.admin.edit_product', compact('product', 'type_name'));
    }
    public function getUpdateProduct(Request $req, $id){
        Product::where('id', $id)->update(
            [
                'name'=>$req->name,
                'id_type'=>$req->type,
                'description'=>$req->description,
                'unit_price'=>$req->price,
                'promotion_price'=>$req->promote,
                'image'=>$req->image, 
                'new'=>$req->new
            ]
        );
        return redirect()->intended('list_product')->with('message', 'Update successful');
    }

    //...Delete...
    public function getDelProduct($id){
        Product::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete successful');
    }


    /////////
    // Bills
    public function getBills(Request $req){
        $view_bill = $req->view_bills;
        if ($req->view_bills == 'New'){
            $bills = Bill::where('new', 1)->get();
        } else if($req->view_bills == 'Checked'){
            $bills = Bill::where('new', 0)->get();
        } else {
            $bills = Bill::all();
        }
        $customers = Customer::all();
        $bill_dt = BillDetail::all();
        $products = Product::all();

        return view('pages.admin.bills', compact('bills', 'customers', 'bill_dt', 'products', 'view_bill'));
    }
    public function getCheckBill($id){
        Bill::where('id', $id)->update(['new'=>0]);
        return redirect()->back()->with('message', 'Checked bill successful');
    }
}

<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Product;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class PageController extends Controller
{	
	//cách 1 để show loại sp trên menu (cách 2 ờ AppServiceProvider.php)
	public function __construct()
	{
		$loai_sp = ProductType::all();
		View::share('loai_sp', $loai_sp);


	}

    public function getIndex()
    {
    	$slide = Slide::all();//var_dump($slide);->trả về Collection
    	$newProduct = Product::where('new',1)->get();
    	$topProduct = Product::where('promotion_price','<>',0)->take(12)->get();
    	return view('page.trangchu',compact('slide','newProduct','topProduct'));
    }

    public function getLoaisp($id)
    {   
        $danh_sach_loaisp = ProductType::all();
    	$loai_sp = ProductType::find($id);//var_dump($loai_sp);->trả về Obj
    	$list_sp = $loai_sp->product()->paginate(3);
    	$top_sp  = $loai_sp->product()->where('promotion_price','<>',0)->paginate(3);
       // dd($loai_sp);
    	return view('page.loai_sanpham',compact('danh_sach_loaisp','loai_sp','list_sp','top_sp'));
    }

    public function getSanpham($id)
    {	
    	$sanpham = Product::find($id);
        $related_products = Product::where('id','<>',$id)->take(3)->get();
        $newProducts = Product::where('new',1)->take(4)->get();
        $topProducts = Product::where('promotion_price','<>',0)->take(4)->get();
    	return view('page.sanpham',compact('sanpham','related_products','newProducts','topProducts'));
    }

    public function getLienhe()
    {
    	return view('page.lienhe');
    }

    public function getGioithieu()
    {
    	return view('page.gioithieu');
    }

    public function getAddToCart(Request $req, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->add($product,$id);
    	$req->session()->put('cart',$cart);//session "cart" là Obj
    	//cach 2 session stored: 
    	//$value = session(['cart' => $cart]);//session "cart" là Obj
    	
    	return redirect()->back();
    }

    public function getRemoveFromCart(Request $req, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session('cart')?Session::get('cart'):null;
    	$cart = new Cart($oldCart);
    	$cart->removeSingleItem($id);
    	$req->session()->put('cart',$cart);//session "cart" là Obj
    	return redirect()->back();
    }

    public function getCheckout()
    {dd(session('cart'));
        return view('page.checkout');
    }

    public function postCheckout(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'payment_method' => 'required',
         ]);

         $customer = new Customer;
         $customer->name = $request->input('name');
         $customer->gender = $request->input('gender');
         $customer->email = $request->input('email');
         $customer->address = $request->input('address');
         $customer->phone_number = $request->input('phone');
         $customer->note = $request->input('notes');
         $customer->save();
         $idCustomer = session('idCustomer', $customer->id);

         $bill = new Bill;
         $bill->id_customer =  $idCustomer;
         $dt = Carbon::now();
         $bill->date_order = $dt->toDateString();
         $bill->total = session('cart')->totalPrice;
         $bill->payment = $request->input('payment_method');
         $bill->note = $request->input('notes');
         $bill->save();
         //$idBill = session('idBill', $bill->id);
          $idBill = session('idBill', $bill->id);
 //        dd( $bill->id);
//dd($idBill );
//dd(session('cart')->items);
         
       
        foreach(session('cart')->items as $sanpham)
        {   
            $billDetails = new BillDetail;
             $billDetails->id_bill = $idBill;
             $billDetails->id_product = $sanpham['item']->id;
             $billDetails->quantity = $sanpham['qty'];
             $billDetails->unit_price = $sanpham['item']->unit_price;
             $billDetails->save();
        }
        return redirect()->back()->with('message', 'Thanks for shopping');;
        
    }
}

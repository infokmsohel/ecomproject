<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Shipping;
use App\Payment;
use Cart;
use Illuminate\Http\Request;
use App\Customer;
//use Session;
use Illuminate\Support\Facades\Session;
use Mail;

class CheckOutController extends Controller
{
    public function index(){

        return view('front.checkout.checkout');
    }

    public function customerLogin(Request $request){

        $customerInfo = Customer::where('email', $request->email)->first();
        if($customerInfo) {
            $existingPassword = $customerInfo->password;
            if (password_verify($request->password, $existingPassword)) {
                Session::put('customerId', $customerInfo->id);
                Session::put('customerName', $customerInfo->first_name.' '.$customerInfo->last_name);

                return redirect('/shipping-info');
            } else {
                return redirect('/customer-login')->with('message', 'Please use valid password');
            }
        } else {
            return redirect('/customer-login')->with('message', 'Please use valid email address');
        }
    }

    public function customerLogOut(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function showRegisterForm(){

        return view('front.checkout.register');
    }

    public function saveCustomerRegistration(Request $request){

        $this->validate($request,[
            'first_name' =>'required|string|min:2|max:12',
            'last_name' =>'required|string|min:3|max:12',
            'number' =>'required|digits:11',
            'date_of_birth' =>'required|date',
            'address' =>'required',
            'email' =>'required|email',
            'password' =>'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha'

        ]);

        $customer=new Customer();
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->number=$request->number;
        $customer->date_of_birth=$request->date_of_birth;
        $customer->address=$request->address;
        $customer->email=$request->email;
        $customer->password=bcrypt($request->password);
        $customer->save();

        Session::put('customerId',$customer->id);
        Session::put('customerName',$customer->first_name.''.$customer->last_name);

//        $data=$customer->toArray();
//
//
//        Mail::send('front.mails.registration-mail',$data, function ($message) use ($data){
//
//            $message->to($data['email']);
//            $message->subject('Registration Confirmation');
//
//        });

//        return view('front.checkout.shipping-info');
        return redirect('/shipping-info')->with('message','Registration Successfully');;
//        return redirect('/');
    }

    public function showShippingForm(){

        $customer=Customer::find(Session::get('customerId'));

        return view('front.checkout.shipping-info',['customer'=>$customer]);
    }

    public function saveShippingInfo(Request $request){

        $shipping=new Shipping();

        $shipping->first_name=$request->first_name;
        $shipping->last_name=$request->last_name;
        $shipping->number=$request->number;
        $shipping->address=$request->address;
        $shipping->email=$request->email;
        $shipping->gender=$request->gender;

        $shipping->save();

        Session::put('shippingId',$shipping->id);

       return redirect('/payment-type');
    }


    public function showPaymentType(){

        return view('front.checkout.payment-type');
    }

    public function saveCustomerOrder(Request $request){

        $payment_type = $request->payment_type;

        if($payment_type == 'Cash'){

            $order = new Order();
            $order->customer_id=Session::get('customerId');
            $order->shipping_id=Session::get('shippingId');
            $order->order_total=Session::get('grandTotal');
            $order->save();

            $payment = new Payment();

            $payment->order_id = $order->id;
            $payment->payment_type = $payment_type;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct ){
                        $orderDetail = new OrderDetail();

                $orderDetail->order_id = $order->id;
                $orderDetail->product_id =$cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_qty = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();
            return redirect('/order-confirmation-message');
        }
    }

    public  function completeOrder(){
        return view('front.checkout.complete-order');
    }

    public function emailCheck($id){
        $customer=Customer::where('email',$id)->first();
        if ($customer){
            echo 'Email Already Exist';
       }else{
           echo 'Email Available';
       }
    }

    public function searchProduct(Request $request){
//
       $term=$request->term;
//
     $products=Product::where('product_name', 'like','%'.$term.'%')->get();


//
        if (count($products) == 0 ){

            $searchResult[]="Product Not Found";

        }else{
            foreach ($products as $key => $value){
                $searchResult[]= $value->product_name;
            }
        }

        return $searchResult;
    }

    public function searchView(Request $request){

        $searchData=$request->searchView;

        $product=Product::where('product_name',$searchData)->first();

        if($product){

            return view('front.product.details-product',[
                'product'=>$product
            ]);
        }else{

            return view('front.product.product-not-found');
//            echo 'Product Not found';
        }
    }
}

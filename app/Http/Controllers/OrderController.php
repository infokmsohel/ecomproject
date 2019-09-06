<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;

use DB;
use PDF;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function manageOrder(){

        $orders=DB::table('orders')
              ->join('customers', 'orders.customer_id', '=' ,'customers.id')
              ->join('payments', 'orders.id', '=' ,'payments.order_id')
              ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
              ->get();

        return view('admin.manage-order.manage-order',['orders'=>$orders]);

    }

    public  function viewOrder($id){

        $order    = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id',$id)->first();
        $orderDetail=OrderDetail::where('order_id',$id)->get();


        return view('admin.manage-order.view-order',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetail'=>$orderDetail
        ]);
    }

    public function viewOrderInvoice($id){

        $order    = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id',$id)->first();
        $orderDetail=OrderDetail::where('order_id',$id)->get();

        return view('admin.manage-order.view-order-invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetail'=>$orderDetail
        ]);
    }

    public function downloadInvoice($id){

        $order    = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id',$id)->first();
        $orderDetail=OrderDetail::where('order_id',$id)->get();

        $pdf=PDF::loadView('admin.manage-order.download-invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetail'=>$orderDetail
        ]);
        return $pdf->stream('invoice.pdf');
    }
}

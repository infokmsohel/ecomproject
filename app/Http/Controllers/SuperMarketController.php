<?php

namespace App\Http\Controllers;

use App\Category;
use App\FooterContact;
use App\Product;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class SuperMarketController extends Controller
{
    public function index(){


        $products=Product::where('publication_status',1)->get();
        return view('front.home.home-content',[
//            'categories'=>$categories,
//            'footerContacts'=>$footerContacts,
            'products'=>$products
        ]);
    }

    public function contact(){

        return view('front.contact.contact-content');
    }


    public function categoryContent($id,$name){

        $products =Product::where('category_id',$id)
            ->get();

        $category=Category::where('category_name',$name)->first();

        return view('front.category.category-content',[
            'products'=>$products,
            'category'=>$category,
        ]);
    }



    public function productDetails($id ,$name){
        $product=Product::where('id',$id)->where('product_name',$name)->first();

        return view('front.product.details-product',[
            'product'=>$product
        ]);
    }


}

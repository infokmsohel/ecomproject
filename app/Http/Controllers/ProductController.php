<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProductInfo(){
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }

    protected function imageUpload($request){
        $productImage= $request->file('product_image');
        $imageName= $productImage->getClientOriginalName();
        $directory= 'product-images/';
        $imgUrl=$directory.$imageName;
        Image::make($productImage)->save($imgUrl);
        return $imgUrl;
    }

    protected function saveProductBasicInfo($request, $imgUrl){

        $product=new Product();
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_image=$imgUrl;
        $product->publication_status=$request->publication_status;
        $product->save();
    }

    public function saveProductInfo(Request $request){
         $imgUrl=$this->imageUpload($request);
         $this->saveProductBasicInfo($request, $imgUrl);
         return redirect('/Product/AddProduct')->with('message','Product Info Saved Successfully');
    }

    public function manageProductInfo(){

        $products=DB::table('products')
            ->join('categories','products.category_id', '=','categories.id')
            ->join('brands','products.brand_id', '=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
        return view('admin.product.manage-product',[
            'products' =>$products
        ]);
    }

    public function viewProduct($id){
        $product=Product::find($id);
        return view('admin.product.view-product',['product'=>$product]);
    }

    public function unpublishedProduct($id){
        $product=Product::find($id);
        $product->publication_status= 0;
        $product->save();
        return redirect('/Product/ManageProduct')->with('message','Unpublished Successfully');
    }

    public function publishedProduct($id){
        $product=Product::find($id);
        $product->publication_status= 1;
        $product->save();
        return redirect('/Product/ManageProduct')->with('message','published Successfully');
    }

    public function editProduct($id){
        $product=Product::find($id);
        $category=Category::where('publication_status',1)->get();
        $brand=Brand::where('publication_status',1)->get();

    return view('admin.product.edit-product',[
    'product'=>$product,
    'categories'=>$category,
    'brands'=>$brand
    ]);
    }

    public function updateProduct(Request $request){

        $productImage= $request->file('product_image');
        $product=Product::find($request->product_id);

        if($productImage){

            unlink($product->product_image);

            $productImage= $request->file('product_image');
            $imageName= $productImage->getClientOriginalName();
            $directory= 'product-images/';
            $imgUrl=$directory.$imageName;
            Image::make($productImage)->save($imgUrl);
//            $imgUrl=$this->imageUpload($request);


            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_name=$request->product_name;
            $product->product_price=$request->product_price;
            $product->product_quantity=$request->product_quantity;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->product_image=$imgUrl;
            $product->publication_status=$request->publication_status;
            $product->save();
//            $this->saveProductBasicInfo($request,$imgUrl);




            return redirect('/Product/ManageProduct')->with('message','Product Information Updated Successfully');


        }else{


            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_name=$request->product_name;
            $product->product_price=$request->product_price;
            $product->product_quantity=$request->product_quantity;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->publication_status=$request->publication_status;
            $product->save();


            return redirect('/Product/ManageProduct')->with('message','Product Information Updated Successfully');
        }
    }

    public function deleteProduct($id){

        $product=Product::find($id);

        $product->delete();
        unlink($product->product_image);


        return redirect('/Product/ManageProduct')->with('message','One Selected Product row deleted  Successfully');

    }
}

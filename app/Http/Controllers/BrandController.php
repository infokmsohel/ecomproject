<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function saveBrand(Request $request){

     $this->validate($request,[
    'brand_name' =>'required|alpha|min:5|max:7',
    'brand_description' =>'required|alpha|min:5|max:30',
]);



        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_description=$request->brand_description;
        $brand->publication_status=$request->publication_status;
        $brand->save();


//        Brand::create($request->all());

        return redirect('/Brand/AddBrand')->with('message','Brand Info Saved Successfully');

    }

    public function manageBrand(){
        return view('admin.brand.manage-brand');
    }
}

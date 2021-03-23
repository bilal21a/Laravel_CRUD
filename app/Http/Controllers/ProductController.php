<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->latest()->paginate(6);
        return view('product.index',compact('product'));
    }
    public function create()
    {
        return view('product.create');
    }



    //insert data method
    public function store(Request $request)
    {//field after arrow comng from view from value
        $data=array();
        $data['product_name']= $request->product_name;
        $data['product_code']= $request->product_code;
        $data['details']= $request->details;

        $image=$request->file('logo');
        if ($image) {   
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            $data['logo']= $image_url;
            $product=DB::table('products')->insert($data);
            return redirect()->route('product.index')->with('success','product created successfuly');
        }
    }




    //show data while update
    public function edit($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        return view('product.edit',compact('product'));
    }


    //update method
    public function update(Request $request, $id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
        $data['product_name']= $request->product_name;
        $data['product_code']= $request->product_code;
        $data['details']= $request->details;

        $image=$request->file('logo');
        
        if ($image) {
            unlink($oldlogo);   
            $image_name=date('dmy_H_s_i');
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            $data['logo']= $image_url;
            $product=DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.index')->with('info','product updated successfuly');
    }
    else{
        $product=DB::table('products')->where('id',$id)->update($data);
        return redirect()->route('product.index')->with('info','product updated successfuly');
    }}


    //delete method
    public function delete($id)
    {
        $data = DB::table('products')->where('id',$id)->first();
        $img=$data->logo;
        unlink($img);
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.index')->with('danger','product DELETED successfuly');
    }

   //show method
    public function show($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        return view('product.show',compact('product'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Helpers\FileUploadHelper;

class ProductController extends Controller
{
    /**
     * 
     * create products
     * @return view
     */

    public function productCreate(){
        $categories = Category::whereNotNull('category_id')->get();
        return view('admin.product.create-product', ['categories'=>$categories]);
    }

    /**
     * 
     * Add the product
     * store data to db
     * @return back
     */
    
    public function productAdd(Request $request){
        $productData = array(
            'category_id'=>$request->category_id,
            'name'=>$request->product_name,
            'price'=>$request->product_price,          
        );
        if($request->hasFile('product_image')){
            $fileName = FileUploadHelper::fileUpload($request->product_image);
            $productData['image'] =  $fileName;
        }        
        Product::create($productData);              
        return redirect()->back();
    }


    /**
     * 
     * get products from db and transfer the data to the view
     * @return view
     */
    public function productShow(){
        $products = Product::all();   
        return view('admin.product.show-products', ['products'=>$products]);
    }

    /**
     * 
     * edit product
     * @return view
     */
    public function productEdit($id){
        $categories = Category::whereNotNull('category_id')->get();
        $product = Product::where('id', $id)->first();   
        return view('admin.product.edit-product', ['categories'=>$categories,'product'=>$product]);
    }
    /**
     * 
     * update product
     * @return back
     */
    public function productUpdate(Request $request, $id){
        $productData = array(
            'category_id'=>$request->category_id,
            'name'=>$request->product_name,
            'price'=>$request->product_price,          
        );
        if($request->hasFile('product_image')){
            $fileName = FileUploadHelper::fileUpload($request->product_image);
            $productData['image'] =  $fileName;
        } 
        $product = Product::where('id', $id)->update($productData);   
        return redirect()->back();
    }

    /**
     * 
     * Delete product
     * @return back
     */
    public function productDelete(Request $request){
        $product = Product::where('id', $request['productId'])->delete();   
        return response()->json(['sucess'=>'Category deleted successfully']);
    }

    /**
     * 
     * Add product extra detail
     * @return view
     */
    public function productExtraDetail(Request $request, $id){
        $product = Product::where('id', $id)->with('productDetail')->first()->toArray();
        return view('admin.product.extra-detail', ['id'=>$id, 'product'=>$product]);
    }

    /**
     * 
     * Add product extra detail store in db
     * @return view
     */
    public function productExtraDetailStore(Request $request, $id){
        // dd($request->all());
        $data = array(
            'product_id'=>$id,
            'title'=>$request->title,
            'total_items'=>$request->total_item,	
            'description'=>$request->description
        );
        ProductDetail::updateOrCreate(
            ['product_id'=>$id],
            $data
        );
        return redirect()->back();
    }
}

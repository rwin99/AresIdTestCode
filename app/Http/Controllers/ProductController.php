<?php

namespace App\Http\Controllers;
use JWTAuth;
use App\Models\User;
use App\Models\Product;
use App\Models\Varian;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function ProductIndex()
    {
        $Product = Product::with(['varian'])->get();
        return response()->json([
            'status' => 'success',  
            'Data' => $Product,
        ]);
    }
    public function VarianIndex()
    {
        $Varian = Varian::all();
        return response()->json([
            'status' => 'success',
            'Data' => $Varian,
        ]);
    }
    public function VarianShow($id)
    {
        $Varian = Varian::find($id);
    
        if (!$Varian) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, Varian Product Tidak Ada.'
            ], 400);
        }
    
        return $Varian;
    }
    public function VarianAdd(Request $request)
    {
        $ProductFind = Product::find($request->id_product);
    
        if (!$ProductFind) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, Product Tidak Ada.'
            ], 400);
        }
        $data = $request->only('name', 'sku', 'price','id_product');
        $validator = Validator::make($data, [

           'name' => 'required|string',
           'sku' => 'required',
           'price' => 'required',
           'id_product' =>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $product = Varian::create([
          'id_product' =>  $request->id_product,
           'name' => $request->name,
           'sku' => $request->sku,
           'price' => $request->price
           
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Varian Berhasil dibuat',
            'data' => $product
        ], 200);
    }
    public function VarianEdit(Request $request)
    {
      
        $data = $request->only('name', 'sku', 'price','id');
        $validator = Validator::make($data, [
           'name' => 'required|string',
           'sku' => 'required',
           'price' => 'required',
           'id'  => 'required'
        ]);
       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $get = Varian::find($request->id);
         
        if (!$get) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, Varian Product Tidak Ada.'
            ], 400);
        }
        $product = $get->update([
           'name' => $request->name,
           'sku' => $request->sku,
           'price' => $request->price
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Edit Varian Berhasil'
        ], 200);
    }
    public function VarianDelete(Request $request)
    {
        $product = Varian::find($request->id);
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }
    public function ProductShow($id)
    {
        $Product = Product::find($id);
    
        if (!$Product) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, Product Tidak Ada.'
            ], 400);
        }
    
        return $Product;
    }
    public function ProductAdd(Request $request)
    {
        $data = $request->only('name', 'sku', 'brand');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'sku' => 'required',
            'brand' => 'required'
        ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }

            $product = Product::create([
                'name' => $request->name,
                'sku' => $request->sku,
                'brand' => $request->brand
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Product Add Sukses',
                'data' => $product
            ], 200);
    }
    public function ProductEdit(Request $request)
    {
      
        $data = $request->only('name', 'sku', 'brand','id');
        $validator = Validator::make($data, [
           'name' => 'required|string',
           'sku' => 'required',
           'brand' => 'required',
           'id'  => 'required'
        ]);
       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $get = Product::find($request->id);
         
        if (!$get) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, Product Tidak Ada.'
            ], 400);
        }
        $product = $get->update([
           'name' => $request->name,
           'sku' => $request->sku,
           'brand' => $request->brand
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Edit Product Brand Berhasil'
        ], 200);
    }    
    public function ProductDelete(Request $request)
    {
        //   return response()->json()
        $product = Product::find($request->id);
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    } 

}

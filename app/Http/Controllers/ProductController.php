<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function productPage()
    {

        $category = Category::all();

        return view('admin.product', compact('category'));
    }




    public function createProduct(Request $productRequest)
    {

        $images = $productRequest->file('file');

        $token =  rand(100000, 999999);

        $saveProductImages =  $this->saveProductImages($images, $token);
        if (!$saveProductImages) {
            return redirect()->route('productPage')->with('danger', Session::get('imageUPLOAD_ERR'));
        }

        try {
            $saveProduct = new Product();

            $saveProduct->productName = $productRequest->pname;
            $saveProduct->productQuantity = $productRequest->pquantity;
            $saveProduct->price = $productRequest->price;
            $saveProduct->token = $token;
            $saveProduct->productDesc     = $productRequest->desc;
            $saveProduct->catid = $productRequest->catid;
            $hasBeenSaved = $saveProduct->save();

            if ($hasBeenSaved) {
                return redirect()->route('productPage')->with('success', 'Product uploaded successfully');
            }

            return redirect()->route('productPage')->with('danger', 'Unable tp process requests');
        } catch (\Throwable $e) {
            //throw $th;
            return redirect()->route('productPage')->with('danger', 'Error:' . $e->getMessage());
        } finally {
            unset($saveProduct);
        }

        return 'Images uploaded successfully!';
    }

    public function saveProductImages($images, $token)
    {
        $isImageSaved = false;

        try {
            foreach ($images as $image) {
                $instanciateImage = new Image();
                // Create a new instance of Image for each image

                $newName = uniqid() . '_' . $image->getClientOriginalName();
                $imageUrl = $_ENV['IMAGE_URL'] . "/$newName";
                $image->move('uploads', $newName);

                $instanciateImage->imageName = $newName;
                $instanciateImage->imageUrl = $imageUrl;
                $instanciateImage->token = $token;
                $isImageSaved = $instanciateImage->save();
            }
        } catch (\PDOException $e) {
            // Handle the exception, log the error, or perform any necessary actions
            // You can also throw the exception again if you want to propagate it further
            Session::flash('imageUPLOAD_ERR', $e->getMessage());
            $isImageSaved = false;
        } finally {
            unset($instanciateImage);
        }

        return $isImageSaved;
    }

    public function fetchProduct()
    {

        $products = Product::with('category:id,catname')->get();

        return view('admin.fetchProduct', compact('products'));
    }



    public function editProduct()
    {

        $productToken =  request('producttoken');
        $category = Category::all();
        $product = Product::findOrFail($productToken);
        return view('admin.updateProduct', compact('product', 'category'));
    }


    public function updateProduct(Request $request)
    {

        try {

            $producttoken =  request('producttoken');
            $updateProduct = Product::find($producttoken);
            if (!$updateProduct) {
                return redirect()->back()->with('danger', 'Product does not exists');
            }

            $updateProduct->productName = $request->pname;
            $updateProduct->productQuantity = $request->pquantity;
            $updateProduct->price = $request->price;
            $updateProduct->productDesc = $request->desc ?? "null";
            $updateProduct->catid  = $request->catid;

            if ($updateProduct->save()) {
                return redirect()->back()->with('success', 'Record updated successfully');
            }
        } catch (QueryException $e) {
            // Log the error or handle it as desired
            return redirect()->back()->with('danger', 'An error occurred while updating the product: ' . $e->getMessage());
        }
    }


    public function deleteProduct(Request $request)
    {

        $prodducttoken = request('producttoken');
        $deleteProduct = Product::find($prodducttoken);
        if (!$deleteProduct) {
            return redirect()->route('productPage')->with('danger', 'product does not exists');
        }

        $delete = $deleteProduct->delete();
        if ($delete) {
            return redirect()->route('fetchProduct')->with('success', 'Deleted sucessfully.');
        }

        return redirect()->route('fetchProduct')->with('danger', 'Failed to delete category,try again later.');
    }


    public function homepage()
    {

        $allCategories = Category::all();
        $keyword = request('search'); // Catch the keyword from the request parameter 'search'
        $countCartItems = $this->countCartItems(123);


        $Product = Product::when(request('catid'), function ($query) {
            $query->where('catid', request('catid'));
        })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('productName', 'LIKE', "%$keyword%")
                        ->orWhere('productDesc', 'LIKE', "%$keyword%");
                });
            })
            ->latest()
            ->paginate(10);

        $message = ($keyword && $Product->isEmpty()) ? 'No results found for the search term: ' . $keyword : null;
        return view('index', ['categories' => $allCategories, 'allProoduct' => $Product, 'message' => $message, 'countCart' => $countCartItems]);
    }



    public function countCartItems($usertoken)
    {
        $cartItemsCount = Cart::where('usertoken', $usertoken)
            ->count(); // Count the unique product_ids

        return $cartItemsCount;
    }
    
}

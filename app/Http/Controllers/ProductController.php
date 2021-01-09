<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Http\Requests\UpdateProductPostRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\OrderType;
use App\Models\Product;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Image;
use Session;

class ProductController extends Controller
{
    public function home()
    {
        return view('products.main');
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('products.addProduct', compact('categories'));
    }

    public function createProduct(Category $category, ProductPostRequest $request)
    {

        $image = $request->file('image');
        $filename = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('image'), $filename);
        $path = 'image/' . $filename;
        /*  return back()

        ->with('success', 'You have successfully upload image.')

        ->with('image', $filename);*/

        $slug = app("slugifier")->Slugify($request['name']);

        $products = Product::all();
        foreach ($products as $product) {
            if ($product->url == $slug) {

                return redirect()->back()->withInput()->withErrors(['nameExist' => "This name is already in use!"]);
            }
        }

        $product = Product::create([

            'name' => $request->input('name'),
            'category_id' => $request->category,
            'url' => $slug,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'pic_path' => $path,
            'date' => date('Y-m-d'),

        ]);

        return redirect(route('allProducts'));
    }

    public function delete($product)
    {
        $productObj = Product::find(intval($product));

        $productObj->delete();

        return redirect(route('home'));
    }

    public function meatProducts()
    {
        return view('products.printProducts', [

            'products' => Product::where('category_id', 2)->paginate(2),

        ]);

    }

    public function saladProducts()
    {
        return view('products.printProducts', [

            'products' => Product::where('category_id', 1)->paginate(2),

        ]);

    }

    public function potatoeProducts()
    {
        return view('products.printProducts', [

            'products' => Product::where('category_id', 3)->paginate(2),

        ]);

    }

    public function drinkProducts()
    {
        return view('products.printProducts', [

            'products' => Product::where('category_id', 4)->paginate(2),

        ]);

    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $productQuantity = $product->stock - 1;

        if ($product->stock > 0) {
            $product->update([

                'stock' => $productQuantity,

            ]);
        } else {
            return redirect()->back();

        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function reduceQuantityByOnee($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);
        $product = Product::find($id);
        $productQuantity = $product->stock + 1;

        $product->update([
            'stock' => $productQuantity,

        ]);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect(route('shoppingCart'));

    }

    public function removeProductFromCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $quantity = $cart->items[$id]['qty'];
        $cart->removeProduct($id);

        $product = Product::find($id);
        $productQuantity = $product->stock + $quantity;

        $product->update([
            'stock' => $productQuantity,

        ]);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect(route('shoppingCart'));

    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('products.shoppingCart', ['products' => null]);
        }
        $types = OrderType::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;

        return view('products.shoppingCart', compact('types', 'products', 'totalPrice'));
    }

    public function showUpdateProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.updateProduct', compact('product', 'categories'));

    }

    public function updateProduct(UpdateProductPostRequest $request, Product $prod)
    {
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('image'), $filename);
            $path = 'image/' . $filename;
        }

        if ($request['name'] != null) {
            $slug = app("slugifier")->Slugify($request['name']);

            $products = Product::all();
            foreach ($products->except([$prod->id]) as $product) {
                if ($product->url == $slug) {

                    return redirect()->back()->withInput()->withErrors(['nameExist' => "This name is already in use!"]);

                }
            }
        }

        $prod->update([

            'name' => $request->input('name'),
            'category_id' => $request->category,
            'url' => $slug,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'pic_path' => $request->file('image') ? $path : $prod->pic_path,
            'date' => date('Y-m-d'),

        ]);

        return redirect(route('home'));

    }

}

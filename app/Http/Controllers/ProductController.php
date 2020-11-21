<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Cart;
use App\Models\Category;
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

    public function printAllProducts()
    {
        $products = Product::all();
        return view('products.allProducts', compact('products'));

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

                return redirect()->back()->withInput()->withError("Това име или URL вече съществува, моля въведете ново!");

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

        return redirect(route('allProducts'));
    }

    public function meatProducts()
    {
        $products = Product::where('category_id', 2)->get();
        return view('products.printProducts', compact('products'));

    }

    public function saladProducts()
    {
        $products = Product::where('category_id', 1)->get();
        return view('products.printProducts', compact('products'));

    }

    public function potatoeProducts()
    {
        $products = Product::where('category_id', 3)->get();
        return view('products.printProducts', compact('products'));

    }

    public function drinkProducts()
    {
        $products = Product::where('category_id', 4)->get();
        return view('products.printProducts', compact('products'));

    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $productQuantity = $product->stock - 1;

        $product->update([
            'stock' => $productQuantity,

        ]);

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
            return view('products.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('products.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /* public function edit(Request $request, $url)
{

$articles = Article::all();
foreach($articles as $article)
{
if($article->url == $url)
{
return view('posts.update', compact('article'));
}
}

}

public function update(ArticlePostRequest $request, Article $article)
{

if($request->input('url') == null)
{
$slug = app("slugifier")->Slugify($request['name']);
}
else
{
$slug = $request['url'];
}

$articles = Article::all();
foreach($articles->except([$article->id]) as $articleObject)
{
if($articleObject->url == $slug)
{

return back()->withErrors("Този URL вече съществува!");

}
}

$article->update([
'name' => $request->input('name'),
'url' => $slug,
'description' => $request->input('description'),
'link' => substr($request->input('link'),17),

]);

return redirect(route('articles.index'));

}*/

}

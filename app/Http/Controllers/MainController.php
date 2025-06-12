<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Models\Product;

class MainController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $products = Product::all();
        return view('index', ['tours' => $products]);
    }

    public function productDetails(string $id)
    {
        $product = DB::table('products')->find($id);
        // create new array of image urls
        $image_paths = array($product->thumbnail);
        // decode the image array that belongs to the products
        $product->images = json_decode($product->images);
        // add the images from the produc to the new array
        foreach ($product->images as $image) {
            array_push($image_paths, $image);
        }
        // set the new array to the product
        $product->images = $image_paths;

        return view('product-details', ['product' => $product]);
    }

    public function getPageBySlug(string $slug)
    {

        $page = DB::table('pages')
            ->where('slug', '=', $slug)
            ->where('published', '=', 1)
            ->limit(1)
            ->first();

        if (empty($page)) {
            return view('404');
        }

        $page->blocks = json_decode($page->blocks);

        return view('page', ['slug' => $slug, 'page' => $page]);
    }

    public function about(){
        return view('about');
    }
}

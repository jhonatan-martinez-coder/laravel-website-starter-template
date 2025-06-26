<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categorizedProducts = array();
        $categories = Category::all();

        foreach ($categories as $c) {
            // get each category related to the product
            $category = Category::find($c->id);
            if (count($category->products) > 0) {
                // get the products of each category
                $data = array('name' => $category->name, 'products' => $category->products);
                // push to array
                array_push($categorizedProducts, $data);
            }
        }

        return view('index', ['listOfCategorizedProducts' => $categorizedProducts]);
    }

    public function productDetails(string $id)
    {
        $product = Product::find($id);
        // create new array of image urls
        $image_paths = array($product->thumbnail);
        // add the images from the produc to the new array
        foreach ($product->images as $image) {
            array_push($image_paths, $image);
        }
        $countRelatedProducts = 0;
        // set the new array to the product
        $product->images = $image_paths;
        // products organized by category
        $categorizedProducts = array();
        foreach ($product->categories as $c) {
            // get each category related to the product
            $category = Category::find($c->id);
            // get the products of each category and filter the array removing the product from the current page
            $filteredProducts = array();
            foreach ($category->products as $p) {
                // pusth to array all products with id number different from current product
                if ($p->id !== intval($id)) {
                    array_push($filteredProducts, $p);
                    $countRelatedProducts++;
                }
            }

            $groupedProductsByCategory = array('categoryName' => $category->name, 'products' => $filteredProducts);
            // push to array
            array_push($categorizedProducts, $groupedProductsByCategory);
        }

        return view('product-details', ['product' => $product, "relatedProductsGroupByCategory" => $categorizedProducts, "countRelatedProducts" => $countRelatedProducts]);
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

    public function contactForm(){
        return view('contact-form');
    }
}

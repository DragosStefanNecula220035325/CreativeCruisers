<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    public function index(){
        $product = Product::all();
        return view('adminhome', ['products'=>$product]);
    
    }

    public function productDetails($id){
        $product = Product::find($id);
        $stckThreshold = config('app.stock_threshold');
        
        if ($product->quantity > $stckThreshold){
            $stockLevel = 'In Stock';
        }
        elseif ($product->quantity <= $stckThreshold && $product->quantity > 0){
            $stockLevel = 'Low Stock';
        }
        else{
            $stockLevel = 'Out Of Stock';
        }

        $review = ProductReview::where('product_id', $id)->get();

        return view('ProductDetails', compact('product', 'stockLevel'))->with('reviews', $review);
    }
    
    public function show() {
    
        $products = Product::all();
        $categories = Product::distinct()->pluck('category')->toArray();
        $selectedCategory = request()->input('category');

        $stockLevel = 'In Stock';
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $products = Product::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('name', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%");
    }, function ($queryBuilder) {
        return $queryBuilder->newQuery();
    })->get();

    $categories = Product::distinct()->pluck('category')->toArray();
    
    return view('product_page', compact('products', 'categories'));
}

public function filterByPrice(Request $request) {
    $minPrice = $request->input('min_price', 0);
    $maxPrice = $request->input('max_price', 100);
    $categories = Product::distinct()->pluck('category')->toArray();
    $selectedCategory = $request->input('category');

    $products = Product::when($selectedCategory, function ($query) use ($selectedCategory) {
        return $query->where('category', $selectedCategory);
    })->whereBetween('price', [$minPrice, $maxPrice])->get();

    return view('product_page', compact('products', 'categories', 'selectedCategory', 'minPrice', 'maxPrice'));
}


    
    public function showByCategory(Request $request)
    {
        $category = $request->input('category');
        $categories = Product::distinct()->pluck('category')->toArray();
    
        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('category', $category);
        })->get();
    
        $selectedCategory = $category;
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }


    public function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category' => $data['category'],
            'quantity' => $data['Stock_num'],
        ]);
    }

    function addPost(Request $request){
        $request->validate([
            "name"=> "required",
            "price"=> "required",
            "description"=> "required",
            "category"=> "required",
            "Stock_num"=> "required",
            ]);

            $data['name'] = $request->name;
            $data['price'] = $request->price;
            $data['description'] = $request->description;
            $data['category'] = $request->category;
            $data['quantity'] = $request->Stock_num;
            $fileName = $request->name . ".jpg";
            $request->file('file')->move(public_path('products'), $fileName);
            Product::create($data);
            return redirect(route("admin.home"))->with("success","product added");
        }

        function add(){
            return view("admin_add");
        }

        public function adminHome(){
            return view('adminhome');
        }

        public function delete($id){
            $data = Product::find($id);
            $data->delete();
            return redirect(route('admin.home'));
        }

        public function edit($id){
            $product = Product::find($id);
            return view('admin_edit', ['products'=>$product]);
        }

        public function update(Request $request, $id){
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category = $request->input('category');
            $product->quantity = $request->input('Stock_num');

            $fileName = $product->name . ".jpg";
            $request->file('file')->move(public_path('products'), $fileName);
           

            $product->update();
            return redirect(route('admin.home'))->with('Data updated successfully');

        }

}


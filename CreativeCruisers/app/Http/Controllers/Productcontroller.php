<?php
namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('ProductDetails', compact('product', 'stockLevel'));
    }
    
    public function show(Request $request) {
        $query = $request->input('query');
    
        if ($query) {
            // Perform search query if a query parameter is provided
            $products = Product::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->get();
        } else {
            // If no query parameter is provided, return all products
            $products = Product::all();
        }
    
        $categories = Product::distinct()->pluck('category')->toArray();
        $selectedCategory = request()->input('category'); // Retrieve selected category
    
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

    
    public function showByCategory(Request $request)
    {
        $category = $request->input('category');
        $categories = Product::distinct()->pluck('category')->toArray();
    
        $products = Product::when($category, function ($query) use ($category) {
            return $query->where('category', $category);
        })->get();
    
        $selectedCategory = $category; // Pass the selected category to the view
    
        return view('product_page', compact('products', 'categories', 'selectedCategory'));
    }


    public function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'category' => $data['category'],
            'Stock_num' => $data['Stock_num'],
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
            $data['Stock_num'] = $request->Stock_num;
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
            $product->Stock_num = $request->input('Stock_num');
            $product->update();
            return redirect(route('admin.home'))->with('Data updated successfully');

        }

}


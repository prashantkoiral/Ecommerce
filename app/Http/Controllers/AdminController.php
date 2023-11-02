<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Catagory; 
use App\Models\Order; 
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::All();
        return view('admin.catagory', compact('data'));
    }

    public function storeCatagory(Request $request)
    {
        $data=new catagory;
        $data->catagory_name=$request->catagory_name;
        $data->save();
        return redirect()->back()->with('message', 'Category created successfully.');
    }
    public function destroy(Catagory $catagory)
    {
        $catagory->delete();
    
        return redirect()->back()->with('message', 'Category deleted successfully.');
                          
    }
    public function viewProduct()
    {
        $data = Catagory::all();
        return view('admin.product',compact('data'));
    }
   
    public function add_product(Request $request)
    {
        // Validate the form data
        $product = new Product();

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('product', $imageName);
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $imageName; // Set the image name
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price; // Make sure the field name matches the form field
        $product->catagory = $request->catagory;
        
        $product->save();
        
        return redirect()->back()->with('message', 'Product added successfully!');
        

    
        // Upload image
       
    }

    public function showProducts()
{
    $products = Product::all(); // Retrieve all products
    return view('admin.show_product', compact('products'));
}

public function delete_product($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    $product->delete();
    return redirect()->back()->with('message', 'Product deleted successfully.');
}

public function update_product()
{
  
      return view('admin.update_product');
}

public function Order()
{

    $Order=Order::all();
  return view("admin.Order",compact('Order'));
}

public function delivered($id)
{
$Order=Order::find($id);
$Order->delivery_status="delivered";
$Order->payment_status="Paid";
$Order->save();
return redirect()->back();
}

public function print_pdf($id)
{
    $Order=Order::find($id);
    $pdf=Pdf::loadView('admin.pdf',compact('Order'));
    return $pdf->Download('Order_Details.pdf');

}


    public function search(Request $request)
    {
        $search = $request->search;
        
        $Order = Order::where('name', 'LIKE', "%$search%")
                      ->orWhere('email', 'LIKE', "%$search%")
                      ->orWhere('phone', 'LIKE', "%$search%")
                      ->orWhere('address', 'LIKE', "%$search%")
                      ->orWhere('product_title', 'LIKE', "%$search%")
                      ->orWhere('product_id', 'LIKE', "%$search%")
                      ->orWhere('payment_status', 'LIKE', "%$search%")
                      ->orWhere('delivery_status', 'LIKE', "%$search%")
                      ->get();
    
                      if ($Order->isEmpty()) {
                        return view('admin.Order', compact('Order'))->with('message', 'No matching orders found.');
                    } else {
                        return view('admin.Order', compact('Order'));
                    }
    }
    
}


<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Card;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Session;
use Stripe;

class HomeController extends Controller
{

    public function index()
    {
        $products=product::paginate(3);
        $comments = Comment::all(); // Fetch comments
        $reply = Reply::all();
        return view('home.userpage',compact('products','comments','reply'));
    }

    public function redirect()
    {
        $usertype = auth()->user()->usertype;

        if ($usertype == '1') {
            $total_product=Product::all()->count();
            $total_Order=Order::all()->count();
            $total_User=User::all()->count();
            //total aarevenu
            $Order = Order::all();
$total_revenue = 0;

foreach ($Order as $order) { // Use $order instead of $Order
    $total_revenue = $total_revenue + $order->price; // Use $order instead of $Order
}
$total_delivered = Order::where('delivery_status', 'delivered')->count();
$total_processing = Order::where('delivery_status', 'processing')->count();

            return view('admin.home',compact('total_product','total_Order','total_User','total_revenue','total_delivered','total_processing'));
        } else {
            $products = Product::paginate(3);
            $comments = Comment::all(); // Fetch comments
            $reply = Reply::all();
            return view('home.userpage', compact('products', 'comments','reply'));
        }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }    
   
    public function add_cart(Request $request,$id)
    {
        if(Auth::id()) 
        {
           $user=Auth::user();
           $product=product::find($id);
           $Card=new Card;
           $Card->name=$user->name;
$Card->email=$user->email;
$Card->phone=$user->phone;
$Card->address=$user->address;
$Card->user_id=$user->id;
$Card->product_title=$product->title;
$Card->price=$product->price;
$Card->image=$product->image;
$Card->Product_id=$product->id;
$Card->quantity=$request->quantity;
$Card->save();

return redirect()->back();

        }
        else
{
    return redirect('login');
}
    }    

    public function show_card()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $card=card::where('user_id','=',$id)->get();
            return view('home.show_card', compact ('card'));
        }

        else
        {
            return redirect('login');
        }

    }

    public function remove_card($id)
    {
        $card=Card::find($id);

        $card->delete();

        return redirect()->back();

    }
   

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $cards = Card::where('user_id', $userid)->get();
    
        foreach ($cards as $card) {
            $order = new Order;
            $order->name = $card->name;
            $order->email = $card->email;
            $order->phone = $card->phone;
            $order->address = $card->address;
            $order->user_id = $card->user_id;
            $order->product_title = $card->product_title;
            $order->price = $card->price;
            $order->quantity = $card->quantity;
            $order->image = $card->image;
            $order->product_id = $card->Product_id;
            $order->payment_status ='cash on delivery';
            $order->delivery_status = 'processing';
            $order->save(); // Save the order object to the database
        }
    
        // Optionally, you can also remove the card data after transferring to orders
        session()->flash('message', 'Your order has been received. We will process it shortly.');
        Card::where('user_id', $userid)->delete();
        return redirect()->back();
    }
    
    public function stripe($Total)
    {
        return view('home.stripe',compact('Total'));
    }

    public function stripePost(Request $request,$Total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $Total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $cards = Card::where('user_id', $userid)->get();
    
        foreach ($cards as $card) {
            $order = new Order;
            $order->name = $card->name;
            $order->email = $card->email;
            $order->phone = $card->phone;
            $order->address = $card->address;
            $order->user_id = $card->user_id;
            $order->product_title = $card->product_title;
            $order->price = $card->price;
            $order->quantity = $card->quantity;
            $order->image = $card->image;
            $order->product_id = $card->Product_id;
            $order->payment_status ='Paid';
            $order->delivery_status = 'processing';
            $order->save(); // Save the order object to the database
        }
    
        // Optionally, you can also remove the card data after transferring to orders
        Card::where('user_id', $userid)->delete();
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_Order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id', $userid)->get();
            return view('home.Order', compact ('order'));
        }
            else
            {
                 return redirect('login');
            }

   }
   public function cancel_order($id)
   {
    $order = Order::find($id);
    if ($order) {
        $order->delivery_status = 'You Canceled the order';
        $order->save();
    }
    return redirect()->back();
   }

   public function add_comment(Request $request)
   {
if(Auth::id())
{
    $comment=new comment;
    $comment->name=Auth::user() ->name;
    $comment->user_id=Auth::user()->id;
    $comment->comment=$request->comment;
    $comment->save();
    return redirect()->back();

}
else
{
    return redirect('login');
}

}

public function add_reply(request $request)
{
  if(Auth::id()) 
  {
    $reply=new reply;
    $reply->name=Auth::user() ->name;
    $reply->user_id=Auth::user()->id;
    $reply->comment_id=$request->commentId;
    $reply->reply=$request->reply;
    $reply->save();
    return redirect()->back();
  }
  else
  {
    return redirect('login');
  }
}

public function product_search(Request $request)
{
    $comment=comment::orderby('id', 'desc')->get();
    $reply=reply::all();
    $serach_text=$request->search;
    $product=product::where('title','LIKE',"%$serach_text%")->paginate(10);
    return view('home.userpage', compact('product','comment','reply'));
    }
}


 
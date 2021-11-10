<?php

namespace App\Http\Controllers;
use App\Models\Suplementacao;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{

    public function shop()
    {
        if(session()->has('email')){
        $suplementos = Suplementacao::all();
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
        }else{
            return redirect("/login");
        }
    }

    public function cart(){
        if(session()->has('email')){
        $cartCollecion = \Cart::getContent();
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection'=>$cartCollecion]);
        }else{
            return redirect("/login");
        }
    }
    
    public function showmail(){
        return view('mail');
    }
    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'category'=> $request->category,        //adicionamos categoria a request
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image
            )
        ));
        return redirect('/userSuplementacao')->with('success_msg', 'Item is Added to Cart!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect('/cart')->with('success_msg', 'Item is removed!');
    }
    

    public function update(Request $request){
        
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect('/cart')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect('/cart')->with('success_msg', 'Car is cleared!');
    }

    public function checkout(){
        if(session()->has('email')){
            $cartCollecion = \Cart::getContent();
            if((\Cart::getTotalQuantity() )== 0){
                return redirect('/usersHome');
            }
            return view('checkout',['cartCollection'=>$cartCollecion]);
        }else{
        return redirect("/login");
        }  
    }

    /*public function storeCheckout(Request $request){
        try {
            $charge = \Stripe::charges()->create([
                'amount' => \Cart::getSubTotal(),
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                //'receipt_email' => $request->email,
            ]);
            sendmail();

        }catch (Exception $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }*/
    
    

    public function sendemail(){
        
            /*$charge = \Stripe::charges()->create([
                'amount' => \Cart::getSubTotal(),
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                //'receipt_email' => $request->email,
            ]);*/

        if (\Cart::getTotalQuantity() > 0) {
            $carts = \Cart::getContent();
            $data["email"]=session()->get('email');
            $data["subject"]="Order receipt";
            $pdf = PDF::loadView('pdf');

            $pdf_name = time();
            
            Storage::put('public/pdf/'.$pdf_name.'.pdf',$pdf->output());
            $user_email=session()->get('email');
            $filename=$pdf_name.'.pdf';
            $total = \Cart::getSubTotal();

            DB::table('orders')->insert([
                'email'=>$user_email,
                'pdf'=>$filename,
                'valor_total'=>$total,
            ]);

            try{
                Mail::send('mail',$data,function ($message) use ($data,$pdf){
                    $message->to($data["email"]);
                    $message->subject($data["subject"]);
                    $message->attachData($pdf->stream(), 'client.pdf');
                });
            }catch(JWTException $exception){
                $this->serverstatuscode="0";
                $this->serverstatusdes=$exception->getMessage();
            }
            if (Mail::failures()) {
                $this->statusdesc  =   "Error sending mail";
                $this->statuscode  =   "0";
            } else {
                $this->statusdesc  =   "Message sent Succesfully";
                $this->statuscode  =   "1";
            }
        }
        return redirect('/usersHome');
    }
}

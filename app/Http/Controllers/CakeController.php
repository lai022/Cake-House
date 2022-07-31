<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use Auth;

class CakeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }

    public function index(){
        $cakes = Cake::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('cakes.index')->with('cakes', $cakes);
    }

    public function show($id){
        $cakes = Cake::findOrFail($id);
        return view('cakes.show')->with('cakes', $cakes);
    }

    public function create(){
        return view('cakes.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'toppings' => 'required'
        ]);

        $cake = new Cake();
        $cake->name = request('name');
        $cake->type = request('type');
        $cake->quantity = request('quantity');
        $cake->toppings = request('toppings');
        $cake->user_id = auth()->user()->id;

        $cake->save();
        return redirect('/')->with('success', 'Your order has been added successfully!');
    }

    public function modify($id){
        $cakes = Cake::findOrFail($id);
        if(auth()->user()->id !== $cakes->user_id){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        return view('cakes.modify')->with('cakes', $cakes);
        
    }

    public function change(Request $request, $id){   
        
        $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'toppings' => 'required'
        ]);

        $cake = Cake::findOrFail($id);
        $cake->name = request('name');
        $cake->type = request('type');
        $cake->quantity = request('quantity');
        $cake->toppings = request('toppings');
        $cake->update();        
        return redirect('/')->with('success', 'Your order has been updated successfully!');


    }

    public function delete($id){
        $cake = Cake::findOrFail($id);
        if(auth()->user()->id !== $cake->user_id){
           return  redirect('/')->with('error', 'Unauthorized Page');
        }
        $cake->delete();
        return redirect('/')->with('success', 'This order has been deleted successfully!');
    }
}

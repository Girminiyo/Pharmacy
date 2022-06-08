<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
       
  public function register()
  {
  return view('Customer.register');
  }
    function store(Request $request)
    
    {
      $Customer =new Customer();
      $Customer->id = $request->id;
      $Customer->name = $request->Fname;
      $Customer->Lname = $request->Lname;
      $Customer->age = $request->age;
      $Customer->phone = $request->phone;
     $is_saved = $Customer->save();
    if($is_saved){
    echo "YOUR DATA Record saved successfully.";
               }
    else{
     echo "Sorry, try again something went wrong.";
       }

       
    }
    public function get_all()
    {
     $Customer = Customer::all();
     return view('Customer.list', compact('Customer'));
    } 
    public function edit($id)
 {
 $Customer = Customer::find($id);
 return view('Customer.edit', compact('Customer'));
 }
 public function update(Request $request)
 {
  $request->validate([
    'name' => 'required'
    ]);
    $Customer= Customer::find($request->id);
    $Customer->Fname = $request->Fname;
    $Customer->Lname = $request->Lname;
    $Customer->age = $request->age;
    $Customer->phone = $request->phone;
    $Customer->save();
    return redirect('Customer/list');
    }
    public function delete($id)
 {
 Customer::where('id', $id)->delete();
 return redirect('Customer/list');
   
}

public function search($id)
    {
     $Customer = Customer::where('id',$id)->first();
     return view('Customer.search', compact('Customer'));
    } 
  }

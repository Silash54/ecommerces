<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $company = Company::first();
        View::share([
            'company' => $company
        ]);
    }
    public function home()
    {
        $vendors = Vendor::where('status','approved')->get();
        $products=Product::whereNotNull('discount')->orWhere('discount','!=',0)->limit(16)->get();
        return view('frontend.home',compact('vendors','products'));
    }
    public function VendorRequest(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required|digits:10|unique:shops',
            'shop_name' => 'required'
        ]);

        // Create Vendor
        $vendor = Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('silas123')
        ]);

        // Check if vendor was created before inserting shop
        if ($vendor) {
            $shop = Shop::create([
                'name' => $request->shop_name,
                'phone' => $request->phone,
                'vendor_id' => $vendor->id // FIXED THIS LINE
            ]);
        }

        // Prepare email data
        $data = [
            'subject' => 'New Vendor request',
            'to' => 'Silas Rai',
            'message' => "Vendor request received from $request->name with email $request->email. 
            Password is silas123, phone is $request->phone, and shop name is $request->shop_name"
        ];

        // Send email notification
        Mail::to("silasraii144@gmail.com")->send(new EmailNotification($data));

        // Show success toast
        toast('Your request has been successfully submitted', 'success');

        return redirect()->back();
    }
    public function Compare(Request $request)
    {
        $q=$request->q;
        $products=Product::where('name','like', "%$q%")->orderBy('price','asc')->get();
        return view('frontend.compare',compact('products','q'));
    }
    public function Vendor(Request $request, $id)
    {
        
        $vendor=Vendor::findOrFail($id);
        $products=$vendor->products;
        //search for products
        $q=$request->q;
        if($q){
            $products=Product::where('name','like',"%$q%")->orderBy('price','asc')->get();
        }
        return view('frontend.vendor',compact('vendor','products'));
    }
}

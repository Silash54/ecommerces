<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Admin;
use App\Models\Company;
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
        $company=Company::first();


        View::share([
            'company'=>$company
        ]);
    }
    public function home()
    {
        return view('frontend.home');
    }
    public function VendorRequest(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:vendors',
            'phone'=>'required|digits:10|unique:shops',
            'shop_name'=>'required'
        ]);
        $vendor=new Vendor();
        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->password=Hash::make('silas123');
        $vendor->save();

        $shop=new Shop();
        $shop->name=$request->shop_name;
        $shop->phone=$request->phone;
        $shop->vendor_id=$vendor->id;
        $shop->save();
        $data=[
            'subject'=>'New Vendor request',
            'to'=>'Silas Rai',
            'message'=>"Vendor request received from $request->name with email $request->email password is silas123 and phone is $request->phone and shop name is$request->shop_name"
        ];
        $admins=Admin::all();
        Mail::to($admins)->send(new EmailNotification($data));
        toast('your request has successfully submitted','success');
        return redirect()->back();
    }
}

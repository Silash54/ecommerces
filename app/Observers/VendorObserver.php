<?php

namespace App\Observers;

use App\Mail\EmailNotification;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;

class VendorObserver
{
    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
{
    if ($vendor->isDirty('status') && $vendor->status === 'approved') {
        $data = [
            "subject" => "Vendor Request Approved",
            "to" => $vendor->name,
            "message" => "Your vendor has been approved.\n
            You can log in to your account. Your credentials are:\n
            Email: $vendor->email\n
            Password: silas123\n
            Login URL: " . url('/vendor/login')
        ];

        Mail::to($vendor->email)->send(new EmailNotification($data));
    }
}


    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void {}

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}

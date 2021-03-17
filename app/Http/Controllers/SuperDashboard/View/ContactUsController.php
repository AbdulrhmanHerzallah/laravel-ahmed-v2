<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function show()
    {
       $contactUs = ContactUs::orderBy('id', 'DESC')->paginate(40);
       return view('super-dashboard.contact-us.show', ['contactUs' => $contactUs]);
    }

    public function delete($id)
    {
        ContactUs::destroy($id);
        toast(__('keywords.delete.well.done'), 'success');
        return redirect()->back();
    }
}

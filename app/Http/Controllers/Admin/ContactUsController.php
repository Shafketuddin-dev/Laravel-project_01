<?php
  
namespace App\Http\Controllers\Admin;
  
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\NewConnectionRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use App\Mail\newConnectionNotification;
use Illuminate\Support\Facades\Mail;
  
class ContactUsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'query' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'name.required'  => 'Full Name is required',
            'email.required' => 'Valid Email is required',
            'phone.required' => 'Phone Number must be 11 digits',
            'subject.required' => 'Subject is required',
            'query.required'   => 'Message is required',
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha'
        ]);
  
        ContactUs::create($request->all());

        Alert::success('Mail Sent Successfully','OSCL will contact you shortly');
  
        return redirect()->back();
    }
    public function manageContactMessage()
    {
        return view('backend.cms.contact_query.index', [
            'contact_query' => ContactUs::orderBy('id','desc')->get(),
        ]);
    }
    public function viewContactMessage($id)
    {
        $contact_details = ContactUs::where('id', $id)->first();
    
        return view('backend.cms.contact_query.details', [
            'contact_details' => $contact_details
        ]);
    }
    public function deleteContactMessage(Request $request)
    {
        $contact_query = ContactUs::find($request->contact_query_id);

        $contact_query->delete();

        return redirect()->route('admin.manage_contact_message')->with('message', 'Successfully Deleted!');
    }

    public function saveConnectionForm(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required'
        ], [
            'fullname.required'  => 'Full Name is required',
            'phone.required' => 'Phone Number a digits',
            'email.required' => 'Valid Email is required',
            'address.required'   => 'Address is required',
        ]);
    
        // Save form data to the database
        $new_connection_request = new NewConnectionRequest();
        $new_connection_request->package_id = $request->package_id;
        $new_connection_request->fullname = $request->fullname;
        $new_connection_request->phone = $request->phone;
        $new_connection_request->email = $request->email;
        $new_connection_request->address = $request->address;
        $new_connection_request->save();
    
        // Send email notification
        $formData = $request->all();
        Mail::to('johnsubcse@gmail.com')->send(new newConnectionNotification($formData));
    
        Alert::success('Successfully Registered', 'OSCL will contact you shortly');
    
        return redirect()->back();
    }
}

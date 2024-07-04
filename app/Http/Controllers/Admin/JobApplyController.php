<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApply;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

require_once app_path('Helper/image.php');

class JobApplyController extends Controller
{
    public function saveJobApply(Request $request){
        $request->validate([
            'name' => 'required|alpha_spaces',
            'phone' => 'required|digits:11|numeric',
            'email' => 'required|email:rfc,dns',
            'agree' => 'required',
            'cover_letter' => 'required|min:200',
            'document' => 'required|mimes:pdf,doc,docx',
        ], [
            'name.required' => 'Full Name is required',
            'name.alpha_spaces' => 'Full Name should contain only alphabetic characters and spaces',
            'phone.required' => 'Phone Number is required',
            'phone.digits' => 'Phone Number must be 11 digits',
            'phone.numeric' => 'Phone Number must be numeric',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address',
            'cover_letter.required' => 'Cover Letter is required',
            'cover_letter.min' => 'Cover Letter should be minimum 200 characters',
            'agree.required' => 'You must agree to the terms',
            'document.required' => 'User CV is required',
        ]);
        $job_apply = new JobApply();
        $job_apply->job_id = $request->job_id;
        $job_apply->name = $request->name;
        $job_apply->phone = $request->phone;
        $job_apply->email = $request->email;
        $job_apply->cover_letter = $request->cover_letter;
        $job_apply->document = image_upload($request->document);
        $job_apply->save();
        Alert::success('Application Submit Successfully','OSCL will contact you shortly');

        return redirect()->back();
    }
    public function manageJobApply(){
        return view('backend.admin.registration.candidate', [
            'job_apply' => JobApply::orderBy('id','desc')->get()
        ]);
    }
    public function detailsJobApply($id){
        $job_apply_details = JobApply::where('id', $id)->first();
        return view('backend.admin.registration.candidate_details', [
            'job_apply_details' => $job_apply_details
        ]);
    }
    public function deleteJobApply(Request $request)
    {
        $job_apply = JobApply::find($request->job_apply_id);

        if (isset($job_apply)) {
            delete_image($job_apply->document);
            $job_apply->delete();
        }

        $job_apply->delete();

        return redirect()->route('manage_job_apply')->with('message', 'Successfully Deleted!');
    }
}

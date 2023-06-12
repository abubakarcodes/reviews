<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Mail\SubmitResponseMail;
use App\Models\Company;
use App\Models\Review;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    public function index()
    {

        return view('frontend.index', [
            'companies' => Company::orderBy('name', 'asc')->get(),
            'reviews' => Review::approved()->latest()->limit(10)->get(),
        ]);
    }

    public function submitReview()
    {
        return view('frontend.submit-reviews');
    }

    public function submitReviewForm(Request $request)
    {
        $request->validate([
            'manager' => 'required',
            'company' => 'required',
            'group1' => 'required',
            'city1'  => 'required',
            'review'  => 'required',
            'discussion'  => 'required',
            'communication'  => 'required',
            'professionalism'  => 'required',
            'expertise'  => 'required',
            'overall' => 'required',
        ]);
        $data = $request->all();
        $company = Company::where('slug', Str::slug($data['company']))->first();
        if (!isset($company->id)) {
            $company =  Company::create([
                'name' => $data['company'],
                'slug' => Str::slug($data['company']),
            ]);
        }
        $company->reviews()->create($data);
        return back()->with('success', 'Your review added and will be shown after approval successfully!');
    }

    public function submitResponse()
    {

        return view('frontend.submit-response');
    }

    public function submitResponseForm(Request $request)
    {
        $message = $request->validate([
            'manager' => 'required',
            'company' => 'required',
            'response' => 'required',
        ]);
        $admins = Role::where('name', 'admin')->first()->users;
        foreach ($admins as $admin) {
            Mail::to($admin)->queue(new SubmitResponseMail($message));
        }
        return back()->with('success', 'Your response sent successfully');
    }

    public function donate()
    {
        return view('frontend.donate');
    }

    public function contactUs()
    {
        return view('frontend.contact');
    }

    public function company(Company $company)
    {
        return view('frontend.company', [
            'company' => $company,
        ]);
    }
    public function contactUsform(Request $request)
    {
        $message =  $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'subject' => 'required',
            'message' => 'required',
        ]);
        $admins = Role::where('name', 'admin')->first()->users;
        foreach ($admins as $admin) {
            Mail::to($admin)->queue(new ContactUs($message));
        }
        return redirect()->back()->with('success', 'Your message sent successfully');
    }
}

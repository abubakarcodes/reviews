<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Company;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('backend.reviews.index', [
            'approvedReviews' => Review::latest()->approved()->get(),
            'pendingReviews' => Review::where('isApproved', 0)->get(),
        ]);
    }
    public function create()
    {
        return view('backend.reviews.create');
    }

    public function edit(Review $review)
    {
        return view('backend.reviews.edit', [
            'review' => $review,
        ]);
    }

    public function store(Request $request)
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
        return back()->with('success', 'Your review added successfully');
    }

    public function update(Review $review, Request $request)
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
        $data['companyId'] = $company->id;
        $review->update($data);
        return back()->with('success', 'Your review updated successfully');
    }

    public function toggleReviewApprove(Review $review)
    {
        $review->update([
            'isApproved' => $review->isApproved == 1 ? 0 : 1,
        ]);
        return redirect()->back()->with('success', 'Review approved successfully!');
    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}

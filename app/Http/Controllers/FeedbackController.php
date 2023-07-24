<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FeedbackFormRequest;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('display_status', 'asc')->latest()->get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        //
    }

    public function store(FeedbackFormRequest $request)
    {
        //
    }

    public function show(Feedback $feedback)
    {
        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.feedbacks.edit', compact('feedback'));
    }

    public function update(FeedbackFormRequest $request, Feedback $feedback)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if (!is_null($feedback->image)) {
                Storage::delete($feedback->image);
            }
            $validatedData['image'] = $request->file('image')->store('feedbackImage');
        }
        $feedback->update($validatedData);
        return redirect()->route('feedback.index')->with('info', 'Details updated successfully.');
    }

    public function destroy(Feedback $feedback)
    {
        if (!is_null($feedback->image)) {
            Storage::delete($feedback->image);
        }
        $feedback->delete();
        return redirect()->route('feedback.index')->with('danger', 'Message removed successfully.');
    }
}

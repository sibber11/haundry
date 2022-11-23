<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Flash;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Feedback $feedbacks */
        $feedbacks = Feedback::paginate(10);
        return view('admin.feedback.index')->with('feedbacks', $feedbacks);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFeedbackRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        $input = $request->all();
        $feedback = Feedback::create($input);
        Flash::success('Feedback saved successfully.');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var  Feedback $feedback */
        $feedback = Feedback::find($id);

        if (empty($feedback)) {
            \Laracasts\Flash\Flash::error('Feedback not found');

            return redirect(route('admin.feedback.index'));
        }

        return view('admin.feedback.show')->with('feedback', $feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        /** @var  Feedback $Feedback */
        $feedback = Feedback::find($id);

        if (empty($feedback)) {
            \Laracasts\Flash\Flash::error('Feedback not found');

            return redirect(route('admin.feedbacks.index'));
        }

        $feedback->delete();

        Flash::success('Feedback deleted successfully.');

        return redirect(route('admin.feedbacks.index'));
    }
}

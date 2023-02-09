<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Flash;
use Illuminate\Http\Request;

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
    public function update($id, Request $request)
    {
        /** @var  Feedback $Feedback */
        $feedback = Feedback::find($id);
//        dd($request->all());
        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('admin.feedbacks.index'));
        }
        if ($request->has('toggle')) {
            $feedback->show = !$feedback->show;
            $feedback->save();
        }
        Flash::success('Feedback visibility toggled successfully.');

        return redirect(route('admin.feedbacks.index'));
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
            Flash::error('Feedback not found');

            return redirect(route('admin.feedbacks.index'));
        }

        $feedback->delete();

        Flash::success('Feedback deleted successfully.');

        return redirect(route('admin.feedbacks.index'));
    }
}

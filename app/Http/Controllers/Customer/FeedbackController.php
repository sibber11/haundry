<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Flash;

class FeedbackController extends Controller
{
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
        Flash::success('Thank You for providing your valuable Feedback.');

        return redirect(route('home'));
    }
}

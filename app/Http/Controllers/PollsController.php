<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PollsController extends Controller
{
    public function index()
    {
        $polls = Poll::all();

        return view('polls.index', compact('polls'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function show(Poll $poll)
    {
        return view('polls.show', compact('poll'));
    }

    public function store()
    {
        $poll = new Poll;

        $poll->question_text = request('question_text');
        $poll->choice_1 = request('question_choice_1');
        $poll->choice_2 = request('question_choice_2');
        $poll->choice_3 = request('question_choice_3');

        $poll->save();

        session()->flash('notification.success', 'Sondage créé avec succès!');

        return redirect(route('polls.show', $poll));
    }
}

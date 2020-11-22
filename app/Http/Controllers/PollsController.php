<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Poll;
use Illuminate\Support\Facades\Validator;

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
        $poll = Poll::create(['question_text' => request('question_text')]);

        if($poll){
            for ($i = 1 ;$i < 4; $i++){
                $poll->choices()->create([
                    'name' => request('question_choice_'.$i),
                    'poll_id'=>  $poll->id
                ]);
            }
        }

        session()->flash('notification.success', 'Sondage créé avec succès!');

        return redirect(route('polls.show', $poll));
    }
}

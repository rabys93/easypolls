<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Poll;
use Illuminate\Http\Request;
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

    public $pollRules = [
        'question_text' => 'required|max:255',
        'question_choice_1' => 'required,',
        'question_choice_2' => 'required',
        'question_choice_3' => 'required',
    ];

    public function store(Request $request)
    {
        $validator = $request->validate($this->pollRules);

        $poll = Poll::create(['question_text' => $request->get('question_text')]);

        if($poll){
            for ($i = 1 ;$i < 4; $i++){
                $poll->choices()->create([
                    'name' => $request->get('question_choice_'.$i),
                    'poll_id'=>  $poll->id
                ]);
            }
        }

        session()->flash('notification.success', 'Sondage créé avec succès!');

        return redirect(route('polls.show', $poll));
    }
}

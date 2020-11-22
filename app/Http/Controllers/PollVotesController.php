<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PollVotesController extends Controller
{
    public function __invoke(Poll $poll)
    {
        collect($poll->choices)->each(function ($choice){
            if (request('choice') === $choice->name) {
                $choice->increment('choice_votes');
            }
        });

        session()->flash('notification.success', 'Merci d\'avoir répondu à ce sondage!');

        return redirect(route('polls.results', $poll));
    }
}

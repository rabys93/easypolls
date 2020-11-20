<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PollVotesController extends Controller
{
    public function __invoke(Poll $poll)
    {
        if (request('choice') === 'choice_1') {
            $poll->increment('choice_1_votes');
        } else if (request('choice') === 'choice_2') {
            $poll->increment('choice_2_votes');
        } else if (request('choice') === 'choice_3') {
            $poll->increment('choice_3_votes');
        } else {
            throw new \LogicException('Invalid choice!');
        }

        session()->flash('notification.success', 'Merci d\'avoir répondu à ce sondage!');

        return redirect(route('polls.results', $poll));
    }
}

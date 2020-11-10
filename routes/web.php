<?php

use App\Models\Poll;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

Route::get('/', function() {
    return view('home');
});

Route::post('/polls', function() {
    $poll = new Poll;

    $poll->question_text = request('question_text');
    $poll->choice_1 = request('question_choice_1');
    $poll->choice_2 = request('question_choice_2');
    $poll->choice_3 = request('question_choice_3');

    $poll->save();

    dd('Sondage créé avec succès!');
});

Route::get('/polls/{id}', function($id) {
    $poll = Poll::findOrFail($id);

    return view('polls.show', compact('poll'));

});

Route::post('/polls/{id}/vote', function($id) {

    $poll = Poll::findOrFail($id);

    for($i=1 ; $i< 4; $i++){
       if(request('choice') == 'choice_'.$i) {
           session()->put(['vote'.$i => ( session('vote'.$i ) ? session('vote'.$i) + 1 : 1 )]);
           session()->save();

       }
    }

    return view('polls.show', compact('poll'));
});

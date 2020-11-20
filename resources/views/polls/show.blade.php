@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <form method="POST" action="{{ route('polls.vote', $poll) }}">
        @csrf

        <label for="choice_1">
            <input type="radio" id="choice_1" name="choice" value="choice_1"> {{ $poll->choice_1 }} {{ session()->get('vote1') }}
        </label><br>
        <label for="choice_2">
            <input type="radio" id="choice_2" name="choice" value="choice_2"> {{ $poll->choice_2 }} {{ session()->get('vote2') }}
        </label><br>
        <label for="choice_3">
            <input type="radio" id="choice_3" name="choice" value="choice_3"> {{ $poll->choice_3 }} {{ session()->get('vote3') }}
        </label><br>

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection

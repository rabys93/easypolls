@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $poll->id }}</h1>

    <h2>{{ $poll->question_text }}</h2>

    <form method="POST" action="{{ route('polls.vote', $poll) }}">
        @csrf
        @foreach($poll->choices as $choice)
            <label for="{{$choice->name}}">
                <input type="radio" id="{{$choice->name}}" name="choice" value="{{$choice->name}}"> {{ $choice->name }} {{ $choice->choice_votes }}
            </label><br>
        @endforeach

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1><a href="{{ route('polls.show', $poll) }}">Poll #{{ $poll->id }}</a></h1>

    <h2>{{ $poll->question_text }}</h2>


    <ul>
        @foreach($poll->choices as $choice )
            <li>{{ $choice->name }}: <b>{{ $choice->choice_votes }} votes</b></li>
        @endforeach
    </ul>

@endsection

@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('polls.store') }}">
        @csrf

        <div class="form-group">
            <label for="question_text">Question Text</label><br>
            <textarea id="question_text" name="question_text" autofocus required ></textarea>
            @if ($errors->has('question_text'))
                <span  style="color: red; display: block;">{{ $errors->first('question_text') }}</span>
            @endif
        </div>

        <div lass="form-group">
            <h3>Choices</h3>
            <input type="text" name="question_choice_1" placeholder="Enter choice" required><br>
            @if ($errors->has('question_choice_1'))
                <span  style="color: red; display: block;">{{ $errors->first('question_choice_1') }}</span>
            @endif
            <input type="text" name="question_choice_2" placeholder="Enter choice" required><br>
            @if ($errors->has('question_choice_2'))
                <span style="color: red; display: block;">{{ $errors->first('question_choice_2') }}</span>
            @endif
            <input type="text" name="question_choice_3" placeholder="Enter choice" required>
            @if ($errors->has('question_choice_3'))
                <span  style="color: red; display: block;">{{ $errors->first('question_choice_3') }}</span>
            @endif
        </div>

        <br>

        <div>
            <button type="submit" formnovalidate>Create Poll</button>
        </div>
    </form>
@endsection

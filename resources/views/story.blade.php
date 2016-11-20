@extends('master', ['title' => 'Story'])
@section('content')
<main>
 <h1>Adventure #{{ $adventure['id'] }}</h1>
 <h2>{{ $adventure['description'] }}</h2>
 <p>
     It's an early Saturday morning miracle. You have no assignments due and no upcoming exams. You decided to treat yourself to <b>{{ $story[1] }}</b>. After arriving at your destination, you realize you forgot <b>{{ $story[2] }}</b>. You decide to <b>{{ $story[3] }}</b>.
 </p>
</main>
@endsection
@extends('master', ['title' => 'Index'])
@section('content')
 <main>
     <h1>Adventure #{{ $adventure['id'] }}</h1>
     <h2>{{ $adventure['description'] }}</h2>
     <form action="/story" method="post">
     {{ csrf_field() }}
     <input type="hidden" name="adventure_id" value="{{ $adventure['id'] }}">
        @foreach ($questions as $q)
        <label for="{{$q['id']}}">{{$q['description']}}</label>
        <select name="questions[{{ $q['id'] }}]">
            @foreach ($choices[$q['id']] as $c)
            <option value="{{$c['id']}}">
                {{$c['description']}}
            </option>
            @endforeach
        </select>
        @endforeach
        <button type="submit">Go!</button>
    </form>
</main>
@endsection
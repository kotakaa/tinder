@extends('layouts.app')

@section('content')
    <div class="p-match-index">
        <div class="container">
            <div class="row">
                @foreach ($matchedUsers as $matchedUser)
                    <div class="col-md-12" style="margin-bottom: 2rem;">
                        <img src="{{ Storage::url($matchedUser->toUser->image) }}" class="round-image" alt="Tinder Photo"/>
                        <span style="margin-left: 1rem;">{{ $matchedUser->toUser->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

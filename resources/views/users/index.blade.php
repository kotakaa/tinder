@extends('layouts.app')

@section('content')
@if (is_null($user))
    <p style="text-align: center;">ユーザーがいません</p>
@else
    <div class="p-user-index">
        <div class="tphoto">
            <img src="{{ Storage::url($user->image) }}" class="image" alt="Tinder Photo" />
            <div class="tname"></div>
        </div>
    
        <div class="tcontrols">
            <div class="container">
                <div class="row">
                    <div style="display: flex;">
                        <form action="{{ route('users.swipes.store') }}" method="POST">
                            {{ csrf_field() }}
    
                            <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                            <input type="hidden" name="is_like" value="0">
                            <button class="tno" type="submit">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </form>
                    
                        <form action="{{ route('users.swipes.store') }}" method="POST" style="margin-left: 10rem;">
                            {{ csrf_field() }}
    
                            <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                            <input type="hidden" name="is_like" value="1">
                            <button class="tyes" type="submit">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

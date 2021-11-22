@extends('layouts.app')

@section('content')
<div class="p-user-index">
    <div class="tphoto">
        <img src="{{ Storage::url($user->image) }}" title="tphoto" alt="Tinder Photo" />
        <div class="tname"></div>
    </div>

    <div class="tcontrols">
        <div class="container">
            <div class="row">
                <div style="display: flex;">
                    <form action="" method="">
                        <button class="tno" type="submit">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </form>
                
                    <form action="" method="" style="margin-left: 10rem;">
                        <button class="tyes" type="submit">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

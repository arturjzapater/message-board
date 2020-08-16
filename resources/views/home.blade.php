@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <a href='/new-message'>Write a new message</a>
    @endif
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($messages as $msg)
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <a href="messages/{{ $msg->id }}" class="font-weight-bold">{{ $msg->title }}</a>
                            <span>{{ $msg->user->name }}</span>
                        </div>
                        <span style="font-size: 0.8rem;">{{ $msg->created_at }}</span>
                    </div>

                    <div class="card-body">
                        {{ $msg->body }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

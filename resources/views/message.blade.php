@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span class="font-weight-bold">{{ $message->title }}</span>
                        <span>{{ $message->user->name }}</span>
                    </div>
                    <span style="font-size: 0.8rem;">{{ $message->created_at }}</span>
                </div>

                <div class="card-body">
                    {{ $message->body }}
                </div>

                <div class="card-footer">
                    @if (Auth::check() && Auth::user()->id === $message->user_id)
                        <form action="/messages/{{ $message->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 offset-md-1">
            @foreach ($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $comment->body }}
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center" style="font-size: 0.8rem;">
                        @if (Auth::user()->id === $comment->user_id)
                            <form action="/messages/{{ $message->id }}/comments/{{ $comment->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @else
                            <div></div>
                        @endif
                        <span>{{ $comment->user->name }} on {{ $comment->created_at }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @auth
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Add a comment
                    </div>
                    <form action="/messages/{{ $message->id }}/comments" method="post" class="card-body">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif
                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror w-100" id="body" name="body">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
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
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 offset-md-1">
            @foreach ($comments as $comment)
                <div class="card align-self-end mb-2">
                    <div class="card-body">
                        {{ $comment->body }}
                    </div>
                    <div class="card-footer text-muted text-right" style="font-size: 0.8rem;">
                        {{ $comment->user->name }} on {{ $comment->created_at }}
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
                    <form action="/submit-comment/{{ $message->id }}" method="post" class="card-body">
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
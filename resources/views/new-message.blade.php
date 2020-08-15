@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Write a Message</h2>
    </div>
    <div class="row">
        <form action="/submit" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Please fix the following errors
                </div>
            @endif
            <div class="form-group">
                <label>
                    Title
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}" />
                </label>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    Name
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" placeholder="Name" value="{{ old('author') }}" />
                </label>
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    Message
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body">
                        {{ old('body') }}
                    </textarea>
                </label>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

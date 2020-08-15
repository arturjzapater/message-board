@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($messages as $msg)
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span class="font-weight-bold">{{ $msg->title }}</span>
                            <span>{{ $msg->author }}</span>
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

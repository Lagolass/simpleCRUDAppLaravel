@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    {{ $post->content }}
                </div>
            </div>

            <a href="{{ route('my_posts') }}" class="btn btn-outline-primary">
                &lt;&lt; {{ __('My posts') }}
            </a>
        </div>
    </div>
</div>
@endsection

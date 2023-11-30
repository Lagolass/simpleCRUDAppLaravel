@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (Session::has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-6">
                        {{ __('My posts') }}
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('post.create') }}" class="btn btn-outline-primary">{{ __('Create post') }}</a>
                    </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="list-group">
                    @foreach($posts->items() as $post)
{{--                            <li class="list-group-item">--}}
{{--                                {{ $post.title }}--}}
{{--                            </li>--}}
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small>{{ $post->getCreatedDate() }}</small>

                                    <div class="btn-group" role="group">
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary">{{ __('View') }}</a>
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary">{{ __('Edit') }}</a>
                                        <a href="{{ route('post.delete', $post->id) }}" class="btn btn-outline-danger">{{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
{{--                    </ul>--}}
                    </div>

                    {{ $posts->appends(request()->query())->links('post.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

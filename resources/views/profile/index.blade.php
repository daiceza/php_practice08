@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="name p-2">
                                    <h1>{{ str_limit($headline->name, 70) }}</h1>
                                    <p class="gender mx-auto">性別:{{ str_limit($headline->gender, 15) }}</p>
                                    <p class="hobby mx-auto">趣味:{{ str_limit($headline->hobby, 70) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="introduction mx-auto">{{ str_limit($headline->introduction, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日')}}
                                </div>
                                <div class="name">
                                    <h1>{{ str_limit($post->name,150) }}</h1>
                                </div>
                                <div class="gender mt-1">
                                    性別:{{ str_limit($post->gender,150) }}
                                </div>
                                <div class="hobby mt-2">
                                    趣味:{{ str_limit($post->hobby,150) }}
                                </div>
                            </div>
                            <div class="text col-md-6">
                                <div class="introduction">
                                    {{ str_limit($post->introduction,1500)}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
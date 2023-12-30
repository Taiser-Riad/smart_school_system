@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lecture: {{ $lecture->name }}</h1>
    <p>{{ $lecture->description }}</p> <!-- Assuming you have a description field -->

    <!-- Embed a video player -->
    @if($lecture->video_url)
        <video width="720" controls>
            <source src="{{ $lecture->video_url }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif

    <!-- Downloadable resources -->
    @if($lecture->resources)
        <div class="resources">
            @foreach($lecture->resources as $resource)
                <a href="{{ $resource->url }}" download>Download {{ $resource->name }}</a>
            @endforeach
        </div>
    @endif

    <!-- Lecture-specific interactions -->
    <!-- Add any interactive elements here -->

</div>
@endsection

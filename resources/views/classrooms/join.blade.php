{{-- resources/views/classrooms/join.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Join Classroom: {{ $classroom->name }}</h1>
        <p>Classroom Schedule: {{ $classroom->start_time->format('g:i A') }} to {{ $classroom->end_time->format('g:i A') }}</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Additional classroom details or streaming content goes here --}}

    </div>
@endsection

@php
    $back=auth()->user()->role . "Welcome";
@endphp
<h1>{{$heading}}</h1>
<a href="{{$back}}">
     <button>Back</button>
</a>
<br>
<br>
<a href="/classrooms/create">
     <button>Add new class</button>
</a>
@unless (count($classrooms) == 0)
@foreach ($classrooms as $classroom)
<h2>
<a href="/classrooms/{{$classroom->id}}">
     {{$classroom->name}}   
</a>
</h2>    
<p>
    school year: {{$classroom->schoolYear}} , Group: {{$classroom->group}}   
</p>    

@endforeach
  
@else
<p>No classes found</p>
@endunless

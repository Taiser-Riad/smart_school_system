<h1>{{$heading}}</h1>
<a href="/">
     <button>Back</button>
</a>
<br>
<br>
@unless (count($teachers) == 0)
@foreach ($teachers as $teacher)
<h2>
<a href="/teachers/{{$teacher->id}}">
     {{$teacher->firstName}} {{$teacher->lastName}}   
</a>
</h2>    
<p>
{{$teacher->id}}
</p>    

@endforeach
  
@else
<p>No teachers found</p>
@endunless
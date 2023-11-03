<h1>{{$heading}}</h1>
<a href="/teachers/create">
     <button>Add new teacher</button>
</a>
@unless (count($teachers) == 0)
@foreach ($teachers as $teacher)
<h2>
<a href="/teachers/{{$teacher->id}}">
     {{$teacher->firstName}} {{$teacher->lastName}}   
</a>
</h2>    
<p>
{{$teacher->about}}
</p>    

@endforeach
  
@else
<p>No teachers found</p>
@endunless

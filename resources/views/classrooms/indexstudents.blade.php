<h1>{{$heading}}</h1>
<a href="/">
     <button>Back</button>
</a>
<br>
<br>
@unless (count($students) == 0)
@foreach ($students as $student)
<h2>
<a href="/students/{{$student->id}}">
     {{$student->firstName}} {{$student->lastName}}   
</a>
</h2>    
<p>
{{$student->id}}
</p>    

@endforeach
  
@else
<p>No students found</p>
@endunless
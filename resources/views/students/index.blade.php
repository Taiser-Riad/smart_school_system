<h1>{{$heading}}</h1>
<a href="/">
    <button>Back</button>
</a>
<br>
<br>
<a href="/students/create">
     <button>Add new student</button>
</a>
@unless (count($students) == 0)
@foreach ($students as $student)
<h2>
<a href="/students/{{$student->id}}">
     {{$student->firstName}} {{$student->lastName}}   
</a>
</h2>    
<h3>{{$student->id}}</h3>
<p>
{{$student->about}}
</p>    

@endforeach
  
@else
<p>No students found</p>
@endunless

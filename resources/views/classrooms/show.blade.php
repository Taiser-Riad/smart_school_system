<?php
$days=explode(';',$classroom->schedule);
?>
<h2>
    {{$classroom->name}}
</h2>  
<a href="/classrooms">
    <button>Back</button>
</a>
<br>
<br>
<a href="/classrooms/{{$classroom->id}}/indexstudents">
    <button>Students of this class</button>
</a>
<br>
<br>
<a href="/classrooms/{{$classroom->id}}/indexteachers">
    <button>Teachers of this class</button>
</a>
<br>
<br>
<a href="/classrooms/{{$classroom->id}}/addteacher">
    <button>Add teacher to this class</button>
</a>
<br>
<br>
<form method="POST" action="/classrooms/{{$classroom->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500">Delete</button>
</form> 
<a href="/classrooms/{{$classroom->id}}/edit">
    <button>Edit class room info</button>
</a>
<h3>id: {{$classroom->id}}</h3>
<br>
<br>
<p>schoolYear: {{$classroom->schoolYear}}</p> 
<br>
<br>
<p>group: {{$classroom->group}}</p> 
<br>
<br>
<table style="border: 1px solid black;">
    <tr>
        <th style="border: 1px solid red;">Day</th>
        <th style="border: 1px solid red;">Period 1</th>
        <th style="border: 1px solid red;">Period 2</th>
        <th style="border: 1px solid red;">Period 3</th>
        <th style="border: 1px solid red;">Period 4</th>
        <th style="border: 1px solid red;">Period 5</th>
        <th style="border: 1px solid red;">Period 6</th>
        <th style="border: 1px solid red;">Period 7</th>
      </tr>
    @foreach ($days as $day)
    <tr style="border: 1px solid red;">
    @php
    $periods=explode(',',$day);
    @endphp

    @foreach ($periods as $period)
        @php
        $period=trim($period,"'");
        @endphp
        <td
        style="border: 1px solid black;">
        {{$period}}
    </td>
    @endforeach
    </tr>
    @endforeach
</table>
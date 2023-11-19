@php
    $back=auth()->user()->role . "Welcome";
@endphp
<h1>{{$heading}}</h1>
<a href="{{$back}}">
     <button>Back</button>
</a>
<br>
<br>
<a href="/managers/create">
     <button>Add new manager</button>
</a>
@unless (count($managers) == 0)
@foreach ($managers as $manager)
<h2>
<a href="/managers/{{$manager->id}}">
     {{$manager->firstName}} {{$manager->lastName}}   
</a>
</h2>    
<p>
{{$manager->about}}
</p>    

@endforeach
  
@else
<p>No managers found</p>
@endunless

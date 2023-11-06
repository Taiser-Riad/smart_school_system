<img
src="{{$teacher->img ? asset('storage/' . $teacher->img) : asset('images/no-image.png')}}"
alt=""
/>
<h2>
    {{$teacher->firstName}} {{$teacher->lastName}}   
</h2>  
<a href="/teachers">
    <button>Back</button>
</a>
<br>
<br>
<form method="POST" action="/teachers/{{$teacher->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500">Delete</button>
</form> 
<a href="/teachers/{{$teacher->id}}/edit">
    <button>Edit teacher info</button>
</a>
<h3>id: {{$teacher->id}}</h3>
<p>gender: {{$teacher->gender}}</p> 
<br>
<br>
<p>age: {{$teacher->age}}</p> 
<br>
<br>
<p>email: {{$teacher->email}}</p> 
<br>
<br>
<p>phone: {{$teacher->phone}}</p> 
<br>
<br>
<p>password: {{$teacher->password}}</p> 
<br>
<br>
<p>salary: {{$teacher->salary}}</p> 
<br>
<br>
<p>created_at: {{$teacher->created_at}}</p> 
<br>
<br>
<p>updated_at: {{$teacher->updated_at}}</p> 
<br>
<br>
<p>
    about: {{$teacher->about}}
</p> 
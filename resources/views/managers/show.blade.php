<img
src="{{$manager->img ? asset('storage/' . $manager->img) : asset('images/no-image.png')}}"
alt=""
/>
<h2>
    {{$manager->firstName}} {{$manager->lastName}}   
</h2>  
<a href="/managers">
    <button>Back</button>
</a>
<br>
<br>
<form method="POST" action="/managers/{{$manager->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500">Delete</button>
</form> 
<a href="/managers/{{$manager->id}}/edit">
    <button>Edit manager info</button>
</a>
<h3>id: {{$manager->id}}</h3>
<p>gender: {{$manager->gender}}</p> 
<br>
<br>
<p>age: {{$manager->age}}</p> 
<br>
<br>
<p>email: {{$manager->email}}</p> 
<br>
<br>
<p>password: {{$manager->password}}</p> 
<br>
<br>
<p>created_at: {{$manager->created_at}}</p> 
<br>
<br>
<p>updated_at: {{$manager->updated_at}}</p> 
<br>
<br> 
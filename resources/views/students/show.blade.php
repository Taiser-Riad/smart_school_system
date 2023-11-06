<img
src="{{$student->img ? asset('storage/' . $student->img) : asset('images/no-image.png')}}"
alt=""
/>
<h2>
    {{$student->firstName}} {{$student->lastName}}   
</h2>  
<a href="/students">
    <button>Back</button>
</a>
<br>
<br>
<form method="POST" action="/students/{{$student->id}}">
    @csrf
    @method('DELETE')
    <button class="text-red-500">Delete</button>
</form> 
<a href="/students/{{$student->id}}/edit">
    <button>Edit student info</button>
</a>
<h3>id: {{$student->id}}</h3>
<p>gender: {{$student->gender}}</p> 
<br>
<br>
<p>father's name': {{$student->fatherName}}</p> 
<br>
<br>
<p>mother's name: {{$student->motherFirstName}}  {{$student->motherLastName}}</p> 
<br>
<br>
<p>father's phone: {{$student->fatherPhone}}</p> 
<br>
<br>
<p>mother's phone: {{$student->motherPhone}}</p> 
<br>
<br>
<p>birth day: {{$student->dateOfBirth}}</p> 
<br>
<br>
<p>age: {{$student->age}}</p> 
<br>
<br>
<p>email: {{$student->email}}</p> 
<br>
<br>

<p>password: {{$student->password}}</p> 
<br>
<br>
<p>school year: {{$student->schoolYear}}</p> 
<br>
<br>
<p>group: {{$student->group}}</p> 
<br>
<br>
<p>created_at: {{$student->created_at}}</p> 
<br>
<br>
<p>updated_at: {{$student->updated_at}}</p> 
<br>
<br>
<p>
    about: {{$student->about}}
</p> 
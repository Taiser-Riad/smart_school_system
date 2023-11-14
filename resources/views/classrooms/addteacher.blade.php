<h1>{{$classroom->name}}</h1>
<form method="POST" action="/classrooms/{{$classroom->id}}" enctype="multipart/form-data">
    @csrf
    <h3>Please choose a teacher to add</h3>
    <select name="teacher" id="teacher">
        @foreach ($teachers as $teacher)
            <option value="{{$teacher->id}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
        @endforeach
    </select>
    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Add class room
        </button>

        <a href="/classrooms/{{$classroom->id}}" class="text-black ml-4"> Back </a>
    </div>
</form>
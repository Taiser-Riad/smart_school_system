<script>
    function passwordVisiblity() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }

    }
    function passwordConfirmationVisibility(){
        var x = document.getElementById("password_confirmation");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
<h1>Edit teacher info</h1>
<form method="POST" action="/teachers/{{$teacher->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label
            for="firstName"
            class="inline-block text-lg mb-2"
            >First Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="firstName"
            value="{{$teacher->firstName}}"
        />
        @error('firstName')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="lastName"
            class="inline-block text-lg mb-2"
            >Last Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="lastName"
            value="{{$teacher->lastName}}"
        />
        @error('lastName')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <label
    for="gender"
    class="inline-block text-lg mb-2"
    >Gender </label
    >
    <div id="gender"class="mb-6">
        <input
            type="radio"
            name="gender"
            id="male"
            value="male" {{ ($teacher->gender == 'male') ? 'checked' : ''}}
        />
        <label
        for="male"
        class="inline-block text-lg mb-2"
        >Male</label
        >
        <input
        type="radio"
        name="gender"
        id="female"
        value="female" {{ ($teacher->gender == 'female') ? 'checked' : ''}}
        />
        <label
        for="female"
        class="inline-block text-lg mb-2"
        >Female</label
        >
        @error('gender')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>




    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
            value="{{$teacher->email}}"
        />
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

<!--    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2"
        >
            Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
            value="{{old('password')}}"
            id="password"
        />
        <input type="checkbox" onclick="passwordVisiblity()">Show Password
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="password_confirmation"
            class="inline-block text-lg mb-2"
        >
            Confirm Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password_confirmation"
            value="{{old('password_confirmation')}}"
            id="password_confirmation"
        />
        <input type="checkbox" onclick="passwordConfirmationVisibility()">Show Password Confirmation
        @error('npassword_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
-->
    <div class="mb-6">
        <label for="img" class="inline-block text-lg mb-2">
            Teacher's image
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="img"
            value={{$teacher->img}}
        />
        @error('img')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <img
    src="{{$teacher->img ? asset('storage/' . $teacher->img) : asset('images/no-image.png')}}"
    alt=""
    />
    <div class="mb-6">
        <label
            for="salary"
            class="inline-block text-lg mb-2"
            >Salary</label
        >
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="salary"
            value="{{$teacher->salary}}"
        />
        @error('salary')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="age"
            class="inline-block text-lg mb-2"
            >Age</label
        >
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="age"
            value="{{$teacher->age}}"
            min="18"
        />
        @error('age')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="phone"
            class="inline-block text-lg mb-2"
            >Phone</label
        >
        <input
            type="tel"
            class="border border-gray-200 rounded p-2 w-full"
            name="phone"
            value="{{$teacher->phone}}"
        />
        @error('phone')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="about"
            class="inline-block text-lg mb-2"
        >
            About
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="about"
            rows="10"
            placeholder="Include tasks, requirements, salary, etc"
        >{{$teacher->about}}</textarea>
        @error('about')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Edit info
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
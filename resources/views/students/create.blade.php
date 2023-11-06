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
<h1>Add a new student</h1>
<form method="POST" action="/students" enctype="multipart/form-data">
    @csrf
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
            value="{{old('firstName')}}"
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
            value="{{old('lastName')}}"
        />
        @error('lastName')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="fatherName"
            class="inline-block text-lg mb-2"
            >Father's Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="fatherName"
            value="{{old('fatherName')}}"
        />
        @error('fatherName')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label
            for="motherFirstName"
            class="inline-block text-lg mb-2"
            >Mother's First Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="motherFirstName"
            value="{{old('motherFirstName')}}"
        />
        @error('motherFirstName')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label
            for="motherLastName"
            class="inline-block text-lg mb-2"
            >Mother Last Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="motherLastName"
            value="{{old('motherLastName')}}"
        />
        @error('motherLastName')
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
            value="male" {{ (old('gender') == 'male') ? 'checked' : ''}}
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
        value="female" {{ (old('gender') == 'female') ? 'checked' : ''}}
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
            value="{{old('email')}}"
        />
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
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
        @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="img" class="inline-block text-lg mb-2">
            student's image
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="img"
        />
        @error('img')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="dateOfBirth"
            class="inline-block text-lg mb-2"
            >Date of Birth:</label
        >
        <input
            type="date"
            class="border border-gray-200 rounded p-2 w-full"
            name="dateOfBirth"
            value="{{old('dateOfBirth')}}"
        />
        @error('dateOfBirth')
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
            value="{{old('age')}}"
        />
        @error('age')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="schoolYear"
            class="inline-block text-lg mb-2"
            >School Year:</label
        >
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="schoolYear"
            value="{{old('schoolYear')}}"
            min="1"
            max="4"
        />
        @error('schoolYear')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="group"
            class="inline-block text-lg mb-2"
            >Group:</label
        >
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="group"
            value="{{old('group')}}"
            min="1"
        />
        @error('group')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="fatherPhone"
            class="inline-block text-lg mb-2"
            >Father's Phone</label
        >
        <input
            type="tel"
            class="border border-gray-200 rounded p-2 w-full"
            name="fatherPhone"
            value="{{old('fatherPhone')}}"
        />
        @error('fatherPhone')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="motherPhone"
            class="inline-block text-lg mb-2"
            >Mother's Phone</label
        >
        <input
            type="tel"
            class="border border-gray-200 rounded p-2 w-full"
            name="motherPhone"
            value="{{old('motherPhone')}}"
        />
        @error('motherPhone')
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
        >{{old('about')}}</textarea>
        @error('about')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Add student
        </button>

        <a href="/students" class="text-black ml-4"> Back </a>
    </div>
</form>
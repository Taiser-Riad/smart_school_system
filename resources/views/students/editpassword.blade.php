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
<h2>Change Student password</h2>
<form method="POST" action="/students/{{$student->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Edit password
        </button>

        <a href="/students/{{$student->id}}" class="text-black ml-4"> Back </a>
    </div>
</form>
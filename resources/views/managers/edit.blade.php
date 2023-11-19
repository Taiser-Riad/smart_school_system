<a href="/managers/{{$manager->id}}/editpassword">
    <button>Change manager password</button>
</a>
<h1>Edit managers info</h1>
<form method="POST" action="/managers/{{$manager->id}}" enctype="multipart/form-data">
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
            value="{{$manager->firstName}}"
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
            value="{{$manager->lastName}}"
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
            value="male" {{ ($manager->gender == 'male') ? 'checked' : ''}}
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
        value="female" {{ ($manager->gender == 'female') ? 'checked' : ''}}
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
            value="{{$manager->email}}"
        />
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="img" class="inline-block text-lg mb-2">
            Manager's image
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="img"
            value={{$manager->img}}
        />
        @error('img')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <img
    src="{{$manager->img ? asset('storage/' . $manager->img) : asset('images/no-image.png')}}"
    alt=""
    />

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
            value="{{$manager->age}}"
            min="18"
        />
        @error('age')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Edit info
        </button>

        <a href="/managers/{{$manager->id}}" class="text-black ml-4"> Back </a>
    </div>
</form>

<?php
$days=explode(',',"Sunday,Monday,Tuesday,Wednesday,Thursday");
$periods=[1,2,3,4,5,6,7];
?>
<h2>
<h1>Add a new class room</h1>
<form method="POST" action="/classrooms" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label
            for="name"
            class="inline-block text-lg mb-2"
            >Name</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
            value="{{old('name')}}"
        />
        @error('name')
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
                    <td
                    style="border: 1px solid black;">
                    {{$day}}
                </td>
    
        @foreach ($periods as $period)
        <?php
        $na=$day.$period;
        ?>
        <td><select name="{{$na}}" id="schedule">
            <option value="...">...</option>
            <option value="Mathematics">Mathematics</option>
            <option value="English">English </option>
            <option value="Science">Science</option>
            <option value="French">French</option>
            <option value="Arabic">Arabic</option>
            <option value="Art">Art</option>
            <option value="Music">Music</option>
            <option value="Religion">Religion</option>
            <option value="Social Studies">Social Studies</option>
            <option value="Sport">Sport</option>
          </select>
        </td>
        @endforeach
        </tr>
        @endforeach
    </table>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Add class room
        </button>

        <a href="/classrooms" class="text-black ml-4"> Back </a>
    </div>
</form>
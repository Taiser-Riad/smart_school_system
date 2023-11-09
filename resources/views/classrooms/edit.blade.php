
@php
$dayNames=explode(',',"Sunday,Monday,Tuesday,Wednesday,Thursday");
$days=explode(';',$classroom->schedule);
@endphp
<h1>Edit class room info</h1>
<form method="POST" action="/classrooms/{{$classroom->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
            value="{{$classroom->name}}"
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
            value="{{$classroom->schoolYear}}"
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
            value="{{$classroom->group}}"
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
        @for ($i = 0 ; $i<5 ; $i++ )
        @php
            $day=$days[$i];     
            $day=explode(',',$day); 
            array_shift($day);
        @endphp
        <tr style="border: 1px solid red;">
                    <td
                    style="border: 1px solid black;">
                    {{$dayNames[$i]}}
                </td>
    
        @for ($j = 0 ; $j<7 ; $j++)
        <?php
        $x=$j+1;
        $na=$dayNames[$i].$x;
        $item=$day[$j];
        $item=trim($item,"'");
        ?>
        <td><select name="{{$na}}" id="schedule">
            <option value="..." {{($item=='...') ? 'selected':''}}>...</option>
            <option value="Mathematics" {{($item=='Mathematics') ? 'selected':''}}>Mathematics</option>
            <option value="English" {{($item=='English') ? 'selected':''}}>English </option>
            <option value="Science" {{($item=='Science') ? 'selected':''}}>Science</option>
            <option value="French" {{($item=='French') ? 'selected':''}}>French</option>
            <option value="Arabic" {{($item=='Arabic') ? 'selected':''}}>Arabic</option>
            <option value="Art" {{($item=='Art') ? 'selected':''}}>Art</option>
            <option value="Music" {{($item=='Music') ? 'selected':''}}>Music</option>
            <option value="Religion" {{($item=='Religion') ? 'selected':''}}>Religion</option>
            <option value="Social Studies" {{($item=='Social Studies') ? 'selected':''}}>Social Studies</option>
            <option value="Sport" {{($item=='Sport') ? 'selected':''}}>Sport</option>
          </select>
        </td>
        @endfor
        </tr>
        @endfor
    </table>



    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Edit class room
        </button>

        <a href="/classrooms/{{$classroom->id}}" class="text-black ml-4"> Back </a>
    </div>
</form>
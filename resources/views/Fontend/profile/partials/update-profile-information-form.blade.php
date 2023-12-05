<section>
    @include('note')

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @method('PATCH')
        @csrf

        <!-- Tên -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" value="{{ $data->name }}" equired autofocus
                class="w-full p-3 border border-gray-300 rounded">
                @error('name')
                <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                    <span class="font-medium">{{ $message }}</span> 
                  </div>
                @enderror
        </div>
  <!-- Tên -->
  <div class="mb-4">
    <label for="other_name" class="block text-gray-700 font-bold mb-2">Other name</label>
    <input type="text" id="other_name" name="other_name" value="{{ $data->other_name }}" equired autofocus
        class="w-full p-3 border border-gray-300 rounded">
        @error('other_name')
        <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
            <span class="font-medium">{{ $message }}</span> 
          </div>
        @enderror
</div>
        <!-- Avatar -->
        <div class="mb-4 ">
            <label for="avatar" class="block text-gray-700 font-bold mb-2 mr-4">Avatar</label>
            <div class="flex items-center">

                <!-- Hình ảnh -->
                <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden mr-2">
                    <img src="{{ $data->avatar }}" alt="Avatar" id="avatar" name="avatar" class="w-full h-full object-cover">
                </div>

                <!-- Nút chọn tệp bên phải -->
                <input class="w-18 p-2 text-xs text-gray-900 border border-gray-300  cursor-pointer " name="avatar"
                    type="file" accept="image/*" id="avatarUpload" onchange="loadFile(this)">

            </div>
            @error('avatar')
            <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <span class="font-medium">{{ $message }}</span> 
              </div>
            @enderror
        </div>

        <!-- Giới thiệu -->
        <div class="mb-4">
            <label for="about" class="block text-gray-700 font-bold mb-2">Profile Information</label>
            <textarea id="about" name="about" class="w-full p-3 border border-gray-300 rounded">{{ $data->about }}</textarea>
            @error('about')
            <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <span class="font-medium">{{ $message }}</span> 
              </div>
            @enderror
        </div>

        <!-- Giới tính -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Gender</label>
            <div class="flex items-center">
                <label class="mr-4 flex items-center">
                    <input type="radio" id="gender_male" name="gender" value="male"
                        {{ $data->gender === 'male' ? 'checked' : '' }}>
                    <span class="ml-2">Male</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" id="gender_female" name="gender" value="female"
                        {{ $data->gender === 'female' ? 'checked' : '' }}>
                    <span class="ml-2">Female</span>
                </label>
            </div>
        </div>

        <!-- Ngày sinh -->
        <div class="mb-4">
            <label for="birthdate" class="block text-gray-700 font-bold mb-2">Birthday</label>
            <input type="date" id="birthdate" name="birthdate" value="{{ $data->birthdate }}"
                class="w-full p-3 border border-gray-300 rounded">
        </div>
        @error('birthdate')
            <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <span class="font-medium">{{ $message }}</span> 
              </div>
            @enderror
        <!-- Địa chỉ -->
       
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
            <input type="text" id="address" name="address" value="{{ $data->address }}"
                class="w-full p-3 border border-gray-300 rounded">
        </div>
        
        <!-- sdt -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ $data->phone }}"
                class="w-full p-3 border border-gray-300 rounded">
            @error('phone')
            <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <span class="font-medium">{{ $message }}</span> 
              </div>
            @enderror
        </div>
        {{-- city --}}
        <div class="mb-4 flex justify-between items-center">
            <div class="w-1/2 h-10">
                <select name="city_id" id="city_id" >
                    <option value="" disabled selected hidden>Thành phố</option>
                    @foreach ($dataCity as $item)
                        <option value="{{ $item->id }}" @if($item->id == $data->city_id) {{'selected'}} @endif>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w-1/2 h-10">
                <select name="district_id" id="district_id">
                    <option value="select" disabled selected hidden>Quận/Huyện</option>
                    @if($data->district_id != null)
                        <option value="{{$data->district_id}}" selected>{{$data->District->name}}</option>
                    @endif
                </select>
            </div>
          
        </div>
        <div class="flex items-center gap-4">
            <button type="submit"
                class=" text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                Save</button>
        </div>
    </form>

</section>

<script>
    //Preview an image before it is uploaded
 function loadFile(file){
    if(file && file.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#avatar').attr('src', e.target.result)
        }
        reader.readAsDataURL(file.files[0]);
    }
 }

 </script>


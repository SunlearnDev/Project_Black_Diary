<section>
    @include('note')

    <form method="post" action="{{route('profile.update')}}"
        enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @method('PATCH')
        @csrf
       
         <!-- Tên -->
         <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Tên</label>
            <input type="text" id="name" name="name" value="{{ $data->name }}" equired autofocus class="w-full p-3 border border-gray-300 rounded">
            @error('name')
                <span class="text-danger">{{$message}}</span>
                
            @enderror
        </div>

        <!-- Avatar -->
        <div class="mb-4 ">
            <label for="avatar" class="block text-gray-700 font-bold mb-2 mr-4">Avatar</label>
            <div class="flex items-center" >

            <!-- Hình ảnh -->
            <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden mr-2">
                <img src="{{ $data->avatar }}" alt="Avatar" name="avatar" class="w-full h-full object-cover">
            </div>  
        
            <!-- Nút chọn tệp bên phải -->
            <input class="w-18 p-2 text-xs text-gray-900 border border-gray-300  cursor-pointer " name="avatar" type="file">
        
            </div>
              @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <!-- Giới thiệu -->
        <div class="mb-4">
            <label for="about" class="block text-gray-700 font-bold mb-2">Giới thiệu</label>
            <textarea id="about" name="about" class="w-full p-3 border border-gray-300 rounded">{{ $data->about }}</textarea>
        </div>

        <!-- Giới tính -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Giới tính</label>
            <div class="flex items-center">
                <label class="mr-4 flex items-center">
                    <input type="radio" id="gender_male" name="gender" value="male" {{ $data->gender === 'male' ? 'checked' : '' }}>
                    <span class="ml-2">Nam</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" id="gender_female" name="gender" value="female" {{ $data->gender === 'female' ? 'checked' : '' }}>
                    <span class="ml-2">Nữ</span>
                </label>
            </div>
        </div>

        <!-- Ngày sinh -->
        <div class="mb-4">
            <label for="birthdate" class="block text-gray-700 font-bold mb-2">Ngày sinh</label>
            <input type="date" id="birthdate" name="birthdate" value="{{ $data->birthdate }}" class="w-full p-3 border border-gray-300 rounded">
        </div>

        <!-- Địa chỉ -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Địa chỉ</label>
            <input type="text" id="address" name="address" value="{{ $data->address }}" class="w-full p-3 border border-gray-300 rounded">
        </div>
        
        <div class="flex items-center gap-4">
            <button type="submit"
            class=" text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"b>
            Lưu</button>
        </div>
    </form>

</section>

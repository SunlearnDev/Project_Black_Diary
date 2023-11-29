@extends('welcome')
 @section('content')
        <div class=" mx-auto sm:px-6 lg:px-8 space-y-6 mt-[20px] py-10">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('Fontend.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('Fontend.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    @include('Fontend.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
@endsection

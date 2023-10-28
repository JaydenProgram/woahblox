@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" method="POST" action="{{ route('account.update', $user) }}">
        @csrf
        @method('PUT') <!-- Add this line to indicate it's an update request -->
        <div class="flex justify-center mt-10">
            <div class="bg-gray-200 w-3/12 h-4/6 flex flex-col ">
                <div class="self-center flex flex-col">
                    <h1 class="text-3xl font-bold mt-4">Edit your user</h1>
                    <input type="text" id="name" name="name" placeholder="Name" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $user->name }}">


                    <input type="text" id="email" name="email" placeholder="Email" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $user->email }}">
                    <img class="rounded-full w-20" src="{{asset('profile_pictures/' .$user->profile_picture)}}" alt="Current Image">
                    <input type="file" id="email" name="profile_picture" placeholder="{{$user->profile_picture}}" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $user->profile_picture }}">
                        <button type="submit" class="px-4 py-2 rounded-md bg-white w-fit mt-2">Update</button>
                    </div>
                </div>
            </div>


    </form>
@endsection

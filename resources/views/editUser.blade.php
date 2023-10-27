@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('account.update') }}">
        @csrf
        @method('PUT') <!-- Add this line to indicate it's an update request -->
        <div class="flex justify-center mt-10">
            <div class="bg-gray-200 w-3/12 h-4/6 flex flex-col ">
                <div class="self-center flex flex-col">
                    <h1 class="text-3xl font-bold mt-4">Edit your user</h1>
                    <input type="text" id="name" name="name" placeholder="Name" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $user->name }}">


                    <input type="text" id="email" name="email" placeholder="Email" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $user->email }}">

                        <button type="submit" class="px-4 py-2 rounded-md bg-white w-fit mt-2">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

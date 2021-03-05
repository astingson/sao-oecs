@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf 
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name of student"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email of student"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <select x-cloak id="org" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('org') border-red-500 @enderror">/
                    @foreach($orgs as $org)
                        <option value="{{ $org->id }}">{{ $org->org_name }}</option>
                    @endforeach
                </select>
                <div x-data="dropdown()" x-init="loadOptions()" class="mb-4">
                    <input name="org" type="hidden" x-bind:value="selectedValues()">
                        <div class="relative w-full cursor-pointer">
                            <div class="relative mb-6 md:mb-0">
                                <div x-on:click="open" class="w-full">
                                    <div class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                                        <div class="flex flex-auto flex-wrap">
                                            <template x-for="(option,index) in selected" :key="options[option].value">
                                                <div class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-green-100 rounded bg-green-100 border">
                                                    <div class="text-base font-normal leading-none max-w-full flex-initial x-model=" options[option] x-text="options[option].text">
                                                    </div>
                                                    <div class="flex flex-auto flex-row-reverse">
                                                        <div x-on:click.stop="remove(index,option)">
                                                            <svg class="fill-current h-4 w-4 " role="button" viewBox="0 0 20 20">
                                                                <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>

                                            <div x-show="selected.length == 0" class="flex-1">
                                                <input readonly placeholder="Select organization/s" class="bg-transparent appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()">
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="w-full px-4">
                                <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select" x-on:click.away="close">
                                    <div class="flex flex-col w-full overflow-y-auto h-64">
                                        <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100" @click="select(index,$event)">
                                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                    <div class="w-full items-center flex justify-between">
                                                        <div class="mx-2 leading-6" x-model="option" x-text="option.text">
                                                        </div>
                                                        <div x-show="option.selected">
                                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                                <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                                    C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                                    L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="relative mb-6 md:mb-0">
                        <select name="role" id="role" class="bg-gray-100 border-2 w-full p-4 rounded-lg ">
                            <option value="1">Student</option>
                            <option value="2">SAO</option>
                            <option value="3">Finance</option>
                            <option value="4">Adviser</option>
                            <option value="5">Academic Services</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">
                
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
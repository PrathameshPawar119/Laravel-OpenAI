@extends('layouts.main')
@section('main-section')

    @push('title')
        <title>About</title>
    @endpush

    <div class="relative py-16 bg-white overflow-hidden mx-6">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Festival India</span>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Laravel + OpenAI</span>
                </h1>
                <p class="mt-8 text-xl text-gray-500 leading-8">This project aims to implement OpenAI APIs through Laravel Framework concepts.</p>
                </div>
            </div>
            <div class="relative sm:px-2 lg:px-2">
                <div class="text-lg max-w-prose mx-auto">
                    <h1>
                        <span class="mt-2 block text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Implementation</span>
                    </h1>
                    <p class="mt-8 text-xl text-gray-500 leading-8">We will implement OpenAI apis with laravel.</p>
                </div>
                <div class="text-lg max-w-prose mx-auto">
                    <h3>
                        <span class="mt-2 block text-lg leading-8 tracking-tight text-gray-900 sm:text-3xl">Requirements & setup</span>
                    </h3>
                    <p class=" text-xl text-gray-500 leading-8">
                        <ul>
                            <li>Composer v2 installed</li>
                            <li>Xampp server installed</li>
                            <li>SignUp/login on OpenAI</li>
                        </ul>
                    </p>
                </div>
                <div class="text-lg max-w-prose mx-auto">
                    {{-- <h3>
                        <span class="mt-2 block text-lg leading-8 tracking-tight text-gray-900 sm:text-3xl">Requirements & setup</span>
                    </h3>
                    <p class=" text-xl text-gray-500 leading-8">
                        <ul>
                            <li>Composer v2 installed</li>
                            <li>Xampp server installed</li>
                        </ul>
                    </p> --}}
                </div>
            </div>
    </div>



@endsection
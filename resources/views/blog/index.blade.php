@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
    <div class="bg-red-900 text-center py-4 lg:px-4">
        <div class="p-2 bg-red-400 items-center text-red-900 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Information</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ session()->get('message') }}</span>
        </div>
    </div>
    @endif

    <div class="container m-auto text-center pt-15 pb-5">
        <h1 class="text-5xl font-bold">All Posts</h1>
    </div>

    @if (Auth::check())
        <div class="container sm:grid mx-auto p-5 border-b border-gray-300">
            <a href="blog/create" class="bg-green-700 text-green-200 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start hover:bg-green-400 hover:text-green-900 transition duration-300">
                add a new post
            </a>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="container sm:grid grid-cols-2 gap-10 mx-auto py-15 px-5 border-b border-gray-300">
            <div class="flex">
                <img class="object-cover sm:rounded-sm" src="{{ $post->image_path }}" alt="{{ $post->title }}" width="620" height="960" />
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-4xl py-5 md:pt-0" >{{ $post->title }}</h2>
                <div>
                    <p class="text-sm">
                        By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
                        on  <span class="text-gray-500 italic">{{ date('d.m.Y', strtotime($post->updated_at)) }}</span>
                    </p>
                </div>
                <p class="text-l text-gray-700 leading-6 py-8">{{ substr($post->description, 0, 450) }}...</p>

                <a href="blog/{{ $post->slug }}" class="bg-gray-700 text-gray-200 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start hover:bg-gray-400 hover:text-gray-900 transition duration-300">Read More</a>
            </div>
        </div>
    @endforeach

@endsection

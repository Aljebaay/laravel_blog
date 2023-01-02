@extends('layouts.app')

@section('content')

    @if (session()->has('message'))
        <div class="bg-green-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-green-400 items-center text-green-900 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Information</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session()->get('message') }}</span>
            </div>
        </div>
    @endif

    <div class="container m-auto text-center pt-15 pb-5">
        <h1 class="text-5xl font-bold uppercase">{{ $post->title }}</h1>
        <div>
            <p class="text-sm mt-4">
                By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
                on  <span class="text-gray-500 italic">{{ date('d.m.Y', strtotime($post->updated_at)) }}</span>
            </p>
        </div>
    </div>

    <div class="container m-auto pt-15 pb-5">
        <div class="flex h-96">
            <img class="object-cover sm:rounded-sm w-full" src="{{ $post->image_path }}" alt="{{ $post->title }}" />
        </div>

        <div>
            <p class="text-l text-gray-700 leading-6 py-8">{{ $post->description }}</p>
        </div>

        @if (Auth::user() && Auth::user()->id == $post->user_id)
            <a  href="{{ $post->slug }}/edit"
                class=" py-4 px-5 mt-6 inline-block rounded-lg font-bold
                        uppercase text-l place-self-start
                        bg-green-700 text-green-200
                        hover:bg-green-400 hover:text-green-900
                        transition duration-300"
            >edit post</a>

            <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class=" py-4 px-5 mt-6 inline-block rounded-lg font-bold
                            uppercase text-l place-self-start
                            bg-red-700 text-red-200
                            hover:bg-red-400 hover:text-red-900
                            transition duration-300"
                >delete post</button>
            </form>
        @endif
    </div>

@endsection

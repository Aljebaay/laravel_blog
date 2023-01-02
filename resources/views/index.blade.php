@extends('layouts.app')

@section('content')

    <!-- HERO -->
    <div class="hero-bg-image flex flex-col items-center justify-center">
        <h1 class="text-gray-200 text-5xl uppercase font-bold p-10 text-center">Welcome to Laravel Blog</h1>
        <a href="/blog" class="bg-gray-200 text-gray-700 py-4 px-5 rounded-lg font-bold uppercase text-xl hover:bg-gray-400 hover:text-gray-900 transition duration-300">Start Reading</a>
    </div>

    <!-- first block -->
    <div class="container sm:grid grid-cols-2 gap-10 mx-auto py-10">
        <div class="mx-2 md:mx-0">
            <img class="sm:rounded-lg" src="{{ $post->image_path }}" alt="image" width="620" height="960" />
        </div>

        <div class="flex flex-col items-left justify-center m-10 sm:m-0">
            <h2 class="font-bold text-gray-700 text-3xl uppercase ">{{ $post->title }}</h2>
            <div>
                <p class="text-sm">
                    By: <span class="text-gray-500 italic">{{ $post->user->name }}</span>
                    on  <span class="text-gray-500 italic">{{ date('d.m.Y', strtotime($post->updated_at)) }}</span>
                </p>
            </div>
            <p class="py-4 text-gray-500 text-sm leading-6">{{ substr($post->description, 0, 450) }}...</p>
            <a href="blog/{{ $post->slug }}" class="bg-gray-700 text-gray-200 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start hover:bg-gray-400 hover:text-gray-900 transition duration-300">Read More</a>
        </div>
    </div>

    <!-- Blog Categories -->
    <div class="text-center p-15 bg-gray-700 text-gray-200">
        <h2 class="text-2xl">Blog Categories</h2>
        <div class="container mx-auto pt-10 sm:grid grid-cols-4 ">
            <div class="font-bold text-2xl py-2">UX Design</div>
            <div class="font-bold text-2xl py-2">Programming</div>
            <div class="font-bold text-2xl py-2">Graphic Design</div>
            <div class="font-bold text-2xl py-2">Front-End</div>
        </div>
    </div>

    <!-- recent posts -->
    <div class="container mx-auto text-center py-10">
        <h2 class="font-bold text-5xl py-10 text-gray-700">Recent Posts</h2>
        <p class="text-gray-500 leading-6 px-10">audantium quas esse temporibus consequatur, perferendis sunt cum illum veniam, rerum sequi tempore recusandae et quam vero molestiae! Itaque, alias blanditiis!</p>
    </div>

    <!-- last block -->
    <div class="sm:grid grid-cols-2 w-4/5 mx-auto">
        <div class="flex bg-yellow-700 text-gray-200 pt-10">
            <div class="block m-auto pt-4 pb-15 w-4/5">

                <ul class="md:flex text-xs gap-2 font-bold">
                    <a href="/"><li class="bg-yellow-100 text-yellow-800 p-2 rounded inline-block my-1 md:my-0 hover:text-yellow-100 hover:bg-yellow-500 transition duration-300">PHP</li></a>
                    <a href="/"><li class="bg-yellow-100 text-yellow-800 p-2 rounded inline-block my-1 md:my-0 hover:text-yellow-100 hover:bg-yellow-500 transition duration-300">MySQL</li></a>
                    <a href="/"><li class="bg-yellow-100 text-yellow-800 p-2 rounded inline-block my-1 md:my-0 hover:text-yellow-100 hover:bg-yellow-500 transition duration-300">JavaScript</li></a>
                    <a href="/"><li class="bg-yellow-100 text-yellow-800 p-2 rounded inline-block my-1 md:my-0 hover:text-yellow-100 hover:bg-yellow-500 transition duration-300">Laravel</li></a>
                </ul>

                <h3 class="text-l py-10 leading-6 text-gray-200">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed adipisci magni totam illum, repellendus fugiat consequuntur veniam eius omnis fugit velit dolores voluptates aliquid sunt amet architecto distinctio? Et, aperiam.
                </h3>

                <a href="/" class="bg-transparent border-2 border-yellow-100 text-yellow-100 py-4 px-5 rounded-lg font-bold uppercase text-l inline-block hover:bg-yellow-100 hover:text-yellow-800 transition duration-300">Read More</a>
            </div>
        </div>
        <div class="flex">
            <img class="object-cover" src="https://picsum.photos/id/242/960/620" alt="image" width="620" height="960" />
        </div>
    </div>

@endsection

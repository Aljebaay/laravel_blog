@extends('layouts.app')

@section('content')

    <div class="container m-auto text-center pt-15 pb-5">
        <h1 class="text-5xl font-bold uppercase">edit the post</h1>
    </div>

    <div class="container m-auto pt-15 pb-5">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Title"
                    class="w-full h-15 text-4xl rounded-lg border-b p-5 mb-5 shadow-xl border border-gray-300"
                    value="{{ $post->title }}">
                @error('title')
                <div class="form-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <textarea
                    name="description"
                    id="description"
                    cols="30"
                    rows="10"
                    placeholder="Description"
                    class="w-full h-45 text-xl rounded-lg border-b p-5 mb-5 shadow-xl border border-gray-300"
                    >{{ $post->description }}</textarea>
                @error('description')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <div class="py-10">
                    <label
                        class="
                            bg-gray-700 hover:bg-gray-400
                            text-gray-200 hover:text-gray-900
                            transition duration-300
                            cursor-pointer p-5 rounded-lg
                            font-bold uppercase shadow-xl
                            ">

                        <span>Select an image to upload</span>
                        <input
                        type="file"
                        name="image"
                        id="image"
                        class="hidden">
                    </label>
                </div>
                @error('image')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button
                type="submit"
                class="
                    bg-green-700 hover:bg-green-400
                    text-green-200 hover:text-green-900
                    transition duration-300
                    cursor-pointer p-5 rounded-lg
                    font-bold uppercase shadow-2xl">
            Save</button>
        </form>
    </div>

@endsection

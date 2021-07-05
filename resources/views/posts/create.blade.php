<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/posts">
                        @csrf

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="title">
                                Title
                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   type="text"
                                   name="title"
                                   id="title"
                                   required
                            >

                            @error('title')
                                <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
                            @enderror

                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="body">
                                Body
                            </label>

                            <textarea class="border border-gray-400 p-2 w-full"
                                   type="text"
                                   name="body"
                                   id="body"
                                   required
                            ></textarea>

                            @error('title')
                            <p class="text-red-500 text-xs mt-2"> {{$message}} </p>
                            @enderror

                        </div>

                        <div class="mb-6" style="display: none">
                            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="my_name">
                                My Name
                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   type="text"
                                   name="my_name"
                                   id="my_name"
                                   required
                            >
                        </div>

                        <div class="mb-6" style="display: none">
                            <label class="block mb-2 uppercase font-bold text-cs text-gray-700" for="my_time">
                                My Time
                            </label>

                            <input class="border border-gray-400 p-2 w-full"
                                   type="text"
                                   name="my_time"
                                   id="my_time"
                                   value="{{ microtime(true) }}"
                                   required
                            >
                        </div>

                        <div class="mb-6">
                            <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                                Publish
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

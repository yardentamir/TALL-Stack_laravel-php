<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Post CRUD') }}
        </h2>
    </x-slot>

    <x-blast-demo.button style-type="primary">
        btn component
    </x-blast-demo.button>

    <div class="w-4/5 mx-auto">
        <div class="pt-20 text-center">
            <h1 class="text-3xl text-gray-700">
                All Articles
            </h1>
            <hr class="mt-10 border border-gray-300 border-1">
        </div>

        <div class="py-10 sm:py-20">
            <a class="inline px-4 py-4 text-base transition-all bg-green-500 rounded-full shadow-xl primary-btn sm:text-xl hover:bg-green-400"
                href="{{ route('post.create') }}">
                New Article
            </a>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="w-4/5 pb-10 mx-auto">
            <div class="pt-10 pb-10 bg-white rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 sm:pb-0">
                <div class="w-11/12 pb-10 mx-auto">
                    <h2 class="pt-6 pb-0 text-2xl font-bold text-gray-900 transition-all sm:pt-0 hover:text-gray-700">
                        <a href="{{ route('post.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="w-full py-8 text-lg text-gray-900 break-words">
                        {{ $post->excerpt }}
                    </p>

                    <img src="{{ $post->image_path }}" alt="image for {{ $post->title }}" />

                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>

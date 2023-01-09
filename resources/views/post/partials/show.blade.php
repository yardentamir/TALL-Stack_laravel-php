<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
                class="py-20 pb-3 italic text-green-500 transition-all border-green-400 hover:text-green-400 hover:border-b-2">
                < Back to previous page </a>
        </div>

        <h4 class="py-10 text-2xl font-bold text-left text-gray-900 sm:text-center sm:text-4xl md:text-5xl sm:py-20">
            {{ $post->title }}
        </h4>


        <div class="pt-10 pb-10 text-xl text-gray-900">
            <p class="pt-10 text-2xl font-bold text-black">
                {{ $post->excerpt }}
            </p>

            <p class="pt-10 text-base text-black">
                {{ $post->body }}
            </p>
        </div>
    </div>
</x-app-layout>

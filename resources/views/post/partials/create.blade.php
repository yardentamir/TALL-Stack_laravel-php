<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="pt-8 text-center">
            <h1 class="text-3xl text-gray-700">
                Add new post
            </h1>
            <hr class="mt-10 border border-gray-300 border-1">
        </div>

        <div class="pt-8 m-auto">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="is_published" class="text-2xl text-gray-500">
                    Is Published
                </label>
                <input type="checkbox" class="block inline text-2xl bg-transparent border-b-2 outline-none"
                    name="is_published" />

                <input type="text" name="title" placeholder="Title..."
                    class="block w-full h-20 text-2xl bg-transparent border-b-2 outline-none" />

                <input type="text" name="excerpt" placeholder="Excerpt..."
                    class="block w-full h-20 text-2xl bg-transparent border-b-2 outline-none" />

                <input type="number" name="min_to_read" placeholder="Minutes to read..."
                    class="block w-full h-20 text-2xl bg-transparent border-b-2 outline-none" />

                <textarea name="body" placeholder="Body..."
                    class="block w-full py-20 text-xl bg-transparent border-b-2 outline-none h-60"></textarea>

                <div class="py-10 bg-grey-lighter">
                    <label
                        class="flex flex-col items-center px-2 py-3 tracking-wide uppercase border shadow-lg cursor-pointer w-44 bg-white-rounded-lg border-blue">
                        <span class="mt-2 text-base leading-normal">
                            Select a file
                        </span>
                        <input type="file" name="image" class="hidden" />
                    </label>
                </div>

                <button type="submit"
                    class="px-8 py-4 text-lg font-extrabold text-gray-100 uppercase bg-blue-500 mt-15 rounded-3xl">
                    Submit Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

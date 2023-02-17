@auth                 

    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            {{-- comment form header --}}
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" width="40" height="40" alt="" class="rounded-full">
                <h2 class="ml-3">want to participate?</h2>
            </header>

            {{-- comment form body form --}}
            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" id="" rows="5" placeholder="What's on your mind?"></textarea>
            </div>

            @error('body')
                <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
            @enderror                                

            {{-- comment form submit button --}}
            <div class="flex justify-end pt-6 mt-6 border-t border-gray-200 ">
                <x-submit-button>Post</x-submit-button>
            </div>

        </form>
    </x-panel>

@else

    <p class="font-semibold">
        <a class="hover:underline" href="/register">Register</a> or <a class="hover:underline" href="/login">Login</a> to leave a comment
    </p>

@endauth

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
                <x-form.textarea name="body"/>
                               

            {{-- comment form submit button --}}
            <div class="flex justify-end pt-6 mt-6 border-t border-gray-200 ">
                <x-form.button>Submit</x-form.button>
            </div>

        </form>
    </x-panel>

@else

    <p class="font-semibold">
        <a class="hover:underline" href="/register">Register</a> or <a class="hover:underline" href="/login">Login</a> to leave a comment
    </p>

@endauth

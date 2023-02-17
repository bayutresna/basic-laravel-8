<x-layout>
    <section class="px-6 py-8">
        
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>

                <h1 class="text-center text-xl font-bold ">Log In!</h1>
                <form class="mt-10" method="POST" action="/login">
                    @csrf
                    <x-form.input type="email" name="email" autocomplete="username"/>
                    <x-form.input type="password" name="password" autocomplete="new-password"/>
                    <x-form.button>Login</x-form.button>
                </form>
            </main>
        </x-panel>

    </section>
</x-layout>
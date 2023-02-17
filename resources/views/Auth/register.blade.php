<x-layout>
    <section class="px-6 py-8">
        
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl mt-10">
            <h1 class="text-center text-xl font-bold ">Register!</h1>
            <form class="mt-10" method="POST" action="/register">
                @csrf
                
                <div class = "mb-6">
                    @error('name')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                        type="text" 
                        name="name" 
                        id="name" 
                        required
                        value="{{ old('name') }}">
                </div>

                <div class = "mb-6">

                    @error('username')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="Username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full" 
                        type="text" 
                        name="username" 
                        id="username" 
                        required
                        value="{{ old('username') }}">
                </div>

                <div class = "mb-6">
                    @error('email')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" 
                        type="email" 
                        name="email" 
                        id="email" 
                        required
                        value="{{ old('email') }}">
                </div>

                <div class = "mb-6">
                    @error('password')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                </div>

                <div class = "mb-6">
                    
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>

                </div>

            </form>
        </main>

    </section>
</x-layout>
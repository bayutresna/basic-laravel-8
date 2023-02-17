<x-layout name="content">

    <section class="py-8 max-w-md mx-auto">

        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <x-panel class="">
            <form action="/admin/posts" method="post">
                @csrf

                <div class = "mb-6">
                    @error('title')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full" 
                        type="title" 
                        name="title" 
                        id="title" 
                        required
                        value="{{ old('title') }}">
                </div>

                <div class = "mb-6">
                    @error('slug')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full" 
                        type="text" 
                        name="slug" 
                        id="slug" 
                        required
                        value="{{ old('slug') }}">
                </div>
                
                <div class = "mb-6">
                    @error('thumbnail')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full" 
                        type="file" 
                        name="thumbnail" 
                        id="thumbnail" 
                        required
                    >
                </div>
                

                <div class = "mb-6">
                    @error('excerpt')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" type="textarea" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>
                </div>

                <div class = "mb-6">
                    @error('body')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" type="textarea" name="body" id="body" required> {{ old('body') }} </textarea>
                </div>

                <div class = "mb-6">
                    @error('category')
                        <p class="text-xs text-red-500 mb-1">{{ $message }}</p>
                    @enderror

                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>

                    <select name="category_id" id="category">

                        @foreach (\App\Models\Category::all() as $category )
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name)  }}</option>
                        @endforeach
                    </select>

                </div>

                <div class = "mb-6">
                    
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>

                </div>
            </form>  
        </x-panel>
    </section>

</x-layout>
<x-layout name="content">

    <x-setting :heading="'Edit Post : '  . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
           
            <x-form.input value="{{ $post->title }}" name="title"/>
           
            <x-form.input value="{{ $post->slug }}" name="slug"/>
            
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file"/>
                </div>
                <img src="{{asset('storage/'. $post->thumbnail)  }}" alt="Blog Post illustration" width="100" class="rounded-xl ml-6">    
            
            </div>

           
            <x-form.textarea name="excerpt"> {{ old('excerpt',$post->excerpt) }} </x-form.textarea>
            
            <x-form.textarea name="body">{{ old('body',$post->body) }} </x-form.textarea>
            
            <x-form.field>
            
                <x-form.error name="category"/>      
                <x-form.label name="category"/>
                
                <select name="category_id" id="category">

                    @foreach (\App\Models\Category::all() as $category )
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name)  }}</option>
                    @endforeach
                </select>
            </x-form.field>
            
            <x-form.button>Publish</x-form.button>

        </form>  
    </x-setting>
    

</x-layout>
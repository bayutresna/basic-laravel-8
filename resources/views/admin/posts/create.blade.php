<x-layout name="content">

    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

           
            <x-form.input required name="title"/>
           
            <x-form.input required name="slug"/>
           
            <x-form.input required name="thumbnail" type="file"/>
           
            <x-form.textarea required name="excerpt"/>
            
            <x-form.textarea required name="body"/>
            
            <x-form.field>
            
                <x-form.error name="category"/>      
                <x-form.label name="category"/>
                
                <select name="category_id" id="category">

                    @foreach (\App\Models\Category::all() as $category )
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name)  }}</option>
                    @endforeach
                </select>
            </x-form.field>
            
            <x-form.button>Publish</x-form.button>

        </form>  
    </x-setting>
    

</x-layout>
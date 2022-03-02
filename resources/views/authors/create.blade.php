@extends('admin-layout')

@section('content')
    
    <h1>Create a new author</h1>

    <form action="{{ action('Admin\AuthorController@save')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="">Slug</label><br>
        <input 
            type="text" 
            name="slug" 
            value="{{ old('slug') }}"
        >
    </div>

    
    <div class="form-group">
        <label for="">Name</label><br>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}"
        >
    </div>

    
    <div class="form-group">
        <label for="">Biography</label><br>
        <textarea 
        name="bio"
        >{{ old('bio') }}</textarea>
    </div>

    
    <div class="form-group">
        <button>Save</button>
    </div>

    </form>

@endsection
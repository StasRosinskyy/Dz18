@extends('loyout')
@section('content')
    
    <form method="POST" action="{{route('posts.store')}}">
        <ul align="center">Добавить Post <br>
            @if($errors->has('user_id'))
                @foreach($errors->get('user_id') as $error)
                    {{$error}}
                @endforeach
            @endif
            user_id
            <li><input type="text" name="user_id" value="{{@old('user_id')}}"/> </li>
            
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $error)
                    {{$error}}
                @endforeach
            @endif
            category_id
            <li><input type="text" name="category_id" value="{{@old('category_id')}}"/></li>
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    {{$error}}
                @endforeach
            @endif
            title
            <li><input type="text" name="title" value="{{@old('title')}}"/></li>
    
            @if($errors->has('tag_id'))
                @foreach($errors->get('tag_id') as $error)
                    {{$error}}
                @endforeach
            @endif
            tag_id
            <li><input type="text" name="tag_id" value="{{@old('tag_id')}}"/></li>
            
            @if($errors->has('preview_text'))
                @foreach($errors->get('preview_text') as $error)
                    {{$error}}
                @endforeach
            @endif
            preview_text
            <li><input type="text" name="preview_text" value="{{@old('preview_text')}}"/></li>
            @if($errors->has('preview_image'))
                @foreach($errors->get('preview_image') as $error)
                    {{$error}}
                @endforeach
            @endif
            preview_image
            <li><input type="text" name="preview_image" value="{{@old('preview_image')}}"/></li>
            @if($errors->has('preview_cover'))
                @foreach($errors->get('preview_cover') as $error)
                    {{$error}}
                @endforeach
            @endif
            preview_cover
            <li><input type="text" name="preview_cover" value="{{@old('preview_cover')}}"/></li>
            @if($errors->has('body'))
                @foreach($errors->get('body') as $error)
                    {{$error}}
                @endforeach
            @endif
            body
            <li><input type="text" name="body" value="{{@old('body')}}"/></li>
            <li><input type="submit" name="crete" /></li>
        </ul>
        @csrf
    </form>

@endsection;

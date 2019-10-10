@extends('loyout')
@section('content')
    
    <form method="POST" action="{{route('categories.update', $category->id)}}">
        @method('PUT')
        <ul align="center">Добавить Категорию <br>
            @if($errors->has('name'))
                @foreach($errors->get('name') as $error)
                    {{$error}}
                @endforeach
            @endif
            <li><input type="text" name="name" value="{{@old('name', $category->name)}}"/> </li>
            @if($errors->has('slug'))
                @foreach($errors->get('slug') as $error)
                    {{$error}}
                @endforeach
            @endif
            <li><input type="text" name="slug" value="{{@old('slug', $category->slug)}}"/></li>
            <li><input type="submit" name="save" value="UPDATE"/></li>
        </ul>
        @csrf
    </form>

@endsection;

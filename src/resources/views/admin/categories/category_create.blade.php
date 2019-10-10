@extends('loyout')
@section('content')

<form method="POST" action="{{route('categories.store')}}">
    <ul align="center">Добавить Категорию <br>
        @if($errors->has('name'))
            @foreach($errors->get('name') as $error)
                {{$error}}
            @endforeach
            @endif
        <li><input type="text" name="name" value="{{@old('name')}}"/> </li>
        @if($errors->has('slug'))
            @foreach($errors->get('slug') as $error)
                {{$error}}
            @endforeach
        @endif
        <li><input type="text" name="slug" value="{{@old('slug')}}"/></li>
        <li><input type="submit" name="crete" /></li>
    </ul>
    @csrf
</form>

@endsection;

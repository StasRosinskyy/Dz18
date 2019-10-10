@extends('loyout')
@section('content')


<p align="center">
<a style="background-color: skyblue" href="{{route('categories.create')}}">Добавить Категорию!</a>

<table border="1">
@foreach($categories as $category)
    <tr align="center">
        <td> {{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">Update</a></td>
        <form method="POST" action="{{route('categories.destroy', $category)}}">
        @method('DELETE')
        <td><input type="submit" value="X"></td>
        @csrf
    </form>
    </tr>
@endforeach
</table>
</p>
    @endsection;
    


@extends('loyout')
@section('content')
    <p align="center">
        <a style="background-color: skyblue" href="{{route('tags.create')}}">Добавить Tag!</a>
    <br>

<br>
<table border="1">
@foreach($tags as $tag)
    <tr align="center">
    <td>{{$tag->id}}</td>
    <td> {{$tag->name}}</td>
    <td> {{$tag->slug}}</td>
    <td><a href="{{route('tags.edit', $tag->id)}}">Update</a></td>
    <td><form method="POST" action="{{route('tags.destroy', $tag)}}">
    @method('DELETE')
    <td> <input type="submit" value="X"></td>
        @csrf
    </tr>
    </form>
    @endforeach
    </table>
    @endsection;
</p>

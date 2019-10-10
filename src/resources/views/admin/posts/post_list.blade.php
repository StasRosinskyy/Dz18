@extends('loyout')
@section('content')
    <p align="center">
        <a style="background-color: skyblue" href="{{route('posts.create')}}">Добавить post!</a>
    <br>
<br>
<table border="1">
@foreach($posts as $post)
    <tr align="center">
    <td>{{$post->id}}</td>
    <td> {{$post->user_id}}</td>
    <td> {{$post->title}}</td>
    <td> {{$post->preview_text}}</td>
    <td> {{$post->preview_image}}</td>
    <td> {{$post->preview_cover}}</td>
    <td> {{$post->views}}</td>
    <td> {{$post->comments}}</td>
    <td> {{$post->body}}</td>
    <td><a href="{{route('posts.edit', $post->id)}}">Update</a></td>
    <td><form method="POST" action="{{route('posts.destroy', $post)}}">
    @method('DELETE')
    <td> <input type="submit" value="X"></td>
        @csrf
    </tr>
    </form>
    @endforeach
    </table>
    @endsection;
</p>

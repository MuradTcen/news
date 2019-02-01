@extends('../layouts/app')



@section('content')

    <div class="text-center">
        Автор статьи: {{$user->name}}
        <br>
        Просмотров: {{$post->watches}}
        {{--{{$post->title}}--}}
        <br>
        <br>
        {{--{{$post->body}}--}}

    </div>
@endsection

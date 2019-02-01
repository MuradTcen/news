@extends('layouts.app')



@section('content')

    @if (Session::has('message'))
        <div class="flash alert-info">
            <p class="panel-body">
                {{ Session::get('message') }}
            </p>
        </div>
    @endif

    <div class="text-center">
        <li>
            <button><a href="{{ url('/new-post') }}">Добавить пост</a></button>
        </li>

        @if(!$posts->count())
            Новостей нет
        @else

            @foreach( $posts as $post )
                {{$post->title}}
                <br>
                <br>
                <br>
                <button><a href="{{ url('post/'.$post->id.'?_token='.csrf_token()) }}">Получить новость</a></button>
                @if($post->attachment_file)
                    <button><a href="{{route('downloadfile', $post->attachment_file) }}">Скачать прикрепленный файл</a>
                    </button>
                @endif
                @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                    <button><a href="{{ url('edit/'.$post->id.'?_token='.csrf_token()) }}">Редактировать</a>
                    </button>
                    <button><a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}">Удалить</a></button>
                @else

                @endif

                <br>
                <br>
            @endforeach
            {{--{!! $posts->render() !!}--}}

        @endif
    </div>
@endsection

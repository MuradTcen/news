@extends('../layouts/app')
@section('content')
    <form action="/new-post" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input required="required" value="{{ old('title') }}" placeholder="Введите заголовок" type="text"
                   name="title" class="form-control"/>
        </div>
        <div class="form-group">
        </div>

        <div class=form-group">
            <textarea name='body' class="form-control">{{ old('body') }}</textarea>
        </div>
        <br>
        Прикрепить файл:
        <br>
        <input type="file" name="filename">


        <input type="submit" name='save' class="btn btn-success" value="Опубликовать"/>
    </form>



    @if ($errors->any())
        <div class='flash alert-danger'>
            <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
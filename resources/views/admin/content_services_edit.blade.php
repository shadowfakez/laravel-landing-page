<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('services.update', array('service'=>$old['id'])),'class'=>'form-horizontal',
    'method'=>'PUT',
    'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $old['id']) !!}
        {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $old['name'], ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $old['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::hidden('icon', $old['icon']) !!}
        {!! Form::label('icon', 'Текущая иконка:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
                <span><i style="color: red" class="fa {{ $old['icon'] }} fa-5x"></i></span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::hidden('icon', $old['icon']) !!}
        {!! Form::label('icon', 'Код иконки:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', $old['icon'], ['class' => 'form-control','placeholder'=>'Введите название страницы'])
             !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('services.store'), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' =>
    'multipart/form-data']) !!}

    <div class="form-group">

        {!! Form::label('name', 'Название:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Введите название сервиса']) !!}
        </div>

    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>

    <div class="form-group">

        {!! Form::label('icon', 'Иконка:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'вставьте код иконки fontawesome, например "fa-coffee"'])
             !!}
            <p class="pt-2">Перейдите на сайт <a  target="_blank"
                                                  href="https://fontawesome.ru/all-icons/">
                    fontawesome</a>. выберите подходящую иконку и вставьте ее код в поле выше</p>
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
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

</div>
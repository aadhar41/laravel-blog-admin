@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">Edit Article 
        <a href="#" onclick="window.history.back();" class="btn btn-sm btn-outline-primary float-right" title="">Go Back</a> 
    </div>
    <!-- .card-header -->

    <div class="card-body">
    
        <div class="container-fluid">

            @if(isset($article))
                {{ Form::model($article, ['route' => ['admin.article.update', $article->id], 'method' => 'post','files'=>'true']) }}
            @else
                {!! Form::open() !!}
            @endif

            <div class="row">
                <div class="col-sm-4">
                    <label for="inputTitle">Email address :</label>
                    <?= Form::text('title', null, ['class' => 'form-control', 'maxlength' => '255', 'autofocus' => 'autofocus', 'placeholder' => 'Title', 'id' => 'inputTitle','required'=>true]) ?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                
                <div class="col-lg-12" style="margin: 1% 0;"></div>

                <div class="col-sm-12">
                    <label for="inputDescription">Description :</label>
                    <?= Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => '255', 'autofocus' => 'autofocus', 'placeholder' => 'Description', 'id' => 'inputDescription','required'=>true, 'rows' => 4, 'cols' => 40]) ?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="col-lg-12" style="margin: 1% 0;"></div>

                <div class="col-sm-4">
                    <?= Form::file('image[]', ['multiple'=> true, 'accept' => 'image/*']); ?>
                </div>

                <div class="col-lg-12" style="margin: 1% 0;"></div>

                <div class="col-sm-2">
                    <?= Form::submit('Update', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>

            </div>
            <!-- .row -->

            {{ Form::close() }}

        </div>
        <!-- .container-fluid -->

    </div>
    <!-- .card-body -->

</div>
        <!-- .card -->

@endsection
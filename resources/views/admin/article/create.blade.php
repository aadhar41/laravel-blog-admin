@extends('layouts.app')

@section('content')

<div class="content">
   <div class="container-fluid">
   		<div class="card">
            <div class="card-header">
              <h3 class="card-title">Article</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container-fluid">

            @if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>

    <ul>

      @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

      @endforeach

    </ul>

</div>

@endif


@if(session('success'))

<div class="alert alert-success">

  {{ session('success') }}

</div> 

@endif
                    
                     {!! Form::open(['route' => 'admin.article.store', 'method' => 'POST', 'class' => 'form-horizontal','id' => 'popup-validation','enctype' => 'multipart/form-data']) !!}
                    

                    <div class="row">

                        <div class="col-sm-6">
                            <label for="inputTitle">Title :</label>
                            <?= Form::text('title', null, ['class' => 'form-control', 'maxlength' => '30', 'autofocus' => 'autofocus', 'placeholder' => 'Title', 'id' => 'inputTitle','required'=>true]) ?>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        
                        <div class="col-lg-12" style="margin: 1% 0;"></div>

                        <div class="col-sm-12">
                            <label for="inputShortdescription">Short Description :</label>
                            <?= Form::text('short_description', null, ['class' => 'form-control', 'maxlength' => '160', 'autofocus' => 'autofocus', 'placeholder' => 'Short Description', 'id' => 'inputShortdescription','required'=>true]) ?>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        
                        <div class="col-lg-12" style="margin: 1% 0;"></div>

                        <div class="col-sm-12">
                            <label for="inputDescription">Description :</label>
                            <?= Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => 'Description', 'id' => 'inputDescription','required'=>true, 'rows' => 4, 'cols' => 40]) ?>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                
                        <div class="col-lg-12" style="margin: 1% 0;"></div>

                        <div class="col-sm-4">
                            <?= Form::file('image[]', ['multiple'=> true, 'accept' => 'image/*']); ?>
                        </div>

                 

                        <div class="col-lg-12" style="margin: 1% 0;"></div>

                        <div class="col-sm-2">
                            <?= Form::submit('Add', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                        </div>

                    </div>
                    <!-- .row -->

                    {{ Form::close() }}

                </div>

            </div>

            <!-- /.card-body -->
         </div>
   </div>
</div>

@endsection

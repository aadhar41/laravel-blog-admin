@extends('layouts.app')

@section('content')


   		<div class="card">
            <div class="card-header">
              <h3 class="card-title">Journal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container-fluid">

                    
                     {!! Form::open(['route' => 'admin.journal.store', 'method' => 'POST', 'class' => 'form-horizontal','id' => 'popup-validation','enctype' => 'multipart/form-data']) !!}
                    

                    <div class="row">

                        <div class="col-sm-6">
                            <label for="inputTitle">Title :</label>
                            <?= Form::text('title', null, ['class' => 'form-control', 'maxlength' => '30', 'autofocus' => 'autofocus', 'placeholder' => 'Title', 'id' => 'inputTitle','required'=>true]) ?>
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
                            <?= Form::file('image', ['multiple'=> true, 'accept' => 'image/*']); ?>
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

@endsection

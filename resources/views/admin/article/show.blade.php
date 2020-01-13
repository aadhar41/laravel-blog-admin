@extends('layouts.app')

@section('content')


<div class="card">

    <div class="card-header">Article
        <a href="#" onclick="window.history.back();" class="btn btn-sm btn-outline-primary float-right" title="">Go Back</a> 
    </div>
    <!-- .card-header -->

    <div class="card-body">
    
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-sm-4">
                    <label for="inputTitle">Title :</label>
                    <?php echo $article->title; ?>
                </div>
                
                <div class="col-lg-12" style="margin: 1% 0;"></div>

                <div class="col-sm-12">
                    <label for="inputDescription">Short description :</label>
                    <?php echo $article->short_description; ?>
                </div>

                <div class="col-sm-12">
                    <label for="inputDescription">Description :</label>
                    <?php echo $article->description; ?>
                </div>

                <div class="col-lg-12" style="margin: 1% 0;"></div>





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
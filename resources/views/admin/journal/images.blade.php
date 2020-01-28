@extends('layouts.app')

@section('content')


<div class="card">

    <div class="card-header">Journal
        <a href="#" onclick="window.history.back();" class="btn btn-sm btn-outline-primary float-right" title="">Go Back</a> 
    </div>
    <!-- .card-header -->

    <div class="card-body">
    
        <div class="container-fluid">

            
            <div class="row">
                    <!-- <label for="inputTitle">Image - 1:</label> -->
                <?php if(count($article)!=0) { ?>    
                    <?php foreach ($article as $val) { ?>
                    <div class="col-sm-4">
                        <img src="{{ url($val->image) }}" class="img-thumbnail elevation-2" alt="image">
                    </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="col-sm-12 text-center text-muted"> NO MEDIA FOR THIS JOURNAL </div>
                <?php } ?>
                    <div class="col-lg-12" style="margin: 1% 0;"></div>

            </div>
            <!-- .row -->

            

        </div>
        <!-- .container-fluid -->

    </div>
    <!-- .card-body -->

</div>
<!-- .card -->

@endsection
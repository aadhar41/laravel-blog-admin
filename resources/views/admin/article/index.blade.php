@extends('layouts.app')

@section('content')

	<div class="card">
      <div class="card-header">
        <h3 class="card-title">Articles</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <div class="table-responsive">
            <?php if (count($listings)>0) { ?>
            <table id="usersTable" class="table table-bordered table-sm table-hover ">
               <thead class="thead-light" >
                  <tr>
                     <th>S.No.</th>
                     <th>Title</th>
                     <th>Short Description</th>
                     <th>Description</th>
                     <th>Images</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $i=1;
                     foreach ($listings as $value) { 
                  ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->title; ?></td>
                        <td><?php echo $value->short_description; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td>
                           <a href="{{ route('admin.article.images', $value->id) }}">
                              <button class="btn btn-primary btn-xs">
                                 <i class="fas fa-eye"></i>
                              </button>
                           </a>
                        </td>
                        <td>
                           <?php
                              $status = ($value->status==1) ? 'active' : 'deactive' ;
                              if ($value->status==1) {
                                 ?>
                                    <span class="right badge badge-success"><?= $status ?></span>
                                 <?php
                              } else {
                                 ?>
                                    <span class="right badge badge-danger"><?= $status ?></span>
                                 <?php
                              }
                              
                           ?>
                        </td>

                        <td>
                           <div class="btn-group">
                              <a href="{{ route('admin.article.edit', $value->id) }}">
                                 <button class="btn btn-secondary btn-xs">
                                    <i class="fas fa-edit"></i>
                                 </button>
                              </a>
                              &nbsp;
                               <a href="{{ route('admin.article.show', $value->id) }}">
                                 <button class="btn btn-primary btn-xs">
                                    <i class="fas fa-eye"></i>
                                 </button>
                              </a>
                              &nbsp;
                              <a href="{{ route('admin.article.destroy', $value->id) }}" onclick="return confirm('Are you sure you want to delete this entry??')">
                                 <button class="btn btn-danger btn-xs">
                                    <i class="fas fa-trash-alt"></i>
                                 </button>
                              </a>
                           </div>
                           
                        </td>
                     </tr>
                  <?php 
                     $i++;
                     } 
                  ?>
               
               </tbody>
               <tfoot>
                  <tr>
                     <th>S.No.</th>
                     <th>Title</th>
                     <th>Short Description</th>
                     <th>Description</th>
                     <th>Images</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </tfoot>
            </table>
            <?php } else { ?>  
               No Data
            <?php } ?>
         </div>

      </div>

      <!-- /.card-body -->
   </div>

@endsection

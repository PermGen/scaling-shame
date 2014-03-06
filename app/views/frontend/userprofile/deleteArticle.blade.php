@extends('frontend/_layout/layout2')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Quick Shortcuts</strong></a>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href=""><i class="glyphicon glyphicon-envelope"></i> Inbox</a></li>
                <li><a href=""><i class="glyphicon glyphicon-tasks"></i> Post</a></li>                
                <li><a href=""><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced</a></li>
            </ul>
            <hr>

        </div>
        <div class="col-md-9">
           
             <hr>
              <div class="row">
 {{ Notification::showAll() }}

  {{ Form::open( array( 'url' => url( 'deleteArticle', $category->id ) ) ) }}
    {{ Form::hidden( '_method', 'DELETE' ) }}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{{{ $category->title }}} and related articles </b> ?
        </div>
        <div class="pull-right">
            {{ Form::submit( 'Yes', array( 'class' => 'btn btn-danger' ) ) }}
            {{ link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) }}
        </div>
        <div class="clearfix"></div>
    </div>
    {{ Form::close() }}
                </div>
             <br>
             <br>
             
        </div>
    </div>
    <br>
    <br>
     <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Please remember to <a href="#">Logout</a> for classified security.
        </div>
    <br>
</div>
@stop

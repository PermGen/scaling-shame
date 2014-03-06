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
                  <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Category</h3>
        </div>
        <div class="panel-body">
            {{ Notification::showAll() }}
            <br>
            <br>
            <br>
            {{ Form::open(array('url' => URL::to('/storeCategory'))) }}
            <!-- Title -->
            <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="control-label" for="title">Category</label>

                <div class="controls">
                    {{ Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Category', 'value'=>Input::old('title'))) }}
                    @if ($errors->first('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Form actions -->
            {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
            <a href="{{ url('admin/category') }}" class="btn btn-default">&nbsp;Cancel</a>
            {{ Form::close() }}
        </div>
    </div>   
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

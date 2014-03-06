@extends('frontend/_layout/layout2')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}

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
           
            
              <div class="row">
                 <script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.category.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Category
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $category )
                    <tr>
                        <td> {{ link_to_route( 'admin.category.show', $category->title, $category->id, array( 'class' => 'btn btn-link btn-xs' )) }}
                        <td>                         
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.category.show', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.category.edit', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Category
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.category.delete', array($category->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Category
                                        </a>
                                    </li>

                                     <li class="divider"></li>
                                    <li>
                                        <a target="_blank" href="{{ $category->url }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View On Site
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pull-left">
        <ul class="pagination">
            {{ $categories->links() }}
        </ul>
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

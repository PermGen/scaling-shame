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

                     <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $article->title }}</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/articleList') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Title</strong></td>
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <td><strong>Slug</strong></td>
                    <td>{{ $article->slug }}</td>
                </tr>
                <tr>
                    <td><strong>Category</strong></td>
                    <td>{{ $article->category[0]->title }}</td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td>{{ $article->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td>{{ $article->updated_at }}</td>
                </tr>
                <tr>
                    <td><strong>Meta Keywords</strong></td>
                    <td>{{ $article->meta_keywords }}</td>
                </tr>
                <tr>
                    <td><strong>Meta Description</strong></td>
                    <td>{{ $article->meta_description }}</td>
                </tr>
                <tr>
                    <td><strong>Published</strong></td>
                    <td>{{ $article->is_published }}</td>
                </tr>
                <tr>
                    <td><strong>Tag</strong></td>
                    <td>                        
                        @foreach($article->tags as $tag)
                        {{ $tag->name }},
                        @endforeach                      
                    </td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>{{ $article->content }}</td>
                </tr>
                </tbody>
            </table>
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

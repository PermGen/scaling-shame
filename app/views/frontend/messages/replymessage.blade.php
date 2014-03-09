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
                <li><a href="{{URL::to('/mymessages')}}"><i class="glyphicon glyphicon-envelope"></i> Inbox 
                        @if(count($messages)!=0)
                            <span class="label label-info">{{count($messages)}}</span>
                        @endif

                </a></li>
                <li><a href="{{URL::to('/articleList')}}"><i class="glyphicon glyphicon-tasks"></i> Post</a></li>                
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
                          Reply to :{{$from->first_name}}
                        </div>  
                      <div class="panel-body">
               {{ Form::open(array('url' => URL::to('sendMessage'),'method'=>'POST')) }}
            
                         <div class="control-group">
                                <div class="control-label">
                                    Message
                                </div>
                                <div class="controls">
                                 <input type="hidden" name="sendTo" value="{{$messages->user_from}}">
                                 </div>
                            </div>  
                                <br>
                            <div class="control-group">
                               
                                <div class="controls">
                                   <div>
                                        {{$messages->message}}
                                   </div>
                                </div>

                            </div>
                            <br><br>
                            <div class="control-group">
                                <div class="control-label">
                                    Reply
                                </div>
                                <div class="controls">
                                   <div>
                                <textarea class="form-control" name="message"></textarea>
                                   </div>
                                </div>

                            </div>
                            <br>
                            <button id="btnSendMessage" class="btn btn-primary">Send <span class="glyphicon glyphicon-send"></span></button>
                {{Form::close()}}
                      </div>
                      
                    </div>
             <br>
             <br>
             
        </div>
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

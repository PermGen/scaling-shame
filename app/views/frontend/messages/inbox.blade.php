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
          
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{URL::to('/mymessages')}}"><i class="glyphicon glyphicon-envelope"></i> Inbox</a></li>
                <li><a href="{{URL::to('/articleList')}}"><i class="glyphicon glyphicon-tasks"></i> Post</a></li>                
                <li><a href=""><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced</a></li>
            </ul>
            <hr>

        </div>
        <div class="col-md-9">
           
        
              <div class="row">
                     {{ Notification::showAll() }}
</br></br>
      <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Messages</h3>

        </div>
        <div class="panel-body">
         <a class="btn btn-primary" href="{{URL::to('/createNewMessage')}}">Create New Message</a>
            <br><br>

            <div class="table-responsive">


                         <table class="table table-striped">
                             <thead>
                                 <tr>
                                   <th>From</th>
                                   <th>Messages</th>  
                                   <th>Date</th>
                                   <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                               @foreach($messages as $message)
                                <tr class="{{$message->is_seen==1? 'active': 'success'}}">
                                    <td>{{$message->user_from}}</td>
                                    <td>{{$message->message}}</td>                                    
                                    <td>{{$message->created_at}}</td>
                                    <td>
                                          <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/viewmymessage',$message->message_id)}}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;View Message
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/replyMessage',$message->message_id) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Reply
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{url('/deleteMessage', $message->message_id) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Message
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

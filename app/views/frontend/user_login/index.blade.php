@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}

<div class="container">
  <div class="row">

            <div class="col-lg-2 col-md2">
                <h3><i class="icon-ok-circle"></i> Beautifully Simplistic</h3>
                <p>Aenean egestas velit vitae nibh elementum, ac faucibus risus varius. Duis pellentesque mollis semper. Etiam semper, neque sed dapibus pharetra, neque orci lacinia enim, quis sodales felis dui eget tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas varius at massa eu fringilla.
                </p>
            </div>

  <div class="col-lg-8 col-md-8" style="margin-top:20px">
                

  <div class="container">
    <div class="row">
        <div style="text-align: center" class="col-md-6 col-md-offset-3">
            <h1 style="color: #FFFFFF">Alumni Tracking</h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><b>Log In</b></h5>
                    {{ Form::open(array('class' => 'form-signup', 'id' => 'form-signin')) }}

                    @if ($errors->has('login'))
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>{{ $errors->first('login', ':message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            {{ Form::text('email', null,array('class' => 'form-control', 'placeholder'=>'Email', 'autofocus'=>'')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) }}
                        </div>
                    </div>

                    <label style="text-align: left" class="checkbox">{{ Form::checkbox('rememberMe', 'rememberMe') }} Remember me</label>

                    {{ Form::submit('Sign in', array('class' => 'btn btn-sm btn-primary btn-block', 'role'=>'button')) }}
                    {{ Form::close() }}
                    <br>
                    {{ HTML::link('/admin/forgot-password','Forgot Password', array('class' => 'btn btn-sm btn-default btn-block')) }}
                </div>
            </div>
        </div>
    </div>
</div>


  </div>
            <div class="col-lg-2 col-md-2">
                <h3><i class="icon-folder-open-alt"></i> Blissful Layout Options</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis eu odio a hendrerit. Vivamus urna eros, gravida vitae urna et, sollicitudin interdum est. Suspendisse potenti. Nam aliquet sed turpis quis pharetra. Maecenas sed ultricies justo. Sed sed malesuada est. Donec faucibus elit a elit vestibulum elementum. </p>
            </div>

  </div>
</div>
   

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-ok-circle"></i> Beautifully Simplistic</h3>
                <p>Aenean egestas velit vitae nibh elementum, ac faucibus risus varius. Duis pellentesque mollis semper. Etiam semper, neque sed dapibus pharetra, neque orci lacinia enim, quis sodales felis dui eget tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas varius at massa eu fringilla.
                </p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-pencil"></i> Free Support & Updates</h3>
                <p>Nunc aliquet rutrum ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris eget enim interdum arcu scelerisque suscipit. Duis porta, lectus nec commodo bibendum, libero massa tempor quam, ac ullamcorper mauris tortor nec quam. Aenean at ante vitae turpis volutpat cursus. Vestibulum sed est in risus rhoncus lacinia.</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-folder-open-alt"></i> Blissful Layout Options</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum venenatis eu odio a hendrerit. Vivamus urna eros, gravida vitae urna et, sollicitudin interdum est. Suspendisse potenti. Nam aliquet sed turpis quis pharetra. Maecenas sed ultricies justo. Sed sed malesuada est. Donec faucibus elit a elit vestibulum elementum. </p>
            </div>
        </div>
    </div>
</div>
@stop

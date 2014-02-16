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
      <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
        </div>
        <div class="panel-body">            
            <br>
            <br>
            <br>
            {{ Form::open(array('action' => 'App\Controllers\Admin\UserController@store')) }}

            <!-- First Name -->
            <div class="control-group {{ $errors->has('first-name') ? 'has-error' : '' }}">
                <label class="control-label" for="first-name">First Name</label>

                <div class="controls">
                    {{ Form::text('first_name', null, array('class'=>'form-control', 'id' => 'first_name', 'placeholder'=>'First Name', 'value'=>Input::old('first_name'))) }}
                    @if ($errors->first('first-name'))
                    <span class="help-block">{{ $errors->first('first-name') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Last Name -->
            <div class="control-group {{ $errors->has('last-name') ? 'has-error' : '' }}">
                <label class="control-label" for="last-name">Last Name</label>

                <div class="controls">
                    {{ Form::text('last_name', null, array('class'=>'form-control', 'id' => 'last_name', 'placeholder'=>'Last Name', 'value'=>Input::old('last_name'))) }}
                    @if ($errors->first('last-name'))
                    <span class="help-block">{{ $errors->first('last-name') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Email -->
            <div class="control-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label" for="email">Email</label>

                <div class="controls">
                    {{ Form::text('email', null, array('class'=>'form-control', 'id' => 'email', 'placeholder'=>'Email', 'value'=>Input::old('email'))) }}
                    @if ($errors->first('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <legend>Password</legend>
            <!-- Password -->
            <div class="control-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label" for="password">Password</label>

                <div class="controls">
                    {{ Form::password('password', array('class'=>'form-control', 'id' => 'password', 'placeholder'=>'Password', 'value'=>Input::old('password'))) }}
                    @if ($errors->first('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Confirm Password -->
            <div class="control-group {{ $errors->has('confirm-password') ? 'has-error' : '' }}">
                <label class="control-label" for="confirm-password">Confirm Password</label>

                <div class="controls">
                    {{ Form::password('confirm_password', array('class'=>'form-control', 'id' => 'confirm_password', 'placeholder'=>'Confirm Password', 'value'=>Input::old('confirm_password'))) }}
                    @if ($errors->first('confirm-password'))
                    <span class="help-block">{{ $errors->first('confirm-password') }}</span>
                    @endif
                </div>
            </div>
            <br>
           
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

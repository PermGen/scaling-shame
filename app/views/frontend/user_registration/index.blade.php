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
         

            {{ Form::open(array('url' => URL::to('register'),'method'=>'POST')) }}

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
            <!-- Middle Name -->
            <div class="control-group {{$errors->has('middle-name') ? 'has-error' : '' }}">
                <label class="control-label" for="middle-name">Middle Name</label>

                <div class="controls">
                    {{ Form::text('middle_name', null, array('class'=>'form-control', 'id' => 'middle_name', 'placeholder'=>'Middle Name', 'value'=>Input::old('middle_name'))) }}
                    @if ($errors->first('middle-name'))
                    <span class="help-block">{{ $errors->first('middle-name') }}</span>
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

              <!-- Gender -->
            <div class="control-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                <label class="control-label" for="gender">Gender</label>

                <div class="controls">
                    <div class="radio">
                        {{ Form::radio('gender','MALE') }}MALE
                    </div>
                   <div class="radio"> 
                        {{ Form::radio('gender','FEMALE') }}FEMALE
                   </div>
                    @if ($errors->first('gender'))
                    <span class="help-block">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>
            <br>

              <!-- Date of birth  -->
            <div class="control-group {{ $errors->has('birth-date') ? 'has-error' : '' }}">
                <label class="control-label" for="birth-date">Birth Date</label>

                <div class="controls">
                    <input type="date"  class="form-control" name="birth_date" placeholder="Birth Date" value="{{Input::old('birth_date')}}">
                    @if ($errors->first('birth-date'))
                    <span class="help-block">{{ $errors->first('birth-date') }}</span>
                    @endif
                </div>
            </div>
            <br>
              <!-- Year Graduated -->
            <div class="control-group {{ $errors->has('year-graduated') ? 'has-error' : '' }}">
                <label class="control-label" for="year-graduated">Year Graduated</label>

                <div class="controls">
                  <input type="date" class="form-control" name="year_graduated" placeholder="Year Graduated" value="{{Input::old('year-graduated')}}">
                    @if ($errors->first('year-graduated'))
                    <span class="help-block">{{ $errors->first('year-graduated') }}</span>
                    @endif
                </div>
            </div>
            <br>

              <!-- Course -->
            <div class="control-group {{ $errors->has('course') ? 'has-error' : '' }}">
                <label class="control-label" for="year-graduated">Course</label>

                <div class="controls">
                    {{ Form::text('course', null, array('class'=>'form-control', 'id' => 'course', 'placeholder'=>'Course', 'value'=>Input::old('course'))) }}
                    @if ($errors->first('course'))
                    <span class="help-block">{{ $errors->first('course') }}</span>
                    @endif
                </div>
            </div>
            <br>

                <!-- Civil Stat -->
            <div class="control-group {{ $errors->has('civil-stat') ? 'has-error' : '' }}">
                <label class="control-label" for="civil-stat">Civil Status</label>

                <div class="controls">
                    {{ Form::text('civil_stat', null, array('class'=>'form-control', 'id' => 'civil_stat', 'placeholder'=>'Civil Status', 'value'=>Input::old('civil_stat'))) }}
                    @if ($errors->first('civil-stat'))
                    <span class="help-block">{{ $errors->first('civil_stat') }}</span>
                    @endif
                </div>
            </div>
            <br>



              <!-- Address -->
            <div class="control-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label class="control-label" for="address">Address</label>

                <div class="controls">
                    {{ Form::text('address', null, array('class'=>'form-control', 'id' => 'address', 'placeholder'=>'Address', 'value'=>Input::old('address'))) }}
                    @if ($errors->first('address'))
                    <span class="help-block">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <br>

              <!-- Company -->
            <div class="control-group {{ $errors->has('company') ? 'has-error' : '' }}">
                <label class="control-label" for="company">Company</label>

                <div class="controls">
                    {{ Form::text('company', null, array('class'=>'form-control', 'id' => 'company', 'placeholder'=>'Company', 'value'=>Input::old('company'))) }}
                    @if ($errors->first('company'))
                    <span class="help-block">{{ $errors->first('company') }}</span>
                    @endif
                </div>
            </div>
            <br>

              <!-- Company   add -->
            <div class="control-group {{ $errors->has('company-address') ? 'has-error' : '' }}">
                <label class="control-label" for="company_address">Company Address</label>

                <div class="controls">
                    {{ Form::text('company_address', null, array('class'=>'form-control', 'id' => 'company_address', 'placeholder'=>'Company Address', 'value'=>Input::old('company_address'))) }}
                    @if ($errors->first('company-address'))
                    <span class="help-block">{{ $errors->first('company-address') }}</span>
                    @endif
                </div>
            </div>
            <br>

              <!-- Nature of job-->
            <div class="control-group {{ $errors->has('job-nature') ? 'has-error' : '' }}">
                <label class="control-label" for="last-name">Nature of Job</label>

                <div class="controls">
                    {{ Form::text('job_nature', null, array('class'=>'form-control', 'id' => 'job_nature', 'placeholder'=>'Nature of Job', 'value'=>Input::old('job_nature'))) }}
                    @if ($errors->first('job-nature'))
                    <span class="help-block">{{ $errors->first('job-nature') }}</span>
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

               <div class="control-group">
                
                <div class="controls">
                    <button class="btn btn-primary">Register</button>
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

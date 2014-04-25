@extends('master')

@section('content')

<body class='login'>
	<div class="wrapper">
		<h1><a href="index.html"><img src="assets/img/mc1.jpg" alt="" class='retina-ready' width="59" height="49">JC & K</a></h1>
		@if($errors->any())
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong> {{$errors->first()}}
			</div>
		@endif
		<div class="login-body">
			<h2>SIGN IN</h2>
			{{ Form::open(array('url' => 'do', 'class' => 'form-vertical login-form', 'id' => 'test')) }}
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='uname' placeholder="Username" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="upw" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			<!-- </form> -->
			{{ Form::close() }}
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>

@stop
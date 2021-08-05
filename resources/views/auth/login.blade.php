@extends('layouts/app')

@section('content')
	<section class="fxt-template-animation fxt-template-layout7" data-bg-image="img/figure/bg7-l.png">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">
					<div class="fxt-content">
						<div class="fxt-header">
							<a href="" class="fxt-logo"><img src="img/logo-gpl.png" alt="Logo"></a>
							<p>GPL API LOGIN</p>
						</div>
						<div class="fxt-form">
							<form method="POST" action="{{ route('login.custom') }}">
								 @csrf
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-1">
										<input type="email" id="email" class="form-control" name="email" placeholder="Email" required
                                    autofocus>
									   @if ($errors->has('email'))
										<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-2">
										<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
										<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
										 @if ($errors->has('password'))
										<span class="text-danger">{{ $errors->first('password') }}</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-3">
										<div class="fxt-checkbox-area">
											<div class="checkbox">
												<input id="checkbox1" type="checkbox" name="remember">
												<label for="checkbox1">Keep me logged in</label>
											</div>
											<a href="forgot-password-7.html" class="switcher-text">Forgot Password</a>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-4">
										<button type="submit" class="fxt-btn-fill">Log in</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

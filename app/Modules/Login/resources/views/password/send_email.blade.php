@extends('Login::layouts.template')
@section('title', "Password reset")

@section('content')
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(assets/img/cover/profile-cover.jpg)"></div>
                <div class="news-caption">
                   <h4 class="caption-title"><b style="text-shadow: 4px 4px #000;">Urban and Peri-urban Agriculture Information Management System</b> </h4>
                   <p>
                       
                   </p>
               </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <img src="{{url('assets/img/images/DA-LOGO-1024x1024.png')}}" width="70" height="70" style="display: inline-block"  /> <b>UP-AIMS</b>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form id="reset_form" method="POST" action="{{ route('send.req.pwd.link') }}" class="margin-bottom-0">
                        @csrf
                        <span class="error_email"></span>
                        <div class="form-group m-b-15">
                            <input type="text" name="email" class="form-control form-control-lg" placeholder="Email Address" />
                            <span class="error_msg"></span>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" id="submit-btn" class="btn btn-success btn-block btn-lg btn-rst-pass-link">SEND RESET LINK PASSWORD</button>
                        </div>
                        <hr />
                        <p class="text-center text-grey-darker">
                            &copy; Department of Agriculture 2022 
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
                
	</div>
	<!-- end page container -->
@endsection

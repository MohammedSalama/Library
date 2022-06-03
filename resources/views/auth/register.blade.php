@extends('layouts.admin.master2')

@section('title')
    Register - Library PROJECT
@stop


@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/register-bg.jpg);">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax" style="background-image: url(images/register-inner-bg.jpg);">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
                        <ul class="list-unstyled pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Signup</h3>

                        <form action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="fname"> name* </label>
                                <input id="name" class="web form-control" type="text" value="{{old('name')}}" required autofocus placeholder="name*" name="name">
                            </div>


                            <div class="section-field mb-20">
                                <label class="mb-10" for="email">Email* </label>

                                <input type="email" placeholder="Email*" id="email" class="form-control" name="email" :value="old('email')" required>
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="password">Password* </label>
                                <input class="Password form-control" id="password" required autocomplete="new-password" type="password" placeholder="Password" name="password">
                            </div>
                            <!-- Confirm Password -->
                            <!-- <div class="mt-4">
                              <x-label for="password_confirmation" :value="__('Confirm Password')" />

                              <x-input id="password_confirmation" class="block mt-1 w-full"
                                              type="password"
                                              name="password_confirmation" required />
                          </div> -->
                            <div class="section-field mb-20">
                                <label class="mb-10" for="password_confirmation">Confirm Password* </label>
                                <input class="Password form-control" id="password_confirmation" required
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="Password Confirmation">
                            </div>
                            <!-- <a href="#" class="button">
                              <span>Signup</span>
                              <i class="fa fa-check"></i>
                           </a> -->
                            <button type="submit" class="button">
                                <span>Signup</span>
                                <i class="fa fa-check"></i>
                            </button>
                        </form>
                        <p class="mt-20 mb-0">Don't have an account? <a href="{{route('login')}}"> Create one here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection


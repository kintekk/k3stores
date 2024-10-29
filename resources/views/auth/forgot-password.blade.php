
<x-guest-layout>
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <x-validation-errors class="mb-4 text-danger" />

                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        @if (session('error'))
                        <div class="mb-4 font-medium text-sm alert alert-danger">
                            {{ session('error') }}
                        </div>
                          @endif
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Forgot Password</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                <div class="form-group">
                                    <label> Email address *</label>
                                    <input type="email" class="form-control" name="email":value ="old('email')" id="username" required autofocus>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Password Reset Link" name="submit">
                                </form>
                            </div>
                           <div>Don't have an account? <a href="{{ route('register')}}"> Register now!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>

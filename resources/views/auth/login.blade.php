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
                        <x-validation-errors class="mb-4" />
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form action="" method="POST" action="{{ route('login') }}">
                                    @csrf
                                <div class="form-group">
                                    <label> Email address *</label>
                                    <input type="email" class="form-control" name="email":value ="old('email')" id="username" required autofocus>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" required autocomplete="current-password">
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="custom-checkbox" id="remember1" name="remember" >
                                </div>
                                <div>
                                    <label for="remember1">Remember me</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Last your password?</a>
                                @endif
                                </div>
                                <input type="submit" class="btn btn-primary" value="sign in" name="submit">
                                </form>
                            </div>
                           <div>Don't have an account? <a href="{{ route('register')}}"> Register now!</a></div>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>

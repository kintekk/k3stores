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
                    <li>Register/Login</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
              
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="" class="nav-link active">Sign Up</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-5">
                                <label> Name *</label>
                                <input type="text" class="form-control"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
                            </div>
                            <div class="form-group">
                                <label>Your email address *</label>
                                <input type="text" class="form-control"  id="email_1" name="email" :value="old('email')" required >
                            </div>
                            <div class="form-group mb-5">
                                <label>Password *</label>
                                <input  class="form-control" type="password" name="password" autocomplete="new-password"id="password_1" required>
                            </div>
                            <div class="form-group mb-5">
                                <label> Confirm Password *</label>
                                <input  class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            
                            <p>Your personal data will be used to support your experience 
                                throughout this website, to manage access to your account, 
                                and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                            <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                                <label for="remember" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                        <div>Already have an account? <a href="{{ route('login') }}">Login  here! </a></div>
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

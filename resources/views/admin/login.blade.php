@extends('admin.admin_login')

@section('title', 'Admin Login')

@section('auth')
    <div class="card">
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="text-center">
                    <h3 class="">Admin Login</h3>
                    </p>
                </div>
                <div class="form-body">
                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="inputEmailAddress" placeholder="Email Address">
                        </div>
                        <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter
                                Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" name="password" class="form-control border-end-0"
                                    id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;"
                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign
                                    in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

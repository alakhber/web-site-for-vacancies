@extends('layouts.auth')
@section('_content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{ route('auth.login') }}" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    @csrf
                    <span class="login100-form-title">
                        AzerTurkMedikal
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="İstifadəçi Adı Vəya E-Poçt Daxil Edin!">
                        <input class="input100" type="text" name="login" placeholder="İstifadəçi Adı Vəya E-Poçt">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Şifrəni Daxil Edin !">
                        <input class="input100" type="password" name="password" placeholder="Şifrə">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn p-t-13 p-b-23">
                        <button type="submit" class="login100-form-btn">
                            Daxil Ol
                        </button>
                    </div>
                    <div class="flex-col-c p-t-170 p-b-40">
                        <span class="txt1 p-b-9">
                            &copy; AzerTurk Medikal Bütün Hüquqlar Qorunur
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Alianza del Dr Rath para la Salud</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
@endsection

<!-- Contenido en el Body -->
@section('content')

<section class="promo-section section section-on-bg" style="margin-bottom: 45px;">
    <!--//Menu de Opciones-->
    @include('web.partials.header.menu')
    <!--//Menu de Opciones-->
</section>

<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<div class="container login_responsives">
    <div class="forms" style="margin-top: 25px;">
        <div class="form login" style="margin-bottom: 45px;">
            
            <div style="text-align: center;">
                <span class="title">Login</span>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-field">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        autofocus>
                    <i class="uil uil-envelope"></i>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-field">
                    <input id="password" type="password" class="form-control password" name="password" required>
                    <i class="uil uil-lock icon showHidePw"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="checkbox-text">
                    <a class="btn btn-link" href="#">
                        ¿Se te olvido la contraseña?
                    </a>
                </div>
                <div class="input-field button">
                    <input type="submit" value="ENTRAR">

                </div>
            </form>
        </div>

    </div>
</div>

<style type="text/css">
.container .form .title {
    position: relative;
    font-size: 27px;
    font-weight: 600;
}

.form .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    background-color: #4070f4;
    border-radius: 25px;
}

.form .input-field {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 30px;
}

.input-field input {
    position: absolute;
    height: 100%;
    width: 100%;
    padding: 0 35px;
    border: none;
    outline: none;
    font-size: 16px;
    border-bottom: 2px solid #ccc;
    border-top: 2px solid transparent;
    transition: border-bottom-color 0.4s ease;
}

.input-field input:is(:focus, :valid) {
    border-bottom-color: #4070f4;
}

.input-field i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    transition: color 0.4s ease;
}

.input-field input:is(:focus, :valid)~i {
    color: #4070f4;
}

.input-field i.icon {
    left: 0;
}

.input-field i.showHidePw {
    right: 0;
    cursor: pointer;
    padding: 10px;
}

.form .checkbox-text {
    /* display: flex; */
    text-align: right;
    justify-content: space-between;
    margin-top: 20px;
}

.checkbox-text .checkbox-content {
    display: flex;
    align-items: center;
}

.checkbox-content input {
    margin: 0 8px -2px 4px;
    accent-color: #4070f4;
}

.form .text {
    color: #333;
    font-size: 14px;
}

.form a.text {
    color: #4070f4;
    text-decoration: none;
}

.form a {
    text-decoration: none;
}

.form a:hover {
    text-decoration: underline;
}

.form .button {
    margin-top: 35px;
}

.form .button input {
    border: none;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    letter-spacing: 1px;
    border-radius: 6px;
    background-color: rgb(83 90 162);
    cursor: pointer;
    transition: all 0.6s ease;
}

.button input:hover {
    background-color: rgb(83 90 162);
}

.form .login-signup {
    margin-top: 30px;
    text-align: center;
}


.login_responsives{
    width: 30%;
    border: 1px ridge rgb(83 90 162);
    margin-bottom: 4rem;
}

@media (max-width: 767px) {
    .login_responsives{
        width: 90%;
        border: 1px ridge rgb(83 90 162);
        margin-bottom: 4rem;
    }
}

 



</style>
@endsection

@push('scripts')

<script type="text/javascript">
const  pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {

        pwFields.forEach(pwField => {
            if (pwField.type === "password") {
                pwField.type = "text";
                
                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            } else {
                pwField.type = "password";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }
        })
    })
})

</script>
@endpush


@section('footer_page')

@endsection
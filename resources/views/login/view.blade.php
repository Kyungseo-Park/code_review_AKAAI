@extends('layouts.app')

@section('title', ' - 로그인')

@section('content')
<style>
.login-container {
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1 {
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3 {
    text-align: center;
    color: #333;
}

.login-container form {
    padding: 10%;
}
.btnSubmit {
    width: 100%;
    height: 130%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}
</style>
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-8 col-10 login-form-1">
            <h3>관리자 로그인</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="이메일을 입력해주세요" value="" name="email" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="**********" value="" name="password"/>
                </div>
                <div class="form-group row pt-3">
                    <div class="col-12">
                        <input type="submit" class="btnSubmit" value="로그인"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('script')
    @if(Session::has('warning'))
    <script type="text/javascript">
        swal({
            title:'Warning',
            text:"{{Session::get('warning')}}",
            type:'warning',
            timer:5000
        }).then((value) => {
        }).catch(swal.noop);
    </script>
    @endif
@endsection
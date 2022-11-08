<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>EasyShop</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
        type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/admin/global/css/components-md.min.css" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="/assets/admin/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/admin/pages/css/login.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    @include('clients._partials.favicon')
</head>

<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        @if(config( 'app.client') === 'shopathome')
        <img style="width:200px;" src="{{ \EasyShop\Models\AdminSettings::getField('logo') }}" alt="logo" />
        @else
        <img src="{{ \EasyShop\Models\AdminSettings::getField('logo') }}" alt="logo" />
        @endif
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('admin.login.post')  }}" method="post">
            {{ csrf_field()  }}
            <h3 class="form-title font-green">Најава</h3>
            <div class="alert alert-danger display-hide" @if (count($errors)> 0) style="display: block;" @endif>
                <button class="close" data-close="alert"></button>
                <span> Внеси е-пошта и лозинка. </span>
            </div>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Е-Пошта</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                    placeholder="Е-Пошта" name="email" autofocus="" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Лозинка</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                    placeholder="Лозинка" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Најави се</button>
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1" />Запамети ме </label>
                {{--<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>--}}

            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        {{--<form class="forget-form" action="index.html" method="post">--}}
        {{--<h3 class="font-green">Forget Password ?</h3>--}}
        {{--<p> Enter your e-mail address below to reset your password. </p>--}}
        {{--<div class="form-group">--}}
        {{--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>--}}
        {{--<div class="form-actions">--}}
        {{--<button type="button" id="back-btn" class="btn btn-default">Back</button>--}}
        {{--<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    @if(config( 'app.client') === 'shopathome')
    <div class="copyright">
        {{ date('Y') }}
        © Kinderlend</div>
    @else
    <div class="copyright">
        {{ date('Y') }}
        © {{ \EasyShop\Models\AdminSettings::getField('titlepage')}} </div>
    @endif
    <!--[if lt IE 9]>
<script src="/assets/admin/global/plugins/respond.min.js"></script>
<script src="/assets/admin/global/plugins/excanvas.min.js"></script>
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="/assets/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="/assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript">
    </script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript">
    </script>
    <script src="/assets/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/assets/admin/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
<script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="/js/login.js" type="text/javascript"></script>


<form id="login-form" method="post">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
    <input type="text" name="email" id="email" />
    <input type="password" name="password" id="password">
    <button type="button" id="btn-login">LOGIN</button>
</form>
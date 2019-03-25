
<!-- BEGIN LOGO -->
<div class="logo">
    <h2 class="font-green"><b>HỆ THỐNG QUẢN LÝ TIỀM LỰC KHOA HỌC VÀ CÔNG NGHỆ</b></h2>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="" method="post">
        <h3 class="form-title font-green">Đăng ký</h3>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label>Tên đăng nhập</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="" name="username" /> </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="password" /> </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="confirmpassword" /> </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="" name="hoten" /> </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="" name="password" /> </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="password" /> </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="password" /> </div>

        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Đăng nhập</button>

            <a href="javascript:;" id="forget-password" class="forget-password">Quên mật khẩu?</a>
        </div>

        <div class="create-account">
            <p>
                <a href="<?= Yii::$app->homeUrl?>site/signup" id="register-btn" class="uppercase">Đăng ký</a>
            </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->

    <!-- END FORGOT PASSWORD FORM -->

</div>

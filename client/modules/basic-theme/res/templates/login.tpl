<div class="auth">
    <img  class="background">
    <div class="auth-container">
        <div class='welcome'>
            <img src="client/modules/basic-theme/images/login_logo.png">
        </div>
        <div class="card">
            <header class="auth-header">
                <div class="logo">
                    <img src="{{logoSrc}}">
                </div>
            </header>
            <div class="auth-content">
                <p class="text-center title-login">Welcome to <br> 
                    <span class="brand-name">Clinic plus</span>
                </p>
                <form id="login-form" onsubmit="return false;">
                    <div class="input-field">
                        <label for="field-username" class="label_form"><i class="icon_user"></i></label>
                        <input type="text" name="username" id="field-userName" class="form-control input-form"
                               autocapitalize="off" autocorrect="off" tabindex="1" autocomplete="username" placeholder="{{translate 'Enter username' scope='Globals' category='labels'}}">
                    </div>
                    <div class="input-field">
                        <label for="password" class="label_form"> <i class="icon_pass"></i></label>
                        <div class="field-password">
                            <input type="password" name="password" id="field-password" class="form-control input-form"
                                   tabindex="2" autocomplete="current-password" placeholder="{{translate 'Enter password' scope='Globals' category='labels'}}">
                            <img src="client/custom/modules/abb-theme/img/icons/iconEyes.png" data-action="showPassword"
                                 class="iconEyes">
                        </div>
                    </div>
                    <div class="form-group control-btn">
                        <button type="submit" id="btn-login" class="btn-login">{{translate 'Login' scope='Globals' category='labels'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

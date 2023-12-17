define(['views/login'], View => {
    "use strict";

    class Login extends View {
        /** @inheritDoc */
        template =  'basic-theme:login';

        afterRender() {
            super.afterRender();
            $('body').removeAttr('data-navbar').css('min-height', 'auto')
        }
    }
    return Login;
});

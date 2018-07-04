<div id="complaint-modal" class="modal">
    <div class="modal-content">
        <h5>ثبت شکلیت  جدید</h5>
        <p>
        <form  style="Width:90%" method="post"  action="{{route('user.login')}}">
            <input type="hidden" name="_token" value={{ Session::token() }}>
                   {{csrf_field()}}
                   <div id="login-page-offset">
            </div>

            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person prefix"></i>
                    <input id="email" name="email" type="text">
                    <label for="email" class="center-align">ایمیل آدرس</label>

                </div>
            </div>

            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock prefix"></i>
                    <input id="password" name="password" type="password">
                    <label for="password">پسورد</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button id="login-button" type="submit" class="btn waves-effect waves-light col s12" name="action" value="login">ورود به سیستم</button>
                </div>
            </div>
        </form>

        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">انصراف</a>
    </div>
</div>

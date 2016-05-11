<section class="main">
    <section class="homepage-header">
        <div class="wrapper-full">
            <div class="container top-section">
                <div class="main-content">
                    <div class="left">
                        <h1>
                            Learn and Fun, <br>
                            Together with Daboo!
                        </h1>
                        <h2>
                            Interactive way learning English.
                        </h2>
                        <form accept-charset="UTF-8" action="<?=base_url()?>registrations"
                              class="form-inline signup" id="new_user" method="post">
                            <input id="user_signup_form_name" name="signup_from" type="hidden"
                                   value="Homepage">
                            <input class="focus" autofocus="" id="user_email" name="username"
                                   placeholder="Your Nickname" size="30" type="text" value="">
                            <input id="user_birthdate" name="password" size="30"
                                   type="text" onfocus="(this.type='date')" placeholder="Your Birth Date">
                            <input class="" name="commit" type="submit" value="Create Account">

                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <p class="hint" style="display: none;"></p></form>
                    </div>
                    <div class="right">
                        <div class="browser">
                            <div class="crossbar">
                                <ul class="dots">
                                    <li class="red"></li>
                                    <li class="yellow"></li>
                                    <li class="green"></li>
                                </ul>
                            </div>
                            <div class="browser-content">
                                <iframe src="<?=base_url()?>assets/daboo_template/video/landing-video.html" height="440" width="687" frameborder="0" scrolling="no">
                                    Your browser dosen't support iframes.
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
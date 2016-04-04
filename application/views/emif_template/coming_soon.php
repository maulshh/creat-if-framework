<style>

    @import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700,300');

    .section-full {
        background: #070e1e url(http://hmif.ub.ac.id/assets/hmif-cover.jpg) no-repeat 0 -150px !important;
        background-size: 100%;
        font-family: "Open Sans";
        color: #fff;
    }
    #wrapper {
        width: 800px;
        margin: auto;
        padding-top: 80px;
    }
    #wrapper > img {
        margin: auto;
        width: 128px;
        display: block;
        margin-bottom: 180px;
    }
    #wrapper h1 {
        font-size: 28px;
        font-weight: 400;
        text-align: center;
        margin-bottom: 0;
    }
    #wrapper p {
        font-weight: 400;
        color: #aaa;
        text-align: center;
        margin-top: 0
    }
    #wrapper .footer {
        margin-top: 50px;
        width: 64px;
        margin: auto;
    }
    #wrapper .footer img {
        width: 24px;
        display: inline-block;
        margin: 0 2px;
    }

</style>
<div id="section-agenda" class="section section-full" style="margin-top: 0px">
    <div class="container">
        <div id="wrapper">
            <img src="http://hmif.ub.ac.id/assets/hmif.png">
            <h1><?=$page->title ?></h1>
            <p><?=$page->content ?></p>
            <div class="footer">
                <a href="https://www.facebook.com/hmif.ptiik.ub"><img src="http://hmif.ub.ac.id/assets/fb.png"></a>
                <a href="https://twitter.com/hmif_ptiikub"><img src="http://hmif.ub.ac.id/assets/twitter.png"></a>
            </div>
        </div>
    </div>
</div>

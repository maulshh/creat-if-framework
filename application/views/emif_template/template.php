<html>
    <head>
        <title><?=$pages?> | <?=SITE_TITLE?></title>
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets')?>/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets').'/'.TEMPLATE?>/css/style.css">
        <script type="text/javascript" src="<?=base_url('assets')?>/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets')?>/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?=base_url('assets').'/'.TEMPLATE?>/js/twitterFetcher_min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets').'/'.TEMPLATE?>/js/script.js"></script>
    </head>
    <body>
        <header id="header" class="navbar navbar-fixed-top" style="margin-bottom: 0px">
            <?=$header?>
        </header>
        <div id="body">
            <div id="section-slider" class="section section-full">
                <?=$content?>
            </div>
        </div>
        <?=$footer?>
    </body>
</html>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 120,
                header = $("header");
            if (distanceY > shrinkOn) {
                header.addClass("smaller");
            } else {
                if (header.hasClass("smaller")) {
                    header.removeClass("smaller");
                }
            }
        });
    }
    window.onload = init();
</script>
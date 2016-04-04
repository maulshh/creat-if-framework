<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-contact">
                    <div class="footer-contact-header">
                        <h3>Kontak Kami</h3>
                    </div>
                    <div class="footer-contact-body">
                        <strong>Sekretariat Himpunan Mahasiswa Informatika</strong>
                        <p>Gedung D1.1 PTIIK Universitas Brawijaya <br>
                            Jl. Veteran No. 8 Polinema <br>
                            Malang 65145, <br>
                            Indonesia</p>
                        <strong><span><i class="fa fa-phone"></i> 089-680-885-147 </span></strong>
                        <strong><span><i class="fa fa-envelope"></i> hmif.ptiik.ub@gmail.com </span></strong>
                    </div>
                    <div class="footer-contact-footer">
                        <a class="btn" href="https://www.facebook.com/hmif.ptiik.ub"><i class="fa fa-facebook"></i></a>
                        <a class="btn" href="https://twitter.com/hmif_ptiikub"><i class="fa fa-twitter"></i></a>
                        <a class="btn" href="<?=base_url('api')?>"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
                <div class="col-md-3 footer-menu">
                    <div class="footer-menu-header">
                        <h3>Site Menu</h3>
                    </div>
                    <div class="footer-menu-body">
                        <ul>
                            <?php foreach ($site_menus as $menu){?>
                                <li><a title="<?= $menu->title?>" href="<?= base_url($menu->uri)?>"><?= $menu->content?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-2 footer-twitter">
                    <div class="footer-twitter-header">
                        <h3>Latest Tweet</h3>
                    </div>
                    <div class="footer-twitter-body">
                        <div id="twitter-widget"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container">
            <p><i class="fa fa-copyright"></i> 2015 Himpunan Mahasiswa Informatika UB - All Rights Reserved</p>
            <ul>
                <li><a href="http://ub.ac.id">UB</a></li>
                <li><a href="http://filkom.ub.ac.id">FILKOM</a></li>
                <li><a href="http://bem.filkom.ub.ac.id">BEM TIIK</a></li>
                <li><a href="http://dpm.filkom.ub.ac.id">DPM TIIK</a></li>
            </ul>
        </div>
    </div>
</footer>
<div id="section-hmif" class="section section-full">
    <div class="container">
        <div class="section-header">
            <h1>
                <span class="hm">Himpunan Mahasiswa</span>
                Informatika
                <span class="ub">Universitas Brawijaya</span>
            </h1>
        </div>
        <div class="section-body"></div>
    </div>
</div>
<div id="section-intro" class="section section-full">
    <div class="container">
        <div class="row">
            <div class="inner col-md-10 col-md-offset-1">
                <div class="section-header">
                    <h1 class="section-header">Siapakah kami?</h1>
                </div>
                <div class="intro-content">
                    <div class="row">
                        <div class="col-md-8 himpunan">
                            <p>Himpunan Mahasiswa Informatika Program Teknologi Inforamsi &amp; Ilmu Komputer Universitas Brawijaya (HMIF PTIIK UB) adalah organisasi yang mewadahi, menaungi dan beranggotakan seluruh mahasiswa Informatika PTIIK UB. HMIF bertujuan untuk mewujudkan kedaulatan mahasiswa Informatika, mengembangkan kemampuan keprofesian dan non-keprofesian dan membentuk mahasiswa yang beriman dan bertakwa kepada Tuhan YME, memiliki wawasan yang luas, kecendekiawanan, integritas, kepribadian, kepedulian sosial</p>
                            <p>Dibawah naungan HMIF PTIIK UB terdapat dua lembaga pengurus yaitu Eksekutif Mahasiswa Informatika &amp; Badan Perwakilan Mahasiswa Informatika</p>
                            <a href="<?=base_url('apa-itu-hmif')?>" class="btn standard bordered">Selengkapnya</a>
                        </div>
                        <div class="col-md-4 lembaga">
                            <a href="<?=base_url('kami-emif')?>">
                                <h3>Eksekutif Mahasiswa</h3>
                                <p>Eksekutif Mahasiswa Informatika adalah lembaga yang memiliki fungsi sebagai badan eksekutif</p>
                            </a>
                            <a href="<?=base_url('bpmif')?>">
                                <h3>Badan Perwakilan Mahasiswa</h3>
                                <p>Badan Perwakilan Mahasiswa Informatika adalah lembaga yang memiliki fungsi sebagai badan legislatif</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="section-newsinfo" class="section section-full">
    <div class="container">
        <div id="block-news" class="col-md-8 block">
            <div class="block-header">
                <h3><span>Berita Terkini</span></h3>
            </div>
            <div class="block-body">
                <div class="row">
                    <div class="news-image col-md-6">
                        <a href="<?=base_url($news_post[0]->uri)?>">
                            <div class="news-image-wrapper">
                                <img src="<?=create_url($news_post[0]->thumbnail)?>" alt="<?=$news_post[0]->title?>">
                            </div>
                        </a>
                    </div>
                    <div class="news-content col-md-6">
                        <h4><a href="<?=base_url($news_post[0]->uri)?>"><?=$news_post[0]->title?></a></h4>
                        <p class="news-date"><?php $tgl = explode("-", substr($news_post[0]->created, 0, 10));
                            echo date('d M Y', mktime(0,0,0,$tgl[2],$tgl[0],$tgl[1]))?></p>
                        <p><?php echo $news_post[0]->preview; unset($news_post[0]);?></p>
                    </div>
                </div>
            </div>
            <div class="block-footer">
                <div class="row">
                    <?php foreach($news_post as $post){?>
                        <div class="col-md-6 news-small">
                            <div class="row">
                                <a href="<?=base_url($post->uri)?>">
                                    <div class="col-md-12"><h5><?=$post->title?></h5></div>
                                    <div class="col-md-5 news-small-img">
                                        <img src="<?=create_url($post->thumbnail)?>" alt="<?=$post->title?>">
                                    </div>
                                    <div class="col-md-7 news-small-content">
                                        <p><?=$post->preview?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a id="news-more" class="btn" href="<?=base_url('berita')?>">Berita Lainnya</a>
            </div>
        </div>
        <div id="block-info" class="col-md-3 col-md-offset-1 block">
            <div class="block-header">
                <h3>Informasi Terkini</h3>
            </div>
            <div class="block-body">
                <ul>
                    <?php foreach($informasi_post as $post){?>
                        <li class="info">
                            <div class="info-header">
                                <h4><a href="<?=base_url($post->uri)?>"><?=$post->title?></a></h4>
                            </div>
                            <div class="info-body">
                                <p><?=$post->preview?></p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="block-footer">
                <div class="box-slab"></div>
                <a id="info-more" class="" href="<?=base_url('informasi')?>">Informasi Lainnya</a>
            </div>
        </div>
    </div>
</div>
<div id="section-agenda" class="section section-full">
    <div class="container">
        <div class="col-md-8 block-agenda">
            <div class="block-header">
                <h3><span>Agenda Terdekat</span></h3>
            </div>
            <div class="block-body">
                <ul>
                    <?php foreach($event_post as $post){?>
                        <li class="agenda">
                            <a href="<?=base_url($post->uri)?>">
                                <div class="agenda-date">
                                    <div class="date">
                                        <?=$post->note?>
                                    </div>
                                </div>
                                <div class="agenda-content">
                                    <div class="content-header">
                                        <h4><?=$post->title?></h4>
                                    </div>
                                    <div class="content-body">
                                        <p><?=$post->preview?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="block-footer">
                <a id="" class="" href="<?=base_url('agenda')?>">Agenda Lainnya</a>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1 block-beasiswa">
            <div class="block-header">
                <h3>Informasi Beasiswa</h3>
            </div>
            <div class="block-body">
                <ul>
                    <?php foreach($beasiswa_post as $post){?>
                        <li>
                            <h4><a href="<?=base_url($post->uri)?>"><?=$post->title?></a></h4>
                            <span class="help-block"><i class="fa fa-calendar"></i> <?=$post->note?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="block-footer">
                <div class="box-slab"></div>
                <a class="" href="<?=base_url('beasiswa')?>">Semua Beasiswa</a>
            </div>
        </div>
    </div>
</div>
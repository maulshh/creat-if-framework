    <div class="container">
        <div class="navbar-header site-logo">
            <a href="<?php echo SITE_URL?>" class="navbar-brand">
                <img alt="HMIF" src="<?=base_url('assets')?>/images/logo.png">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navbar" aria-expanded="false" aria-controls="site-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="" role="navigation">
            <ul id="site-navbar" class="nav navbar-nav navbar-right navbar-collapse collapse">
			<?php
				$depth = 1;
				//print_r($menus);
				foreach ($menus as $menu){
					$pos = explode('-', $menu->position);
					if($depth > count($pos)){?>
					</ul>
				</li>
			<?php 	}
				$depth = count($pos);
				if($menu->uri != '#'){?>
				<li title="<?php echo $menu->title?>" <?php if($pages == $menu->content) echo 'class="active"'?>>
					<a href="<?php echo base_url($menu->uri);?>">
						<span><!-- <i class="fa fa-home"></i>  --><?php echo $menu->content?></span>
					</a>
				</li>
			<?php } else {?>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu->content?> <i class="fa fa-angle-down"></i></a>
					<ul class="dropdown-menu">
			<?php 	}
				}?>
            </ul>
        </nav>

		<!--menu side-bar-->
<!--		<div class="no-tablet-portrait no-phone">
			<span class="element-divider place-right"></span>
			<?php foreach ($side_menus as $menu){?>
				<a title="<?=$menu->title?>" href="<?=base_url($menu->uri)?>" class="element place-right"><span class="<?=$menu->content?>"><?=$menu->note?></span></a>
				<span class="element-divider place-right"></span>
			<?php }?>
		</div>-->
	</div>

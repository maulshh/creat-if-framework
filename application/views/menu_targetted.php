<?php $depth = 1;
foreach ($menus as $menu){
$pos = explode('-', $menu->position);
while ($depth > count($pos)){?>
                </ul>
            </li>
            <?php $depth--;
}
$depth = count($pos);
if($menu->uri == ''){?>
    <li><?= $menu->content?> :separator &nbsp; &nbsp; -
        <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position.'~'.$menu->note;?>
        <a href="#" onclick="edit('<?= $value?>')">edit</a>
        <a href="<?= base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
    </li>
<?php } else if($menu->uri != '#'){?>
    <li title="<?= $menu->title?>">
        <span><?= $menu->content?></span> &nbsp; &nbsp; -
        <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position.'~'.$menu->note;?>
        <a href="#" onclick="edit('<?= $value?>')">edit</a> &nbsp;
        <a href="<?= base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
    </li>
<?php } else {?>
<li>
            <span>
                <?= $menu->content?>
            </span> &nbsp; &nbsp; -
    <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position.'~'.$menu->note;?>
    <a href="#" onclick="edit('<?= $value?>')">edit</a>
    <a href="<?= base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
    <ul>
        <?php }
        }?>

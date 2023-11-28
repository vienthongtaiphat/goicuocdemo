<?php
include "ajax_config.php";
function phantrang_ajax_more($spcon,$cur_p,$total_p,$tab_return,$page_per,$table_select,$type_select,$where_select,$id_danhmuc,$id_list='') {
    $str_page = '<div class="btn_viewmore">';
    $str_page .= '<a class="'.$class.'" data-page="'.($cur_p+1).'" data-tab="'.($tab_return).'" data-per="'.($page_per).'" data-table="'.($table_select).'" data-type="'.($type_select).'" data-where="'.($where_select).'"  data-danhmuc="'.($id_danhmuc).'" data-list="'.($id_list).'">'.xemthem.' '.$spcon.' '.sanpham.'</a>';
    $str_page .= '</div>';
    return $str_page;
}
function phantrang_ajax($cur_p,$total_p,$tab_return,$page_per,$table_select,$type_select,$where_select,$id_danhmuc,$id_list='') {
    $str_page = '<ul class="paging-sm pagination">';
    for ($i=1; $i<=$total_p; $i++) {
        $class = ($i == $cur_p) ? 'active' : '';
        $str_page .= '<li class="page-item"><a class="page-link '.$class.'" data-page="'.($i).'" data-tab="'.($tab_return).'" data-per="'.($page_per).'" data-table="'.($table_select).'" data-type="'.($type_select).'" data-where="'.($where_select).'"  data-danhmuc="'.($id_danhmuc).'" data-list="'.($id_list).'">'.$i.'</a></li>';
    };
    $str_page .= '</ul>';
    return $str_page;
}
$id_danhmuc = (int)$_POST['id_danhmuc'];
$id_list = (int)$_POST['id_list'];
$page_per = (int)$_POST['page_per'];
$table_select = (string)$_POST['table_select'];
$type_select = (string)$_POST['type_select'];
$where_select = (string)$_POST['where_select'];
$tab_return = (string)$_POST['tab_return'];
$page = (string)$_POST['page'];
$viewmore = (int)$_POST['viewmore'];
if ($page < 1) {
    $page = 1;
}
$limit = $page_per;
$start = ($limit * $page) - $limit;
if($id_danhmuc) $where_tmp .= " and id_list = " . $id_danhmuc;
if($id_list) $where_tmp .= " and id_cat = " . $id_list;
$where = "hienthi=1 and type='$type_select' $where_select $where_tmp order by stt,id desc";
$text_sql = "select * from table_$table_select where $where limit $start,$limit";
$text_sql2 = "select count(id) as dem from table_product where $where";
$count_num = $d->rawQueryOne($text_sql2);
$page_count = ceil($count_num['dem'] / $page_per);
$product = $d->rawQuery($text_sql);
$spcon = ceil($count_num['dem'] - (count($product) * $page));
?>
<?php if($product) { ?>
<?php if($type_select=='san-pham') { ?>
<?php include "../templates/layout/product_item.php"; ?>
<?php } ?>
<?php } else { ?>
<div class="text-center block">
    <strong><?=khongtimthayketqua?></strong>
</div>
<?php } ?>
<?php if($page_count>1) { ?>
<?php if($viewmore==1) { ?>
<?php if($page<$page_count) { ?>
<?=phantrang_ajax_more($spcon,$page,$page_count,$tab_return,$page_per,$table_select,$type_select,$where_select,$id_danhmuc,$id_list)?>
<?php } ?>
<?php } else { ?>
<?=phantrang_ajax($page,$page_count,$tab_return,$page_per,$table_select,$type_select,$where_select,$id_danhmuc,$id_list)?>
<?php } ?>
<?php } ?>
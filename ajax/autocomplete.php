<?php
	include "ajax_config.php";
	$keyword = (isset($_POST['keyword']) && $_POST['keyword'] != '') ? htmlspecialchars($_POST['keyword']) : '';
	$ketquatim = $d->rawQuery("select * from #_product where (ten$lang LIKE ?) and type = 'san-pham' order by stt,id desc, ngaytao desc limit 10",array("%$keyword%"));
?>
<?php if(!empty($ketquatim)) { ?>
<ul class="list-unstyled m-0 p-0">
	<?php foreach ($ketquatim as $key => $value) { ?>
	<li class="list-unstyled">
		<a href="<?=$value['tenkhongdau'.$lang]?>">
			<i class="fal fa-search"></i><?=$value['ten'.$lang]?>
		</a>
	</li>
	<?php } ?>
</ul>
<?php } else { ?>
<div><?=khongtimthayketqua?></div>
<?php } ?>
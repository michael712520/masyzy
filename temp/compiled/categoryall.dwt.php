<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<?php if ($this->_var['cat_style']): ?>
<link href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>
 <?php echo $this->smarty_insert_scripts(array('files'=>'common.js,compare.js')); ?>
</head>
<body>
	<?php echo $this->fetch('library/page_header.lbi'); ?>
	<div class="block">
		<h2 class="cpzs">
			<a href="categoryall.php?id=0">商品展示</a>
		</h2>
	</div>
	<div class="block clearfix">
		
		<div class="box">
			<div class="box_1">
				<div class="good_list_title"><?php echo $this->_var['lang']['goods_filter']; ?></div>
				<div class="good_list_box clearfix">
					<div class="g_l_b_l"><?php echo $this->_var['lang']['all_category']; ?>：</div>
					<div class="g_l_b_r">
						<span>全部</span>
						<?php $_from = $this->_var['topcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>

						<a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>&nbsp;

						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
				<?php if ($this->_var['brands']['1']): ?>
				<div class="good_list_box clearfix">
					<div class="g_l_b_l"><?php echo $this->_var['lang']['brand']; ?>：</div>
					<div class="g_l_b_r">
						<?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
						<?php if ($this->_var['brand']['selected']): ?>
						<span><?php echo $this->_var['brand']['brand_name']; ?></span>
						<?php else: ?>
						<a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a>&nbsp;
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if ($this->_var['price_grade']['1']): ?>
				<div class="good_list_box clearfix">
					<div class="g_l_b_l"><?php echo $this->_var['lang']['price']; ?>：</div>
					<div class="g_l_b_r">
						<a href="categoryall.php?id=0&amp;price_min=0&amp;price_max=1000000">全部</a>&nbsp;

						<a href="categoryall.php?id=0&amp;price_min=0&amp;price_max=50">50元以下</a>&nbsp;
						<a href="categoryall.php?id=0&amp;price_min=50&amp;price_max=100">50-100</a>&nbsp;
						<a href="categoryall.php?id=0&amp;price_min=100&amp;price_max=200">100-200</a>&nbsp;
						<a href="categoryall.php?id=0&amp;price_min=200&amp;price_max=300">200-300</a>&nbsp;
						<a href="categoryall.php?id=0&amp;price_min=300&amp;price_max=400">300-400</a>&nbsp;
						<a href="categoryall.php?id=0&amp;price_min=400&amp;price_max=500">400-500</a>&nbsp;
						<a
							href="categoryall.php?id=0&amp;price_min=500&amp;price_max=1000">500-1000</a>&nbsp;
						<a
							href="categoryall.php?id=0&amp;price_min=1000&amp;price_max=1000000">1000以上</a>&nbsp;
					</div>
				</div>
				<?php endif; ?>
				<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_92293600_1502327447');$this->_foreach['filter_na'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_na']['total'] > 0):
    foreach ($_from AS $this->_var['filter_attr_0_92293600_1502327447']):
        $this->_foreach['filter_na']['iteration']++;
?>
				<div class="good_list_box clearfix"
					<?php if (($this->_foreach['filter_na']['iteration'] == $this->_foreach['filter_na']['total'])): ?>style="border-bottom: none;"<?php endif; ?>>
					<div class="g_l_b_l"><?php echo htmlspecialchars($this->_var['filter_attr_0_92293600_1502327447']['filter_attr_name']); ?>：</div>
					<div class="g_l_b_r">
						<?php $_from = $this->_var['filter_attr_0_92293600_1502327447']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
						<?php if ($this->_var['attr']['selected']): ?>
						<span><?php echo $this->_var['attr']['attr_value']; ?></span>
						<?php else: ?>
						<a href="<?php echo $this->_var['attr']['url']; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a>&nbsp;
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</div>
		
		
		<?php echo $this->fetch('library/goods_listall.lbi'); ?>
		<?php echo $this->fetch('library/pages.lbi'); ?>
		
	</div>

	<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

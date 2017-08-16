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
<div class="block"><h2 class="cpzs"><a href="categorycx.php?id=0">促销活动</a></h2></div>
<div class="block clearfix">
	 
	  <div class="box">
		 <div class="box_1">
			<div class="good_list_title">促销筛选</div>
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
			<?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
				<?php if ($this->_var['grade']['selected']): ?>
				<span><?php echo $this->_var['grade']['price_range']; ?></span>
				<?php else: ?>
				<a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a>&nbsp;
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
			</div>
			<?php endif; ?>
			<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_47098700_1502354893');$this->_foreach['filter_na'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_na']['total'] > 0):
    foreach ($_from AS $this->_var['filter_attr_0_47098700_1502354893']):
        $this->_foreach['filter_na']['iteration']++;
?>
      <div class="good_list_box clearfix" <?php if (($this->_foreach['filter_na']['iteration'] == $this->_foreach['filter_na']['total'])): ?>style="border-bottom:none;"<?php endif; ?>>
			<div class="g_l_b_l"><?php echo htmlspecialchars($this->_var['filter_attr_0_47098700_1502354893']['filter_attr_name']); ?>：</div>
            <div class="g_l_b_r">
			<?php $_from = $this->_var['filter_attr_0_47098700_1502354893']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
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
	 
   
<?php echo $this->fetch('library/goods_listcx.lbi'); ?>
<?php echo $this->fetch('library/pages.lbi'); ?>

</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

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

<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.js,compare.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?> <?php echo $this->fetch('library/ur_here.lbi'); ?>
<div class="block clearfix"> 
  <?php if ($this->_var['action'] == "form"): ?> 
  
  <div class="box">
    <div class="box_1">
      <h3><span><?php echo $this->_var['lang']['advanced_search']; ?></span></h3>
      <div class="boxCenterList">
        <form action="search.php" method="get" name="advancedSearchForm" id="advancedSearchForm">
          <table border="0" align="center" cellpadding="3">
            <tr>
              <td valign="top"><?php echo $this->_var['lang']['keywords']; ?>：</td>
              <td><input name="keywords" id="keywords" type="text" size="40" maxlength="120" class="inputBg" value="<?php echo $this->_var['adv_val']['keywords']; ?>" />
                <label for="sc_ds">
                  <input type="checkbox" name="sc_ds" value="1" id="sc_ds" <?php echo $this->_var['scck']; ?> />
                  <?php echo $this->_var['lang']['sc_ds']; ?></label>
                <br />
                <?php echo $this->_var['lang']['searchkeywords_notice']; ?> </td>
            </tr>
            <tr>
              <td><?php echo $this->_var['lang']['category']; ?>：</td>
              <td><select name="category" id="select" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['all_category']; ?></option>
                  
                  <?php echo $this->_var['cat_list']; ?>
                
                </select></td>
            </tr>
            <tr>
              <td><?php echo $this->_var['lang']['brand']; ?>：</td>
              <td><select name="brand" id="brand" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['all_brand']; ?></option>
                  
                  
            <?php echo $this->html_options(array('options'=>$this->_var['brand_list'],'selected'=>$this->_var['adv_val']['brand'])); ?>
          
                
                </select></td>
            </tr>
            <tr>
              <td><?php echo $this->_var['lang']['price']; ?>：</td>
              <td><input name="min_price" type="text" id="min_price" class="inputBg" value="<?php echo $this->_var['adv_val']['min_price']; ?>" size="10" maxlength="8" />
                -
                <input name="max_price" type="text" id="max_price" class="inputBg" value="<?php echo $this->_var['adv_val']['max_price']; ?>" size="10" maxlength="8" /></td>
            </tr>
            <?php if ($this->_var['goods_type_list']): ?>
            <tr>
              <td><?php echo $this->_var['lang']['extension']; ?>：</td>
              <td><select name="goods_type" onchange="this.form.submit()" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
                  
                  
            <?php echo $this->html_options(array('options'=>$this->_var['goods_type_list'],'selected'=>$this->_var['goods_type_selected'])); ?>
          
                
                </select></td>
            </tr>
            <?php endif; ?> 
            <?php if ($this->_var['goods_type_selected'] > 0): ?> 
            <?php $_from = $this->_var['goods_attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?> 
            <?php if ($this->_var['item']['type'] == 1): ?>
            <tr>
              <td><?php echo $this->_var['item']['attr']; ?>：</td>
              <td colspan="3"><input name="attr[<?php echo $this->_var['item']['id']; ?>]" value="<?php echo $this->_var['item']['value']; ?>" class="inputBg" type="text" size="20" maxlength="120" /></td>
            </tr>
            <?php endif; ?> 
            <?php if ($this->_var['item']['type'] == 2): ?>
            <tr>
              <td><?php echo $this->_var['item']['attr']; ?>：</td>
              <td colspan="3"><input name="attr[<?php echo $this->_var['item']['id']; ?>][from]" class="inputBg" value="<?php echo $this->_var['item']['value']['from']; ?>" type="text" size="5" maxlength="5" />
                -
                <input name="attr[<?php echo $this->_var['item']['id']; ?>][to]" value="<?php echo $this->_var['item']['value']['to']; ?>"  class="inputBg" type="text" maxlength="5" /></td>
            </tr>
            <?php endif; ?> 
            <?php if ($this->_var['item']['type'] == 3): ?>
            <tr>
              <td><?php echo $this->_var['item']['attr']; ?>：</td>
              <td colspan="3"><select name="attr[<?php echo $this->_var['item']['id']; ?>]" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['all_option']; ?></option>
                  
                  
            <?php echo $this->html_options(array('options'=>$this->_var['item']['options'],'selected'=>$this->_var['item']['value'])); ?>
          
                
                </select></td>
            </tr>
            <?php endif; ?> 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            <?php endif; ?> 
            
            <?php if ($this->_var['use_storage'] == 1): ?>
            <tr>
              <td>&nbsp;</td>
              <td><label for="outstock"><input type="checkbox" name="outstock" value="1" id="outstock" <?php if ($this->_var['outstock']): ?>checked="checked"<?php endif; ?>/> <?php echo $this->_var['lang']['hidden_outstock']; ?></label></td>
            </tr>
            <?php endif; ?>
            
            <tr>
              <td colspan="4" align="center"><input type="hidden" name="action" value="form" />
                <input type="submit" name="Submit" class="bnt_blue_1" value="<?php echo $this->_var['lang']['button_search']; ?>" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <div class="blank5"></div>
  <?php endif; ?> 
  
  <?php if (isset ( $this->_var['goods_list'] )): ?>
  <div class="box">
    <div class="goods_zs_table goods_search_table"> 
       
      <?php if ($this->_var['intromode'] == 'best'): ?> 
      <span><?php echo $this->_var['lang']['best_goods']; ?></span> 
      <?php elseif ($this->_var['intromode'] == 'new'): ?> 
      <span><?php echo $this->_var['lang']['new_goods']; ?></span> 
      <?php elseif ($this->_var['intromode'] == 'hot'): ?> 
      <span><?php echo $this->_var['lang']['hot_goods']; ?></span> 
      <?php elseif ($this->_var['intromode'] == 'promotion'): ?> 
      <span><?php echo $this->_var['lang']['promotion_goods']; ?></span> 
      <?php else: ?> 
      <span><?php echo $this->_var['lang']['search_result']; ?></span> 
      <?php endif; ?> 
      <?php if ($this->_var['goods_list']): ?>
      <form action="search.php" method="post" class="goods_search_form clearfix" name="listform" id="form">
        <a href="javascript:;" onClick="javascript:display_mode('grid')" style="display:none;"><img src="themes/ecmoban_jindong2013/images/display_mode_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['grid']; ?>"></a>
        <select name="sort" class="search_form_1">
          
            
              <?php echo $this->html_options(array('options'=>$this->_var['lang']['sort'],'selected'=>$this->_var['pager']['search']['sort'])); ?>
              
          
        </select>
        <select name="order" class="search_form_1">
          
            
              <?php echo $this->html_options(array('options'=>$this->_var['lang']['order'],'selected'=>$this->_var['pager']['search']['order'])); ?>
              
          
        </select>
        <input type="image" name="imageField" src="themes/ecmoban_jindong2013/images/bnt_go.gif" alt="go" class="search_form_1" style="margin-top: 6px;"/>
        <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
        <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
        <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> 
        <?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?>
        <?php if ($this->_var['key'] == 'keywords'): ?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo urldecode($this->_var['item']); ?>" />
        <?php else: ?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
        <?php endif; ?>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </form>
      <?php endif; ?> 
    </div>
   
    <?php if ($this->_var['goods_list']): ?>
    
    <form action="compare.php" method="post" name="compareForm" id="compareForm" onsubmit="return compareGoods(this);">
      <?php if ($this->_var['pager']['display'] == 'list'): ?>
      <div class="goodsList"> 
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?> 
        <?php if ($this->_var['goods']['goods_id']): ?> 
        <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
        <li class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a></li>
        <li class="goodsName">
          <div class="div_name"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6"> 
            <?php if ($this->_var['goods']['goods_style_name']): ?> 
            <?php echo $this->_var['goods']['goods_style_name']; ?><br />
            <?php else: ?> 
            <?php echo $this->_var['goods']['goods_name']; ?><br />
            <?php endif; ?> 
            </a> 
            <?php if ($this->_var['goods']['goods_brief']): ?> 
            <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
            <?php endif; ?> 
          </div>
          <div> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" ><img src="themes/ecmoban_jindong2013/images/goumai.gif"></a> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);"><img src="themes/ecmoban_jindong2013/images/shoucang.gif"></a> </div>
        </li>
        <li class="action"> 
          <?php if ($this->_var['show_marketprice']): ?> 
          <?php echo $this->_var['lang']['market_price']; ?><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
          <?php endif; ?> 
          <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
          <?php echo $this->_var['lang']['promote_price']; ?><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
          <?php else: ?> 
          <?php echo $this->_var['lang']['shop_price']; ?><font class="shop"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
          <?php endif; ?> 
        </li>
        </ul>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      </div>
      <?php elseif ($this->_var['pager']['display'] == 'grid'): ?>
      
      <div class="clearfix goodsBox" style="border:none; padding:11px 0 10px 5px;"> 
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?> 
        <?php if ($this->_var['goods']['goods_id']): ?>
        <div class="goodsItem_zs">
         <?php if ($this->_var['goods']['is_best']): ?>
     <div class="goodsItem_best"></div>
	 <?php elseif ($this->_var['goods']['is_hot']): ?>
     <div class="goodsItem_hot"></div>
	 <?php elseif ($this->_var['goods']['is_new']): ?>  
     <div class="goodsItem_new"></div>
     <?php endif; ?>
           <div class="goodsItem_zs_img"><a href="<?php echo $this->_var['goods']['url']; ?>" class="goodsItem_zs_1"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="goodsimg_zs" /></a></div>
           <p><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></p>
            <?php if ($this->_var['goods']['promote_price'] != ""): ?>
           <font class="shop_zs"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
            <?php else: ?>
           <font class="shop_zs"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
            <?php endif; ?>
        </div>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      </div>
      
      <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
      <div class="goodsList">
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?> 
      <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
      <li style="margin-right:15px;"> <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo addslashes($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="f6"><?php echo $this->_var['lang']['compare']; ?></a> </li>
      <li class="goodsName">
        <div class="div_name"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6 f5"> 
          <?php if ($this->_var['goods']['goods_style_name']): ?> 
          <?php echo $this->_var['goods']['goods_style_name']; ?><br />
          <?php else: ?> 
          <?php echo $this->_var['goods']['goods_name']; ?><br />
          <?php endif; ?> 
          </a> 
          <?php if ($this->_var['goods']['goods_brief']): ?> 
          <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
          <?php endif; ?> 
        </div>
        <div> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="bnt_blue">加入收藏</a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="bnt_blue">立即购买</a> </div>
      </li>
      <li> 
        <?php if ($this->_var['show_marketprice']): ?> 
        <?php echo $this->_var['lang']['market_price']; ?><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
        <?php endif; ?> 
        <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
        <?php echo $this->_var['lang']['promote_price']; ?><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
        <?php else: ?> 
        <?php echo $this->_var['lang']['shop_price']; ?><font class="shop"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
        <?php endif; ?> 
      </li>
      <li class="action"> </li>
      </ul>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      
      <?php endif; ?>
    </form>
    <script type="text/javascript">
        <?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

				<?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['key'] != 'button_compare'): ?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php else: ?>
        var button_compare = '';
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


        var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
        window.onload = function()
        {
          Compare.init();
          fixpng();
        }
	var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
	var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
	var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
        </script> 
    <?php else: ?>
    <div style="padding:20px 0px; text-align:center" class="f5" ><?php echo $this->_var['lang']['no_search_result']; ?></div>
    <?php endif; ?> 
<div class="blank"></div>
<?php echo $this->fetch('library/pages.lbi'); ?> 
<?php endif; ?>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

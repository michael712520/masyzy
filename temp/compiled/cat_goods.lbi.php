<div class="box ct_goods">
    <div class="itemTit" id="itemNew">
  <div class="ctg_title clearfix">
    <div class="ctg_title_l">
   <?php echo htmlspecialchars($this->_var['goods_cat']['name']); ?>
   </div>
     <div class="ctg_title_r"> 
    <a href="<?php echo $this->_var['goods_cat']['url']; ?>" >更多&gt;&gt;</a>
     </div>
   </div>
   </div>
    <div class="ct_content clearfix">
    <div class="ct_content_l">
 		<ul>
 		  <?php $_from = $this->_var['goods_cat']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'children');if (count($_from)):
    foreach ($_from AS $this->_var['children']):
?>
 		  <li><a href="category.php?id=<?php echo $this->_var['children']['cat_id']; ?>"><?php echo $this->_var['children']['cat_name']; ?></a></li>
 		   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
      <?php $_from = $this->_var['goods_cat']['isbestgood']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'isbest');if (count($_from)):
    foreach ($_from AS $this->_var['isbest']):
?>
        <a href="<?php echo $this->_var['isbest']['url']; ?>"><img src="<?php echo $this->_var['isbest']['goods_thumb']; ?>" width="188" height="188" style="margin-top:30px"></a>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <div class="clearfix ct_content_r" style="border:none;">
      <?php $_from = $this->_var['cat_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_51972900_1503064212');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_51972900_1503064212']):
?>
      <div class="ct_content_item">
           <a href="<?php echo $this->_var['goods_0_51972900_1503064212']['url']; ?>"><img src="<?php echo $this->_var['goods_0_51972900_1503064212']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_51972900_1503064212']['name']); ?>" class="ct_content_img" /></a><br />
           <p class="ct_content_p"><a href="<?php echo $this->_var['goods_0_51972900_1503064212']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_51972900_1503064212']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods_0_51972900_1503064212']['name']); ?></a></p>
           <?php if ($this->_var['goods_0_51972900_1503064212']['promote_price'] != ""): ?>
          <font class="ct_content_pr"><?php echo $this->_var['goods_0_51972900_1503064212']['promote_price']; ?></font>
          <?php else: ?>
          <font class="ct_content_pr"><?php echo $this->_var['goods_0_51972900_1503064212']['shop_price']; ?></font>
          <?php endif; ?>
        </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    </div>
 
</div>

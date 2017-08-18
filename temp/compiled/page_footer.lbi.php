<div class="go-top">
<a></a>
</div>
	<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>
<div class="blank"></div><div class="blank"></div>
<div class="es_w"><a href=""><img src="themes/ecmoban_jindong2013/images/ad_all.png" alt="广告"></a></div>
<div class="blank"></div>
<div class="blank"></div>
<div class="es_w foot_up">
<?php if ($this->_var['helps']): ?>
  <div class="helpTitBg clearfix foot_up_1">
<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['num'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['num']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['num']['iteration']++;
?>
<dl <?php if (($this->_foreach['num']['iteration'] == $this->_foreach['num']['total'])): ?>style="border-right: none;"<?php endif; ?>>
  <dt class="foot_dt<?php echo $this->_foreach['num']['iteration']; ?>"><a href='<?php echo $this->_var['help_cat']['cat_id']; ?>' title="<?php echo $this->_var['help_cat']['cat_name']; ?>">
 <?php echo $this->_var['help_cat']['cat_name']; ?></a></dt>
 <dd>
 <ul>
  <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
  <li class="foot_li"><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></li>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
  </dd>
</dl>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
<?php endif; ?>
 
<div id="bottomNav" class="box">
  <div class="links clearfix"> 
 
<?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
    <?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><img src="<?php echo $this->_var['link']['logo']; ?>" alt="<?php echo $this->_var['link']['name']; ?>" border="0" /></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
    <?php if ($this->_var['txt_links']): ?>
    <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    [<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>]
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
<?php endif; ?> 
 </div>
</div> 

 </div>

<div id="footer">
 <div class="text">
 <?php echo $this->_var['copyright']; ?><br />
 <?php echo $this->_var['shop_address']; ?> <?php echo $this->_var['shop_postcode']; ?>
 <?php if ($this->_var['service_phone']): ?>
      Tel: <?php echo $this->_var['service_phone']; ?>
 <?php endif; ?>
 <?php if ($this->_var['service_email']): ?>
      E-mail: <?php echo $this->_var['service_email']; ?><br />
 <?php endif; ?>
 <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_33872400_1503036626');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_33872400_1503036626']):
?>
      <?php if ($this->_var['im_0_33872400_1503036626']): ?>
      <a href="http://wpa.qq.com/msgrd?V=1&amp;uin=<?php echo $this->_var['im_0_33872400_1503036626']; ?>&amp;Site=<?php echo $this->_var['shop_name']; ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->_var['im_0_33872400_1503036626']; ?>:4" height="16" border="0" alt="QQ" /> <?php echo $this->_var['im_0_33872400_1503036626']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_33883700_1503036626');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_33883700_1503036626']):
?>
      <?php if ($this->_var['im_0_33883700_1503036626']): ?>
      <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im_0_33883700_1503036626']); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo urlencode($this->_var['im_0_33883700_1503036626']); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $this->_var['im_0_33883700_1503036626']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ym']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_33891800_1503036626');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_33891800_1503036626']):
?>
      <?php if ($this->_var['im_0_33891800_1503036626']): ?>
      <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $this->_var['im_0_33891800_1503036626']; ?>n&.src=pg" target="_blank"><img src="themes/ecmoban_jindong2013/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $this->_var['im_0_33891800_1503036626']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['msn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_33902500_1503036626');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_33902500_1503036626']):
?>
      <?php if ($this->_var['im_0_33902500_1503036626']): ?>
      <img src="themes/ecmoban_jindong2013/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo $this->_var['im_0_33902500_1503036626']; ?>"><?php echo $this->_var['im_0_33902500_1503036626']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['skype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im_0_33909800_1503036626');if (count($_from)):
    foreach ($_from AS $this->_var['im_0_33909800_1503036626']):
?>
      <?php if ($this->_var['im_0_33909800_1503036626']): ?>
      <img src="http://mystatus.skype.com/smallclassic/<?php echo urlencode($this->_var['im_0_33909800_1503036626']); ?>" alt="Skype" /><a href="skype:<?php echo urlencode($this->_var['im_0_33909800_1503036626']); ?>?call"><?php echo $this->_var['im_0_33909800_1503036626']; ?></a>
      <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><br />
  <?php if ($this->_var['icp_number']): ?>
  <?php echo $this->_var['lang']['icp_number']; ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a><br />
  <?php endif; ?>
  <div style="width:1px ; height:1px; overflow:hidden">
  <?php $_from = $this->_var['lang']['p_y']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pv');if (count($_from)):
    foreach ($_from AS $this->_var['pv']):
?><?php echo $this->_var['pv']; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
    <?php if ($this->_var['stats_code']): ?>
    <div align="left"><?php echo $this->_var['stats_code']; ?></div>
    <?php endif; ?>
        
       
       <div class="blank"></div>
       
 </div>
</div>

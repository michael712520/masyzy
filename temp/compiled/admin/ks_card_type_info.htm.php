<!-- $Id: bonus_type_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<?php echo $this->fetch('pageheader.htm'); ?>
<div class="main-div">
<form action="ks_card.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table width="100%">
  <tr>
    <td class="label">类型名称</td>
    <td>
      <input type='text' name='type_name' maxlength="30" value="<?php echo $this->_var['bonus_arr']['cat_name']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">
      <a href="javascript:showNotice('Type_money_a');" title="<?php echo $this->_var['lang']['form_notice']; ?>">
      <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>"></a>类型标识</td>
    <td>
    <input type="text" name="type_mark" value="<?php echo $this->_var['bonus_arr']['cat_mark']; ?>" size="20" />
    <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="Type_money_a">类型标识是礼品卡序号前缀.例:某个礼品卡序号为:PPOK332255,那么PPOK可能是类型标识.用来通过标识直观获取礼品卡类型,方便使用与管理.</span>    </td>
  </tr>
  <tr>
    <td class="label"><a href="javascript:showNotice('NoticeMinGoodsAmount');" title="<?php echo $this->_var['lang']['form_notice']; ?>"> <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>" /></a>类型描述</td>
    <td><textarea name="type_desc" type="text" rows="3" cols="20"><?php echo $this->_var['bonus_arr']['cat_desc']; ?></textarea>
    <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="NoticeMinGoodsAmount">礼品卡类型注释,便于记忆.</span> </td>
  </tr>
 <tr>
    <td class="label"><a href="javascript:showNotice('SelNum');" title="<?php echo $this->_var['lang']['form_notice']; ?>"> <img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $this->_var['lang']['form_notice']; ?>" /></a>可选择量</td>
    <td><input name="type_num" type="text" value="<?php echo $this->_var['bonus_arr']['cat_sgn']; ?>" maxlength="2" size="20" />
    <br /><span class="notice-span" <?php if ($this->_var['help_open']): ?>style="display:block" <?php else: ?> style="display:none" <?php endif; ?> id="SelNum">礼品5选几,4选几.</span> </td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
      <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
      <input type="hidden" name="type_id" value="<?php echo $this->_var['bonus_arr']['cat_id']; ?>" />    </td>
  </tr>
</table>
</form>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>

<script language="javascript">
<!--
document.forms['theForm'].elements['type_name'].focus();
/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("type_name",      "类型名为空");
  validator.required("type_mark",      "标识为空");
  validator.required("type_num",       "可选量为空");
  validator.isNumber("type_num",       "可选量必须是数字", true);

  return validator.passed();
}
onload = function()
{
  
  get_value = '<?php echo $this->_var['bonus_arr']['send_type']; ?>';
  

  showunit(get_value)
  // 开始检查订单
  startCheckOrder();
}
/* 红包类型按订单金额发放时才填写 */
function gObj(obj)
{
  var theObj;
  if (document.getElementById)
  {
    if (typeof obj=="string") {
      return document.getElementById(obj);
    } else {
      return obj.style;
    }
  }
  return null;
}

function showunit(get_value)
{
  gObj("1").style.display =  (get_value == 2) ? "" : "none";
  document.forms['theForm'].elements['selbtn1'].disabled  = (get_value != 1 && get_value != 2);
  document.forms['theForm'].elements['selbtn2'].disabled  = (get_value != 1 && get_value != 2);

  return;
}
//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>

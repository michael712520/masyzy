<!-- $Id: bonus_type_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<?php echo $this->fetch('pageheader.htm'); ?>
<div class="main-div">
<form action="ks_card.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table width="100%">
	<tr>
    <td class="label">编号</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_id' maxlength="30" value="<?php echo $this->_var['order']['order_id']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">订单号</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_sn' maxlength="30" value="<?php echo $this->_var['order']['order_sn']; ?>" size='20' />    </td>
  </tr>
   <tr>
    <td class="label">礼品卡分类</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_goodcatid' maxlength="30" value="<?php echo $this->_var['order']['order_goodcatid']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">联系人</td>
    <td>
      <input type='text' name='order_user' maxlength="30" value="<?php echo $this->_var['order']['order_user']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">联系地址</td>
    <td>
      <input type='text' name='order_address' maxlength="30" value="<?php echo $this->_var['order']['order_address']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">联系电话</td>
    <td>
      <input type='text' name='order_tel' maxlength="30" value="<?php echo $this->_var['order']['order_tel']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">移动电话</td>
    <td>
      <input type='text' name='order_phone' maxlength="30" value="<?php echo $this->_var['order']['order_phone']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">特殊要求备注</td>
    <td>
      <input type='text' name='order_bak' maxlength="30" value="<?php echo $this->_var['order']['order_bak']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">配送时间</td>
    <td>
      <input type='text' name='shipping_time' maxlength="30" value="<?php echo $this->_var['order']['shipping_time']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">订单创建时间</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_time' maxlength="30" value="<?php echo $this->_var['order']['order_time']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">订单状态</td>
    <td>
      <input disabled="true"　readOnly="true" type='text' name='order_status' maxlength="30" value="<?php echo $this->_var['order']['order_status']; ?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="修改" class="button" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
      <input type="hidden" name="id" value="<?php echo $this->_var['order']['order_id']; ?>" />
    </td>
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
  validator.required("order_user",         "联系人为空");
  validator.required("order_address",      "联系地址为空");
  validator.required("order_tel",          "联系电话为空");

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

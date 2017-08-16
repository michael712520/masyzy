<!-- $Id: bonus_type_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->

<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<?php echo $this->fetch('pageheader.htm'); ?>
<div class="main-div">
<form action="ks_card.php" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
<table width="100%">
  <tr>
    <td class="label">初始序号</td>
    <td>
      <input type='text' name='bnum' maxlength="30" value="0" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">生成数量</td>
    <td>
      <input type='text' name='cnum' maxlength="30" value="10" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="生成" class="button" />
      <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
      <input type="hidden" name="tid" value="<?php echo $this->_var['type_id']; ?>" />
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
  validator.required("bnum",         "序号为空");
  validator.required("cnum",      "数量为空");

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

<!-- $Id: goods_list.htm 15908 2009-05-05 09:22:04Z liuhui $ -->

<?php if ($this->_var['full_page']): ?>
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>

<!-- 商品搜索 -->
<div class="form-div">
  <form action="javascript:searchGoods()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <?php if ($_GET['act'] != "trash"): ?>
    <!-- 分类 -->
    <select name="cat_id"><option value="0">所有分类</option><?php echo $this->_var['cat_list']; ?></select>
    <!-- 品牌 -->
    <select name="brand_id"><option value="0">所有品牌</option><?php echo $this->html_options(array('options'=>$this->_var['brand_list'])); ?></select>
    <!-- 推荐 -->
    <select name="intro_type"><option value="0">全部</option><?php echo $this->html_options(array('options'=>$this->_var['intro_list'],'selected'=>$_GET['intro_type'])); ?></select>
    <?php endif; ?>
    <!-- 关键字 -->
    关键字 <input type="text" name="keyword" size="15" />
    <input type="hidden" name="tid" value="<?php echo $this->_var['type_id']; ?>" />
    <input type="submit" value="搜索" class="button" />
  </form>
</div>


<script language="JavaScript">
    function searchGoods()
    {

        <?php if ($_GET['act'] != "trash"): ?>
        listTable.filter['cat_id'] = document.forms['searchForm'].elements['cat_id'].value;
        listTable.filter['brand_id'] = document.forms['searchForm'].elements['brand_id'].value;
        listTable.filter['intro_type'] = document.forms['searchForm'].elements['intro_type'].value;
        <?php endif; ?>

        listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['page'] = 1;
        listTable.filter['tid'] = document.forms['searchForm'].elements['tid'].value;
        listTable.loadList();
    }
</script>

<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
  <div class="list-div" id="listDiv">
<?php endif; ?>
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
     编号
    </th>
    <th>商品名称</th>
    <th>货号</th>
    <th>价格</th>
    <?php if ($this->_var['use_storage']): ?>
    <th>库存</th>
    <?php endif; ?>
    <th>操作</th>
  <tr>
  <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <tr>
    <td><?php echo $this->_var['goods']['goods_id']; ?></td>
    <td class="first-cell" style="<?php if ($this->_var['goods']['is_promote']): ?>color:red;<?php endif; ?>"><a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></td>
    <td><?php echo $this->_var['goods']['goods_sn']; ?></td>
    <td align="right"><?php echo $this->_var['goods']['shop_price']; ?></td>
    <?php if ($this->_var['use_storage']): ?>
    <td align="right"><?php if ($this->_var['code'] == 'virtual_card'): ?><?php echo $this->_var['goods']['goods_number']; ?><?php else: ?><?php echo $this->_var['goods']['goods_number']; ?><?php endif; ?></td>
    <?php endif; ?>
    <td align="center">
      <a href="ks_card_goods.php?act=addgood&id=<?php echo $this->_var['goods']['goods_id']; ?>&tid=<?php echo $this->_var['type_id']; ?>">设置关联</a>
    </td>
  </tr>
  <?php endforeach; else: ?>
  <tr><td class="no-records" colspan="10"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
  <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
<!-- end goods list -->

<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
    <?php echo $this->fetch('page.htm'); ?>
    </td>
  </tr>
</table>

<?php if ($this->_var['full_page']): ?>
</div>

</form>

<script type="text/javascript">
  listTable.recordCount = <?php echo $this->_var['record_count']; ?>;
  listTable.pageCount = <?php echo $this->_var['page_count']; ?>;

  <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
  listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  
  onload = function()
  {
    startCheckOrder(); // 开始检查订单
    document.forms['listForm'].reset();
  }

  /**
   * @param: bool ext 其他条件：用于转移分类
   */
  function confirmSubmit(frm, ext)
  {
      if (frm.elements['type'].value == 'trash')
      {
          return confirm(batch_trash_confirm);
      }
      else if (frm.elements['type'].value == 'not_on_sale')
      {
          return confirm(batch_no_on_sale);
      }
      else if (frm.elements['type'].value == 'move_to')
      {
          ext = (ext == undefined) ? true : ext;
          return ext && frm.elements['target_cat'].value != 0;
      }
      else if (frm.elements['type'].value == '')
      {
          return false;
      }
      else
      {
          return true;
      }
  }

  function changeAction()
  {
      var frm = document.forms['listForm'];

      // 切换分类列表的显示
      frm.elements['target_cat'].style.display = frm.elements['type'].value == 'move_to' ? '' : 'none';

      if (!document.getElementById('btnSubmit').disabled &&
          confirmSubmit(frm, false))
      {
          frm.submit();
      }
  }

</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
<?php endif; ?>
<?php if (!defined('THINK_PATH')) exit();?><thead>
<tr>
    <th><input name="" type="checkbox" value="" checked="checked"/></th>
    <th>编号<i class="sort"></i></th>
    <th>订单号</th>
    <th>用户</th>
    <th>订单状态</th>
    <th>订单时间</th>
    <th>成交额</th>
    <th>操作</th>
</tr>
</thead>
<tbody>
<?php if(is_array($res)): foreach($res as $k=>$val): ?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($val[order_id]); ?></td>
        <td><?php echo ($val[order_number]); ?></td>
        <td><?php echo ($val[member_name]); ?></td>
        <td><?php echo ($val[order_status_name]); ?></td>
        <td><?php echo (date('Y-m-d H:m:s',$val[order_addtime])); ?></td>
        <td><?php echo ($val[goods_price]); ?></td>
        <td>
            <input name="oid"  type="hidden" value="<?php echo ($val[order_id]); ?>">
            <a href="javascript:void (0)"  class="tablelink" data-id="<?php echo ($val[order_status]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/>
                <?php echo ($val[admin_option]); ?>
            </a>
            <a href="#" class="tablelink" data-id="<?php echo ($val[order_id]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/> 删除
            </a></td>
    </tr><?php endforeach; endif; ?>
</tbody>
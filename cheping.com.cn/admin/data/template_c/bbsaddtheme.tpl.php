<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
        <div class="user">
            <div class="nav">
                <ul>
                    <? if ($fid) { ?>
                    <li><a href="<?=$php_self?>EditForum&fid=<?=$fid?>">返回编辑论坛</a></li>
                    <? } else { ?>
                    <li><a href="<?=$php_self?>ForumsList">返回</a></li>
                    <? } ?>
                    <li><a href="<?=$php_self?>AddTheme<? if ($tid) { ?>&tid=<?=$tid?><? } ?>"  class="song"><? if (!$tid) { ?>添加<? } else { ?>编辑<? } ?>论坛主题</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-con">
                <div class="user-table">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="td_right"  width="200px;" >
                                    <span>论坛主题名称 ：</span>
                                </td>
                                <td  class="td_left">
                                    <? if ($list['tid']) { ?><input type="hidden" name="tid" value="<?=$list['tid']?>" /><? } ?>
                                    <input type="text" style="border:1px solid #cdcdcd;  background:none;" name="name" id="name" size="20" value="<?=$list['name']?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right">论坛类型 ：</td>
                                <td class="td_left">
                                    <select name="fid" id="fid" >
                                        <? if ($forum_list) { ?>
                                        <? foreach((array)$forum_list as $k=>$v) {?>
                                        <option <? if ($list['fid']==$v[fid]) { ?>selected="selected"<? } ?> value="<?=$v[fid]?>"><?=$v[name]?></option>
                                        <?}?>
                                        <? } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right">阅读权限 ：</td>
                                <td class="td_left">
                                    <select name="readperm" id="readperm" >
                                        <option <? if ($list['readperm']==0 || !$list['readperm']) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['readperm']==1) { ?>selected="selected"<? } ?> value="1">是</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" >是否开启高亮 ：</td>
                                <td class="td_left">
                                    <select name="highlight" id="highlight" >
                                        <option <? if ($list['highlight']==0 || !$list['highlight']) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['highlight']==1) { ?>selected="selected"<? } ?> value="1">是</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" >是否开启精华 ：</td>
                                <td class="td_left">
                                    <select name="digest" id="digest" >
                                        <option <? if ($list['digest']==0) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['digest']==1 || !$list['digest']) { ?>selected="selected"<? } ?> value="1">是</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" >是否开启评分 ：</td>
                                <td class="td_left">
                                    <select name="rate" id="rate" >
                                        <option <? if ($list['rate']==0 || !$list['rate']) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['rate']==1) { ?>selected="selected"<? } ?> value="1">是</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" > 特殊主题 ：</td>
                                <td class="td_left">
                                    <select name="special" id="special" >
                                        <option <? if ($list['special']==0 || !$list['special']) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['special']==1) { ?>selected="selected"<? } ?> value="1">投票</option>
                                        <option <? if ($list['special']==2) { ?>selected="selected"<? } ?> value="2">商品</option>
                                        <option <? if ($list['special']==3) { ?>selected="selected"<? } ?> value="3">悬赏</option>
                                        <option <? if ($list['special']==4) { ?>selected="selected"<? } ?> value="4">辩论</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" > 是否有回帖置顶 ：</td>
                                <td class="td_left">
                                    <select name="stickreply" id="stickreply" >
                                        <option <? if ($list['stickreply']==0 ) { ?>selected="selected"<? } ?> value="0">否</option>
                                        <option <? if ($list['stickreply']==1 || !$list['stickreply']) { ?>selected="selected"<? } ?> value="1">是</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right">
                                    <span>显示顺序 ：</span>
                                </td>
                                <td  class="td_left">
                                    <input type="text" style="border:1px solid #cdcdcd;  background:none; " name="displayorder" id="displayorder" size="10" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="5" value="<? if ($list['displayorder']) { ?><? if ($list['displayorder']>=10) { ?>默认<? } else { ?><?=$list['displayorder']?><? } ?><? } else { ?>默认<? } ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right">状态 ：</td>
                                <td class="td_left">
                                    <select name="status" id="status" >
                                        <option <? if ($list['status']==0 || !$list['status']) { ?>selected="selected"<? } ?> value="0">正常</option>
                                        <option <? if ($list['status']==1) { ?>selected="selected"<? } ?> value="1">隐藏</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right">
                                    <button class="tijiao" id="btn" name="btn">提 交</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<script type="text/javascript">
    $(function() {
        $('#btn').click(function () {
            if (!$('#name').val()) {
                alert('论坛主题名称没有填写');
                return false;
            } else {
                $('#article_form').submit();
            }
        });
    });
</script>
</body>
</html>

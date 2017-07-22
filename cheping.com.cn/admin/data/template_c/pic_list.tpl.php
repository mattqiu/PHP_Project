<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<style type="text/css">
    .water{ width:200px;height:200px; 
            color:#333333;
            border-width: 1px;
            border-color: #ccc;
            border-collapse: collapse;}

    .water td{border-width: 1px;
              padding: 8px;
              border-style: solid;
              border-color: #ccc;
              text-align:center;
    } 
</style>
<div class="user">
    <div class="nav">
        <ul>
            <li><a href="<?=$php_self?>list" class="song">水印处理</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <form action="<?=$php_self?>List" method="post" enctype="multipart/form-data">
        <div class="issue-con">
            <div class="con1-table">
                <table>
                    <tr>
                        <td><span>ams水印预览: <img style="background:#000;" src="<?=$local?><?=$list['waterpic']?>" style="width:294px;height:100px"></span></td>
                    </tr>  
                    <tr>
                    <input type='hidden' name="waterpic" value="<?=$list['waterpic']?>">
                        <td>ams水印上传: <input type="file" name="waterpic"/></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="watstate" value="1" <? if ($list['watstate']==1) { ?>checked<? } ?>/>是
                            <input type="radio" name="watstate" value="0" <? if ($list['watstate']==0) { ?>checked<? } ?>/>否
                        </td>
                    </tr>
                    <tr>
                        <td>ams水印位置:
                            <table class="water">
                                <tr>
                                    <td><input type="radio" name="watermark" value="0" <? if ($list['watermark']==0) { ?>checked<? } ?>/>左上</td>
                                    <td><input type="radio" name="watermark" value="5" <? if ($list['watermark']==5) { ?>checked<? } ?>/>上中</td>
                                    <td><input type="radio" name="watermark" value="1" <? if ($list['watermark']==1) { ?>checked<? } ?>/>右上</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="watermark" value="6" <? if ($list['watermark']==6) { ?>checked<? } ?>/>左中</td>
                                    <td><input type="radio" name="watermark" value="4" <? if ($list['watermark']==4) { ?>checked<? } ?>/>正中</td>
                                    <td><input type="radio" name="watermark" value="7" <? if ($list['watermark']==7) { ?>checked<? } ?>/>右中</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="watermark" value="2" <? if ($list['watermark']==2) { ?>checked<? } ?>/>左下</td>
                                    <td><input type="radio" name="watermark" value="8" <? if ($list['watermark']==8) { ?>checked<? } ?>/>下中</td>
                                    <td><input type="radio" name="watermark" value="3" <? if ($list['watermark']==3) { ?>checked<? } ?>/>右下</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td><span>微信水印预览: <img style="background:#000;" src="<?=$local?><?=$list['wxwaterpic']?>" style="width:294px;height:100px"></span></td>
                    </tr>                                                                    
                    <tr>
                        <input type='hidden' name="wxwaterpic" value="<?=$list['wxwaterpic']?>">
                        <td>微信水印上传: <input type="file" name="wxwaterpic"/></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="wxstate" value="1" <? if ($list['wxstate']==1) { ?>checked<? } ?>/>是
                            <input type="radio" name="wxstate" value="0" <? if ($list['wxstate']==0) { ?>checked<? } ?>/>否
                        </td>
                    </tr>
                    <tr>
                        <td>微信水印位置:
                            <table class="water">
                                <tr>
                                    <td><input type="radio" name="wxwatermark" value="0" <? if ($list['wxwatermark']==0) { ?>checked<? } ?>/>左上</td>
                                    <td><input type="radio" name="wxwatermark" value="5" <? if ($list['wxwatermark']==5) { ?>checked<? } ?>/>上中</td>
                                    <td><input type="radio" name="wxwatermark" value="1" <? if ($list['wxwatermark']==1) { ?>checked<? } ?>/>右上</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="wxwatermark" value="6" <? if ($list['wxwatermark']==6) { ?>checked<? } ?>/>左中</td>
                                    <td><input type="radio" name="wxwatermark" value="4" <? if ($list['wxwatermark']==4) { ?>checked<? } ?>/>正中</td>
                                    <td><input type="radio" name="wxwatermark" value="7" <? if ($list['wxwatermark']==7) { ?>checked<? } ?>/>右中</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="wxwatermark" value="2" <? if ($list['wxwatermark']==2) { ?>checked<? } ?>/>左下</td>
                                    <td><input type="radio" name="wxwatermark" value="8" <? if ($list['wxwatermark']==8) { ?>checked<? } ?>/>下中</td>
                                    <td><input type="radio" name="wxwatermark" value="3" <? if ($list['wxwatermark']==3) { ?>checked<? } ?>/>右下</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="con2-table">
                <div class="con2-table-left">
                    <table>
                        <tr>
                            <td  class="tijiao" ><button class="tijiaocoad">提 交</button></td>
                            <td  class="baocun"><button type="button" class="baocuncoad" onclick="articlelogs(1)">批量生成图片</button></td>
                        </tr>
                    </table>
                </div> 
            </div> 
            <div class="clear"></div>
        </div>
    </form>
</div>
<script type="text/javascript">
    function articlelogs(i) {
        $.ajax({
            type: "POST",
            url: "<?=$php_self?>Waterpic",
            data: "i=" + i,
            success: function (msg) {
                if (msg == 'no') {
                    alert("水印生成失败");
                } else {
                    alert("水印生成成功");
                }
            }
        });
    }
</script>
</body>
</html>
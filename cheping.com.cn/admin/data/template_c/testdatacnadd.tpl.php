<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
            <li><a href="<?=$php_self?>">测试数据列表</a></li>
            <li><a href="<?=$php_self?>add<? if ($id) { ?>&id=<?=$id?><? } ?>" class="song"><?=$switch?>测试数据</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="issue-con">
        <div class="con1-table">
            <form action="<?=$php_self?>add<? if ($id) { ?>&id=<?=$id?><? } ?>" method="post" name="frm_comment" id="form_data">
                <table >
                    <tr>
                        <td>
                            <? if (!$id) { ?>
                            <select name="brand_id" id="brand_id">
                                <option value="">请选择品牌</option>
                                <? foreach((array)$brand as $k=>$v) {?>
                                <option value="<?=$v[brand_id]?>" ><?=$v[brand_name]?></option>
                                <?}?>
                            </select>
                            <select name="factory_id" id="factory_id">
                                <option value="">请选择厂商</option>
                            </select>
                            <select name="series_id" id="series_id">
                                <option value="">请选择车系</option>
                            </select>
                            <select name="model_id" id="model_id">
                                <option value="">请选择车款</option>
                                <option value="">选择手动填写</option>
                            </select>
                            <span style="display:none;" id="manually_model">车款名称: <input type="text" style="width:220px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="model_name_m" id="model_name_m" size="40" value="" /></span>
                            <input type="hidden" id="brand_name" name="brand_name" value=""/>
                            <input type="hidden" id="factory_name" name="factory_name" value=""/>
                            <input type="hidden" id="series_name" name="series_name" value=""/>
                            <input type="hidden" id="model_name" name="model_name" value=""/>
                            <? } else { ?>
                            <span>品牌:<span style="margin-left: 10px;color:#000;"><?=$data['brand_name']?></span></span>
                            <span style="margin-left: 40px;">厂商:<span style="margin-left: 10px;color:#000;"><?=$data['factory_name']?></span></span>
                            <span style="margin-left: 40px;">车系:<span style="margin-left: 10px;color:#000;"><?=$data['series_name']?></span></span>
                            <span style="margin-left: 40px;">车款:<span style="margin-left: 10px;color:#000;"><?=$data['model_name']?></span></span>
                            <input type="hidden" id="id" name="id" value="<?=$id?>"/>
                            <input type="hidden" id="model_name" name="model_name" value="<?=$data['model_name']?>"/>
                            <input type="hidden" name="event" value="edit"/>
                            <? } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>马力: <input type="text" style="width:120px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="car_hs" id="car_hs" size="40" value="<? if ($data['car_hs']) { ?><?=$data['car_hs']?><? } ?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>指导价（万元）: <input type="text" style="width:120px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="price" id="price"  size="40" value="<?=$data['price']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>发动机位置、驱动形式: <input type="text" style="width:120px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="drive" id="drive" size="40" value="<?=$data['drive']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>类别: <input type="text" style="width:130px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="class" id="class" size="40" value="<?=$data['class']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>序号: <input type="text" style="width:50px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="number" id="number" size="40" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')"  value="<? if ($data['number']) { ?><?=$data['number']?><? } ?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>重量:&nbsp;&nbsp;&nbsp;&nbsp;净重<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="w[]" size="15" value="<?=$data[w][0]?>" /></span> kg
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span>前 / 后<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="w[]" size="15" value="<?=$data[w][1]?>" /></span> kg
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>加速:&nbsp;&nbsp;&nbsp;&nbsp;0 - 10m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s0" size="15" value="<?=$data[s][0]?>" /></span> s
                            <span style="margin-left:20px;">0 - 20m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s1" size="15" value="<?=$data[s][1]?>" /></span> s
                            <span style="margin-left:20px;">0 - 30m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s2" size="15" value="<?=$data[s][2]?>" /></span> s
                            <span style="margin-left:20px;">0 - 40m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s3" size="15" value="<?=$data[s][3]?>" /></span> s
                            <span style="margin-left:20px;">0 - 50m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s4" size="15" value="<?=$data[s][4]?>" /></span> s
                            <span style="margin-left:20px;">0 - 60m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s5" size="15" value="<?=$data[s][5]?>" /></span> s<br />
                            <span style="margin-left:42px;">0 - 70m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s6" size="15" value="<?=$data[s][6]?>" /></span> s
                            <span style="margin-left:20px;">0 - 80m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s7" size="15" value="<?=$data[s][7]?>" /></span> s
                            <span style="margin-left:20px;">0 - 90m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s8" size="15" value="<?=$data[s][8]?>" /></span> s
                            <span style="margin-left:20px;">0 - 100m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s9" size="15" value="<?=$data[s][9]?>" /></span> s
                            <span style="margin-left:20px;">0 - 110m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s10" size="15" value="<?=$data[s][10]?>" /></span> s
                            <span style="margin-left:20px;">0 - 120m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s11" size="15" value="<?=$data[s][11]?>" /></span> s<br />
                            <span style="margin-left:42px;">0 - 130m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s12" size="15" value="<?=$data[s][12]?>" /></span> s
                            <span style="margin-left:20px;">0 - 140m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s13" size="15" value="<?=$data[s][13]?>" /></span> s
                            <span style="margin-left:20px;">0 - 150m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s14" size="15" value="<?=$data[s][14]?>" /></span> s
                            <span style="margin-left:20px;">0 - 160m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s15" size="15" value="<?=$data[s][15]?>" /></span> s
                            <span style="margin-left:20px;">0 - 170m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s16" size="15" value="<?=$data[s][16]?>" /></span> s
                            <span style="margin-left:20px;">0 - 180m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s17" size="15" value="<?=$data[s][17]?>" /></span> s<br />
                            <span style="margin-left:42px;">0 - 190m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s18" size="15" value="<?=$data[s][18]?>" /></span> s
                            <span style="margin-left:20px;">0 - 200m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s19" size="15" value="<?=$data[s][19]?>" /></span> s<br />
                            <span style="margin-left:42px;">400m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s20" size="15" value="<?=$data[s][20]?>" /></span> s
                            <span style="margin-left:10px;">公里数<input type="text" style="width:55px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s21" size="15" value="<?=$data[s][21]?>" /></span> km
                            <span style="margin-left:42px;">800m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s22" size="15" value="<?=$data[s][22]?>" /></span> s
                            <span style="margin-left:10px;">公里数<input type="text" style="width:55px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s23" size="15" value="<?=$data[s][23]?>" /></span> km
                            <span style="margin-left:42px;">1000m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s24" size="15" value="<?=$data[s][24]?>" /></span> s
                            <span style="margin-left:10px;">公里数<input type="text" style="width:55px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s25" size="15" value="<?=$data[s][25]?>" /></span> km<br />
                            <span style="margin-left:42px;">4/5/6挡  60-100m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s26" size="15" value="<?=$data[s][26]?>" /></span> s
                            <span style="margin-left:30px;">4/5/6挡  80-120m<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="s[]" id="s27" size="15" value="<?=$data[s][27]?>" /></span> s
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>刹车(100 - 0):&nbsp;&nbsp;&nbsp;&nbsp;1<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][0]?>" /></span>
                            <span style="margin-left:20px;">2<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][1]?>" /></span>
                            <span style="margin-left:20px;">3<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][2]?>" /></span>
                            <span style="margin-left:20px;">4<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][3]?>" /></span>
                            <span style="margin-left:20px;">5<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][4]?>" /></span>
                            <span style="margin-left:20px;">6<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][5]?>" /></span><br />
                            <span style="margin-left:90px;">7<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][6]?>" /></span>
                            <span style="margin-left:20px;">8<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][7]?>" /></span>
                            <span style="margin-left:20px;">9<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][8]?>" /></span>
                            <span style="margin-left:20px;">10<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="b[]" size="15" value="<?=$data[b][9]?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>冷刹车:&nbsp;&nbsp;&nbsp;&nbsp;100 - 0<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="cold_brake" size="15" value="<?=$data['cold_brake']?>" /></span> M
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>刹车:&nbsp;&nbsp;&nbsp;&nbsp;5、6次平均 (100 - 0)<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="brake_5" size="15" value="<?=$data['brake_5']?>" /></span> M
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>刹车热衰减:&nbsp;&nbsp;(100 - 0)<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hot_brake" size="15" value="<?=$data['hot_brake']?>" /></span> M
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>刹车盘温度:&nbsp;&nbsp;&nbsp;&nbsp;左前<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="bd[]" size="15" value="<?=$data['bd'][0]?>" /></span>
                            <span style="margin-left:20px;">右前<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="bd[]" size="15" value="<?=$data['bd'][1]?>" /></span>
                            <span style="margin-left:20px;">左后<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="bd[]" size="15" value="<?=$data['bd'][2]?>" /></span>
                            <span style="margin-left:20px;">右后<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="bd[]" size="15" value="<?=$data['bd'][3]?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>绕桩ESP On:&nbsp;&nbsp;(18m)<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="esp_on_18" size="15" value="<?=$data['esp_on_18']?>" /></span> km/h
                            <span style="margin-left:20px;">绕桩ESP Off:<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="esp_off_18" size="15" value="<?=$data['esp_off_18']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>安全变线:&nbsp;&nbsp;(110m)<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="security_wire" size="15" value="<?=$data['security_wire']?>" /></span> km/h
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>绕桩ESP On:&nbsp;&nbsp;(110m)<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="esp_on_100" size="15" value="<?=$data['esp_on_100']?>" /></span> km/h
                            <span style="margin-left:20px;">绕桩ESP Off:<input type="text" style="width:60px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="esp_off_100" size="15" value="<?=$data['esp_off_100']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>转速:&nbsp;&nbsp;&nbsp;&nbsp;低速</span>
                            <span style="margin-left:30px;">2<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][0]?>" /></span>
                            <span style="margin-left:20px;">3<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][1]?>" /></span>
                            <span style="margin-left:20px;">4<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][2]?>" /></span>
                            <span style="margin-left:20px;">5<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][3]?>" /></span>
                            <span style="margin-left:20px;">6<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][4]?>" /></span>
                            <span style="margin-left:20px;">7<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][5]?>" /></span>
                            <span style="margin-left:20px;">8<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ls[]" size="15" value="<?=$data['ls'][6]?>" /></span><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="margin-left:42px;">高速</span>
                            <span style="margin-left:30px;">1<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][0]?>" /></span>
                            <span style="margin-left:20px;">2<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][1]?>" /></span>
                            <span style="margin-left:20px;">3<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][2]?>" /></span>
                            <span style="margin-left:20px;">4<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][3]?>" /></span>
                            <span style="margin-left:20px;">5<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][4]?>" /></span>
                            <span style="margin-left:20px;">6<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][5]?>" /></span>
                            <span style="margin-left:20px;">7<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][6]?>" /></span><br />
                            <span style="margin-left:100px;">8<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][7]?>" /></span>
                            <span style="margin-left:20px;">9<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="hs[]" size="15" value="<?=$data['hs'][8]?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>公里差:</span>
                            <span style="margin-left:20px;">50<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][0]?>" /></span> km/h
                            <span style="margin-left:20px;">80<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][1]?>" /></span> km/h
                            <span style="margin-left:20px;">100<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][2]?>" /></span> km/h
                            <span style="margin-left:20px;">120<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][3]?>" /></span> km/h
                            <span style="margin-left:20px;">130<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][4]?>" /></span> km/h
                            <span style="margin-left:20px;">140<input type="text" style="width:45px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="pk[]" size="15" value="<?=$data['pk'][5]?>" /></span> km/h
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>噪声:</span>
                            <span style="margin-left:20px;">静止<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][0]?>" /></span> dB(A)
                            <span style="margin-left:20px;">50<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][1]?>" /></span> dB(A)
                            <span style="margin-left:20px;">80<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][2]?>" /></span> dB(A)
                            <span style="margin-left:20px;">100<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][3]?>" /></span> dB(A)<br />
                            <span style="margin-left:50px;">120<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][4]?>" /></span> dB(A)
                            <span style="margin-left:20px;">130<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][5]?>" /></span> dB(A)
                            <span style="margin-left:20px;">140<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][6]?>" /></span> dB(A)
                            <span style="margin-left:20px;">160<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="n[]" size="15" value="<?=$data[n][7]?>" /></span> dB(A)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>车内尺寸 ( mm ):</span><br />
                            <span style="margin-left:60px;">普通轿车</span>
                            <span style="margin-left:40px;">内宽</span>
                            <span style="margin-left:20px;">前<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][0]?>" /></span>
                            <span style="margin-left:20px;">中<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][1]?>" /></span>
                            <span style="margin-left:20px;">后<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][2]?>" /></span><br />
                            <span style="margin-left:152px;">内高</span>
                            <span style="margin-left:20px;">前<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][3]?>" /></span>
                            <span style="margin-left:20px;">中<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][4]?>" /></span>
                            <span style="margin-left:20px;">后<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][5]?>" /></span><br />
                            <span style="margin-left:152px;">座深</span>
                            <span style="margin-left:20px;">前<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][6]?>" /></span>
                            <span style="margin-left:20px;">中<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][7]?>" /></span>
                            <span style="margin-left:20px;">后<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][8]?>" /></span><br />
                            <span style="margin-left:152px;">前排<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][9]?>" /></span>
                            <span style="margin-left:20px;">后排<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][10]?>" /></span>
                            <span style="margin-left:20px;">第三排<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sn[]" size="15" value="<?=$data['sn'][11]?>" /></span><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="margin-left:60px;">两厢、旅行车及厢型车后排测量</span>
                            <span style="margin-left:20px;">最小长度 上<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][0]?>" /></span>
                            <span style="margin-left:20px;">下<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][1]?>" /></span><br />
                            <span style="margin-left:251px;">最大长度 上<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][2]?>" /></span>
                            <span style="margin-left:20px;">下<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][3]?>" /></span><br />
                            <span style="margin-left:251px;">厢内最大宽度<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][4]?>" /></span>
                            <span style="margin-left:20px;">厢内最小宽度<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][5]?>" /></span><br />
                            <span style="margin-left:251px;">厢内最大高度<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][6]?>" /></span>
                            <span style="margin-left:20px;">厢内最小高度<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][7]?>" /></span><br />
                            <span style="margin-left:251px;">轮罩的距离<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][8]?>" /></span>
                            <span style="margin-left:20px;">开后厢至地距离<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][9]?>" /></span><br />
                            <span style="margin-left:251px;">底边至地距离<input type="text" style="width:100px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="sov[]" size="15" value="<?=$data['sov'][10]?>" /></span><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>转弯直径:</span>
                            <span style="margin-left:20px;">左<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="t[]" size="15" value="<?=$data[t][0]?>" /></span> m
                            <span style="margin-left:20px;">右<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="t[]" size="15" value="<?=$data[t][1]?>" /></span> m
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>方向盘圈数:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="t[]" size="15" value="<?=$data[t][2]?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>方向盘直径:</span>
                            <span style="margin-left:20px;">中<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="t[]" size="15" value="<?=$data[t][3]?>" /></span>
                            <span style="margin-left:20px;">外<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="t[]" size="15" value="<?=$data[t][4]?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">堵车严重，行驶16.2公里，平均车速18公里，1.05小时，温度31&#176;<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc1']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">堵车严重,行驶13.6公里，平均车速23公里，35分钟，温度27&#176;<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc2']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">交通状况正常，行驶22公里<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc3']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">交通状况正常<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc4']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">下班高峰期<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc5']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:20px;">环路，平均车速60公里<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc6']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>高速:</span>
                            <span style="margin-left:20px;">行驶40公里<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc7']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>高速:</span>
                            <span style="margin-left:20px;">行驶60公里，平均车速98公里，40分钟，温度27&#176;<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc8']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>高速:</span>
                            <span style="margin-left:20px;">行驶106公里<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc9']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>高速:</span>
                            <span style="margin-left:20px;">平均车速80公里<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc10']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市:</span>
                            <span style="margin-left:20px;">路况良好<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc11']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市:</span>
                            <span style="margin-left:20px;">拥堵路段<input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc12']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>郊区:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc13']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>高速:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc14']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>综合油耗:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc15']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>城市油耗:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="oc[]" size="15" value="<?=$data['oc16']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>测试油耗:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="test_oc" size="15" value="<?=$data['test_oc']?>" /></span> L
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>金港赛道圈速:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="jingang" size="15" value="<?=$data['jingang']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>锐思赛道圈速:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ruisi" size="15" value="<?=$data['ruisi']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>ams操控圈:</span>
                            <span style="margin-left:10px;"><input type="text" style="width:80px; border:1px solid #cdcdcd;  background:none; margin-left:10px;" name="ams" size="15" value="<?=$data['ams']?>" /></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>日期:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;" id="firstdate" class="datepicker" readonly="" size="10"  name="date_ymd" value="<? if ($data['date_ymd']!=='0000-00-00') { ?><?=$data['date_ymd']?><? } ?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>地点:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:200px;" size="60" id="address"  name="address" value="<?=$data['address']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>温度:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:50px;" size="50"  name="tt" value="<?=$data['tt']?>"/></span> &#176;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>公里数:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:50px;" size="50"  name="kw" value="<?=$data['kw']?>"/></span> km
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>测试员:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:200px;" size="200" id="tester"  name="tester" value="<?=$data['tester']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>仪器操作员:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:200px;" size="200"  name="operator" value="<?=$data['operator']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>天气:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:150px;" size="150"  name="weather" value="<?=$data['weather']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>刊登日期:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:150px;" size="150"  name="post_date" value="<?=$data['post_date']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>类型:</span>
                            <span style="margin-left:10px;"><input type="text"  style=" border:1px solid #e1e1e1;width:250px;" size="250"  name="type" value="<?=$data['type']?>"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>状态:</span>
                            <select name="state" id="state">
                                <option value="1" <? if (!$data['state'] || $data['state']==1) { ?>selected="selected"<? } ?>>正常</option>
                                <option value="2" <? if ($data['state']==2) { ?>selected="selected"<? } ?>>关闭</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" colspan="2">
                            <input type="button" id="submit_btn" name="btn" value="  提  交  ">&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif" height="16"></div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function () {
        $('#brand_id').change(function () {
            var brand_id = $(this).val();
            var fact = $('#factory_id')[0];
            var facturl = "?action=factory-allStateJson&brand_id=" + brand_id;
            var sel = $(this)[0];
            $('#brand_name').val(sel.options[sel.selectedIndex].text);

            $.getJSON(facturl, function (ret) {
                $('#factory_id option[value!=""]').remove();
                $('#series_id option[value!=""]').remove();
                $('#model_id option[value!=""]').remove();
                $('#manually_model').hide();

                $.each(ret, function (i, v) {
                    fact.options.add(new Option(v['factory_name'], v['factory_id']));
                });
            });
        });

        $('#factory_id').change(function(){
            var fact_id=$(this).val();
            var ser=$('#series_id')[0];
            var serurl="?action=series-allStateJson&factory_id="+fact_id;
            var sel=$(this)[0];
            $('#factory_name').val(sel.options[sel.selectedIndex].text);

            $.getJSON(serurl, function(ret){
                $('#series_id option[value!=""]').remove();
                $('#model_id option[value!=""]').remove();

                $.each(ret, function(i,v){
                    ser.options.add(new Option(v['series_name'], v['series_id']));
                });
            });
        });

        $('#series_id').change(function(){
            var seri_id=$(this).val();
            var ser=$('#model_id')[0];
            var serurl="?action=model-allStateJson&sid="+seri_id;
            var sel=$(this)[0];
            $('#series_name').val(sel.options[sel.selectedIndex].text);

            $.getJSON(serurl, function(ret){
                $('#model_id option[value!=""]').remove();

                $.each(ret, function(i,v){
                    ser.options.add(new Option(v['model_name'], v['model_id']));
                });
            });
        });
        $('#model_id').change(function(){
            var model_val=$(this).val();
            var model_name=$(this).children('option:selected').text();
            if(!model_val){
                $('#manually_model').show();
                $('#model_name').val('');
            }else{
                $('#manually_model').hide();
                $('#model_name').val(model_name);
            }
        });
        $('#submit_btn').click(function(){
            var model_name = $('#model_name').val();
            var model_name_m = $('#model_name_m').val();
            var message = "";
            if(!model_name && !model_name_m) {
                message += ' 车款 没有选择或填写！\n';
            }

            var is_func_idArr = ['price'];
            var is_func_mesArr = ['价格'];
            message += TestIdArrValue(is_func_idArr,false,is_func_mesArr,isFloat,'格式填写不正确！');

            var is_idArr = ['firstdate','address','tester'];
            var is_mesArr = ['日期','地点','测试员'];
            message += TestIdArrValue(is_idArr,true,is_mesArr);

            var speed_value_1 = [
                "0 - 10m","0 - 20m","0 - 30m","0 - 40m","0 - 50m","0 - 60m",
                "0 - 70m","0 - 80m","0 - 90m","0 - 100m","0 - 110m","0 - 120m",
                "0 - 130m","0 - 140m","0 - 150m","0 - 160m","0 - 170m","0 - 180m",
                "0 - 190m","0 - 200m"
            ];
            var speed_idnum_2 = ["s20","s21","s22","s23","s24","s25"];
            var speed_value_2 = ["400m","公里数","800m","公里数","1000m","公里数"];
            var speed_value_3 = ["4/5/6挡 60-100m","4/5/6挡 80-120m"];
            message += panelTesting(0, 19, "s", speed_value_1, "加速:");
            message += twoTesting(speed_idnum_2, speed_value_2, "加速:", isFloat, '格式不正确！');
            message += panelTesting(26, 27, "s", speed_value_3, "加速:");
            if(message){
                alert(message);
            }else{
                $('#form_data').submit();
            }
        });
    });

    //验证 是否为浮点数
    function isFloat(floatNum){
        var reg = /(^[1-9]\d*(\.\d{1,3})?$)|(^0(\.\d{1,3})?$)/;
        return reg.test(floatNum);
    }

    /**
     * 批量验证id序列下的值
     * 当值存在时是否为浮点数
     *
     * @param idArr Array  批量验证的id数组
     * @param mustFilled  Boolean 是否必须有值
     * @param mesArr Array  批量验证的id值的提示信息
     * @param funcName String  id的值调用的验证方法名
     * @param funcMes String  id的值调用的验证方法的错误提示信息
     * @param chiefPromet String|False  提示错误主关键信息
     * @return String 拼接好的错误信息
     */
    function TestIdArrValue(idArr, mustFilled, mesArr, funcName, funcMes, chiefPromet){
        var message = "";
        if(idArr && (idArr instanceof Array) && mesArr && (mesArr instanceof Array) && idArr.length==mesArr.length){
            for(var i=0;i<idArr.length;i++){
                var m1 = "", m2 = "";
                if(chiefPromet){
                    m1 = chiefPromet + ' ';
                }
                if(!mustFilled && funcName){
                    if($('#'+idArr[i]).val() && !funcName($('#'+idArr[i]).val())){
                        m2 = '"'+mesArr[i]+'" '+funcMes;
                    }
                }else if(mustFilled && funcName){
                    if(!$('#'+idArr[i]).val()){
                        m2 = '"'+mesArr[i]+'"'+" 没有填写！";
                    }else if($('#'+idArr[i]).val() && !funcName($('#'+idArr[i]).val())){
                        m2 = '"'+mesArr[i]+'" '+funcMes;
                    }
                }else if(mustFilled && !funcName){
                    if(!$('#'+idArr[i]).val()){
                        m2 = '"'+mesArr[i]+'"'+" 没有填写！";
                    }
                }
                if(m2){
                    message += m1 + m2 + '\n';
                }
            }
        }
        return message;
    }

    /**
     * 批量验证id序列下的值
     * 当值存在时是否为浮点数
     *
     * @param startNum Int 批量验证id开始的序列号
     * @param endNum Int 批量验证id结束的序列号
     * @param idName String id名字的前英文
     * @param prompt Array 提示错误关键信息
     * @param chiefPrompt String|False 提示错误主关键信息
     * @return String 拼接好的错误信息
     */
    function panelTesting(startNum, endNum, idName, prompt, chiefPrompt) {
        var message = "";
        var num = endNum - startNum;
        for(var i = 0; i <= num; i++){
            if($('#'+idName+(startNum + i)).val() && !isFloat($('#'+idName+(startNum + i)).val())){
                if(chiefPrompt) {
                    message += chiefPrompt + ' "' + prompt[i] + '"格式不正确！\n';
                }else{
                    message += '"' + prompt[i] + '"格式不正确！\n';
                }
            }
        }
        return message;
    }

    /**
     * 批量验证id序列下的值（ * 此难为两个两个验证）
     * 当值存在时是否为浮点数
     *
     * @param idNumArr Array 批量验证id序列数组
     * @param prompt Array 提示错误关键信息
     * @param chiefPrompt String|False 提示错误主关键信息
     * @param funcName Object 调用验证的方法名
     * @param funcMes String|False 调用验证方法的错误提示
     * @param firstToNext  Boolean 当第一个值没有填写时，第二个有值，是否提示添加第一个的值,
     * @param nextToFirst  Boolean 当第二个值没有填写时，第一个有值，是否提示添加第二个的值,
     * @param isFirstValue  Boolean 是否第一列全部必须有值
     * @param isNextValue  Boolean 是否第二列全部必须有值
     * @param twoValueMust  Boolean 是否两个都必须有值
     * @return String 拼接好的错误信息
     */
    function twoTesting(idNumArr, prompt, chiefPrompt, funcName, funcMes, firstToNext, nextToFirst, isFirstValue, isNextValue, twoValueMust) {
        var message = "";
        for(var i=0;i<idNumArr.length;i+=2){
            var m0='', m1='', m2='', m3=0, m4=0, m5=0;
            if(chiefPrompt) { m0 = chiefPrompt;}
            if($('#'+idNumArr[i]).val() && !funcName($('#'+idNumArr[i]).val())){
                m1 = '"'+prompt[i]+'" '+ funcMes +' ';
                m3 = 1;
            }else if($('#'+idNumArr[i]).val() && funcName($('#'+idNumArr[i]).val())){
                m1 =  '"'+prompt[i]+'"正确! ';
                m3 = 2;
            }else if(isFirstValue && !$('#'+idNumArr[i]).val()){
                m1 = '"'+prompt[i]+'"没有填写! ';
                m3 = 3;
            }
            if($('#'+idNumArr[i+1]).val() && !funcName($('#'+idNumArr[i+1]).val())){
                m2 = '"'+prompt[i+1]+'" '+ funcMes +' ';
                m4 = 1;
            }else if($('#'+idNumArr[i+1]).val() && funcName($('#'+idNumArr[i+1]).val())){
                m2 = '"'+prompt[i+1]+'"正确! ';
                m4 = 2;
            } else if(isNextValue && !$('#'+idNumArr[i+1]).val()){
                m2 = '"'+prompt[i+1]+'"没有填写! ';
                m4 = 3;
            }
            if(!twoValueMust){
                if(m3==m4 && m4==3){
                    m4 = 4;
                }
                if(m3==0 && (m4==1 || m4==2)){
                    if(firstToNext){
                        m3 = 3;
                        m1 = '"'+prompt[i]+'"没有填写! ';
                    }else{
                        if(m4==1){
                            m1 = '"'+prompt[i];
                        }
                    }
                }
                if(m4==0 && (m3==1 || m3==2)){
                    if(nextToFirst) {
                        m4 = 3;
                        m2 = '"' + prompt[i + 1] + '"没有填写! ';
                    }
                }
            }else{
                if(m3==m4 && m4==0){
                    m3 = m4 = 3;
                    m1 = '"'+prompt[i]+'"没有填写! ';
                    m2 = '"' + prompt[i + 1] + '"没有填写! ';
                }
            }

            if(((m3==1 || m3==3) && (m4==1 || m4==2 || m4==3 || m4==0)) || (m3==2 && (m4==1 || m4==3)) || (m4==4 && (m3==1 || m3==3)) || (m3==0 && m4==1)){
                message += m0 + m1 + m2 + "\n";
            }
        }
        return message;
    }
</script>
</body>
</html>
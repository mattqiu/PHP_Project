<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?=$page_charset?>" />
        <link rel='stylesheet' href='<?=$admin_path?>css/style.css' type='text/css' />
	<script type="text/javascript" src="<?=$admin_path?>js/jquery.js"></script>
	<script type="text/javascript" src="<?=$admin_path?>js/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?=$admin_path?>js/jquery.hotkeys.js"></script>
	<script type="text/javascript" src="<?=$admin_path?>js/jquery.jstree.js"></script>

</head>
<style type="text/css">
    html{overflow-x:auto;}
</style>
<body style="width:500px">
<div id="container">
<div id="cardb_tree" class="tree"></div>
<script type="text/javascript">
$(function () {
	$("#cardb_tree").jstree({ 
		"ui" : {
          "select_limit" : 2,
          "select_multiple_modifier" : "alt",
          "selected_parent_close" : "select_parent",
          "initially_select" : [ "phtml_2" ]
    },
    "json_data" : {
      "ajax" : {
          "url" : "<?=$admin_path?>index.php?action=tree-TreeLeftData",
          "data" : function (n) { 
            return { 
              "id" : n.attr ? n.attr("id").replace("node_","") : -1,
              "pid" : n.attr ? n.attr("pid") : -1,
              'type' : n.attr ? n.attr('rel') : 'brand'
            }; 
          }
        }
    },
    
    "types" : {
        "types" : {
          "model" : {
            "valid_children" : "folder",
            "icon" : {
              "image" : "<?=$admin_path?>images/folder.png"
            }
          },
          "brand" : {
            "valid_children" : [ "default", "folder" ],
            "icon" : {
              "image" : "<?=$admin_path?>images/folder.png"
            }
          },
          "factory" : {
            "valid_children" : [ "default", "folder" ],
            "icon" : {
              "image" : "<?=$admin_path?>images/folder.png"
            }
          },
          "series" : {
            "valid_children" : [ "default", "folder" ],
            "icon" : {
              "image" : "<?=$admin_path?>images/folder.png"
            }
          },
          "folder" : {
            "valid_children" : [ "default", "folder" ],
            "icon" : {
              "image" : "<?=$admin_path?>images/folder.png"
            }
          },
          "default" : {
            "valid_children" : "none",
            "icon" : {
              "image" : "<?=$admin_path?>images/file.png"
            }
          }
        }
      },
    "contextmenu" : {
      "items" : {
        "create" : {
          "label"        : "新建",
          "_class"      : "class",  // class is applied to the item LI node
          "separator_before"  : false,  // Insert a separator before the item
          "separator_after"  : true,    // Insert a separator after the item
          // false or string - if does not contain `/` - used as classname
          "icon"        : false,
          "submenu"      : { 
            /* Collection of objects (the same structure) */
            "addbrand" : {
              "separator_before"  : false,
              "separator_after"  : false,
              "label"        : "新建品牌",
              "action"      : function (obj) { 
                //alert(obj.attr('tagName'));
                parent.document.getElementById('frm_right').src = "?action=brand-add";
              }
            },
            "addfactory" : {
              "separator_before"  : false,
              "separator_after"  : false,
              "label"        : "新建厂商",
              "action"      : function (obj) { 
                var new_url = "?action=factory-add";
                if(obj.attr('rel') == 'factory'){
                  new_url = new_url + "&fatherId="+obj.attr('id').replace('node_','');
                }
                parent.document.getElementById('frm_right').src = new_url;
              }
            },
            "addseries" : {
              "separator_before"  : false,
              "separator_after"  : false,
              "label"        : "新建车系",
              "action"      : function (obj) { 
                var new_url = "?action=series-add";
                if(obj.attr('rel') == 'series'){
                  new_url = new_url + "&fatherId="+obj.attr('id').replace('node_','');
                }
                parent.document.getElementById('frm_right').src = new_url;
              }
            },
            "addmodel" : {
              "separator_before"  : false,
              "separator_after"  : false,
              "label"        : "新建车款",
              "action"      : function (obj) { 
                var new_url = "?action=model-add";
                if(obj.attr('rel') == 'model'){
                  new_url = new_url + "&fatherId="+obj.attr('id').replace('node_','');
                }
                window.open(new_url,'newDialog','width='+800+',height='+600+',resizable=yes,scrollbars=yes');
                //parent.document.getElementById('list').src = new_url;
              }
            }
          }
        },
        "edit" : {
          "separator_before"  : false,
          "icon"        : false,
          "separator_after"  : false,
          "label"        : "修改",
          "action"      : function (obj) { 
            var new_url = obj.attr('elink');
            if(obj.attr('rel')==""){
              window.open(new_url,'newDialog','width='+800+',height='+600+',resizable=yes,scrollbars=yes');
            }else
            parent.document.getElementById('frm_right').src = new_url;
          }
        },
        "remove" : {
          "separator_before"  : false,
          "icon"        : false,
          "_disabled"      : true,
          "separator_after"  : false,
          "label"        : "删除",
          "action"      : function (obj) { this.remove(obj); }
        }
      },
      "default" : ["create", "edit"]
    },
    
    "plugins" : [ "themes", "json_data", "ui", "contextmenu", "types" ]
	});
});
</script>
</div>
</body>
</html>
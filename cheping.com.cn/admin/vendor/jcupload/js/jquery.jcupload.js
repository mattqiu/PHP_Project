
(function($){
    $.fn=$.fn||{};

    $.fn.jcupload={
        debug:false,
        instances:[],
        build:function(user_config){
            this.files=[];
            this.queue={
                size:0,
                count:0
            };

            this.to_console=function(msg){
                $.fn.to_console(this.config.instance_name+" : "+msg);
            };

            this.append_to=function(elem){
                $(elem).append(this.flash_html);
            };

            this.recalculate=function(){
                this.queue.size=0;
                this.queue.count=0;
                for(var f in this.files){
                    this.queue.size+=this.files[f].size;
                    this.queue.count++;
                }
                };

        this.get_file_params=function(file_index){
            for(var f in this.files){
                if(this.files[f].index==file_index){
                    return this.files[f];
                }
            }
        return false;
    };

    this.add_file=function(params){
        var fi=this.files.length;
        this.files[fi]={
            name:params.file_name,
            type:params.file_type,
            size:params.file_size,
            index:params.file_index,
            uploading:false,
            uploaded:false
        };

        this.recalculate();
        if(typeof(this.config.callback.file_added)=="function"){
            try{
                this.config.callback.file_added(this,this.files[fi].index);
            }catch(e){
                this.to_console(e);
            }
        };

    this.to_console("[add_file] file "+this.files[fi].index+" added");
};

this.upload_start=function(file_index){
    for(var f in this.files){
        if(this.files[f].index==file_index){
            this.files[f].uploading=true;
            if(typeof(this.config.callback.upload_start)=="function"){
                try{
                    this.config.callback.upload_start(this,this.files[f].index);
                }catch(e){
                    this.to_console(e);
                }
            }
        this.to_console("upload_start("+this.files[f].index+")");
        return true;
    }
    }
return true;
};

this.upload_progress=function(params){
    for(var f in this.files){
        if(this.files[f].index==params.file_index){
            if(typeof(this.config.callback.upload_progress)=="function"){
                try{
                    this.config.callback.upload_progress(this,this.files[f].index,params.file_sended,params.file_size);
                }catch(e){
                    this.to_console(e);
                }
            }
        this.to_console("upload_progress("+this.files[f].index+")= "+params.file_sended);
        return true;
    }
    }
return true;
};

this.upload_end=function(file_index){
    for(var f in this.files){
        if(this.files[f].index==file_index){
            this.files[f].uploading=false;
            this.files[f].uploaded=true;
            if(typeof(this.config.callback.upload_end)=="function"){
                try{
                    this.config.callback.upload_end(this,this.files[f].index);
                }catch(e){
                    this.to_console(e);
                }
            }
        this.to_console("upload_end("+this.files[f].index+")");
        return true;
    }
    }
return true;
};

this.queue_upload_end=function(){
    if(typeof(this.config.callback.queue_upload_end)=="function"){
        try{
            this.config.callback.queue_upload_end(this);
        }catch(e){
            this.to_console(e);
        }
    }
return true;
};

this.error_file_size=function(params){
    if(typeof(this.config.callback.error_file_size)=="function"){
        try{
            this.config.callback.error_file_size(this,params.file_name,params.file_type,params.file_size);
        }catch(e){
            this.to_console(e);
        }
    }
return true;
};

this.error_queue_size=function(params){
    if(typeof(this.config.callback.error_queue_size)=="function"){
        try{
            this.config.callback.error_queue_size(this,params.file_name,params.file_type,params.file_size);
        }catch(e){
            this.to_console(e);
        }
    }
return true;
};

this.error_queue_count=function(params){
    if(typeof(this.config.callback.error_queue_count)=="function"){
        try{
            this.config.callback.error_queue_count(this,params.file_name,params.file_type,params.file_size);
        }catch(e){
            this.to_console(e);
        }
    }
return true;
};

var ii=$.fn.jcupload.instances.length;
this.config={
    instance_index:ii,
    instance_name:"jcupload_"+ii,
    flash_file:'jcupload.swf',
    flash_vars:new Array(),
    flash_width:100,
    flash_height:22,
    flash_background:'../images/jcu_button.png',
    flash_background_offset_x:0,
    flash_background_offset_y:0,
    url:'upload.php',
    max_file_size:0,
    max_queue_count:0,
    max_queue_size:0,
    extensions:["All files (*)|*"],
    multi_file:1,
    callback:{
        init:function(uo,jcu_version,flash_verison){
            uo.to_console("[callback] init("+jcu_version+", "+flash_verison+")");
        },
        pre_dialog:function(uo){
            uo.to_console("[callback] pre_dialog()");
        },
        file_added:function(uo,file_index){
            uo.to_console("[callback] file_added("+file_index+")");
        },
        upload_start:function(uo,file_index){
            uo.to_console("[callback] upload_start("+file_index+")");
        },
        upload_progress:function(uo,file_index,file_sended,file_size){
            uo.to_console("[callback] upload_progress("+file_index+", "+file_sended+", "+file_size+")");
        },
        upload_end:function(uo,file_index){
            uo.to_console("[callback] upload_end("+file_index+")");
        },
        queue_upload_end:function(uo){
            uo.to_console("[callback] queue_upload_end()");
        },
        error_file_size:function(uo,file_name,file_type,file_size){
            uo.to_console("[callback] error_file_size("+file_name+","+file_type+","+file_size+")");
        },
        error_queue_count:function(uo,file_name,file_type,file_size){
            uo.to_console("[callback] error_queue_count("+file_name+","+file_type+","+file_size+")");
        },
        error_queue_size:function(uo,file_name,file_type,file_size){
            uo.to_console("[callback] error_queue_size("+file_name+","+file_type+","+file_size+")");
        }
    }
};

this.config=$.extend(this.config,user_config);
this.config.flash_vars["instance_name"]=this.config.instance_name;
this.config.flash_vars["flash_width"]=this.config.flash_width;
this.config.flash_vars["flash_height"]=this.config.flash_height;
this.config.flash_vars["flash_background"]=this.config.flash_background;
this.config.flash_vars["flash_background_offset_x"]=this.config.flash_background_offset_x;
this.config.flash_vars["flash_background_offset_y"]=this.config.flash_background_offset_y;
this.config.flash_vars["max_file_size"]=this.config.max_file_size;
this.config.flash_vars["max_queue_count"]=this.config.max_queue_count;
this.config.flash_vars["max_queue_size"]=this.config.max_queue_size;
this.config.flash_vars["upload_url"]=this.config.url;
this.config.flash_vars["browse_multi_file"]=this.config.multi_file;
this.config.flash_vars["flash_browse_extensions"]=this.config.extensions.join("||");
var flash_vars_pairs=new Array();
for(var k in this.config.flash_vars){
    flash_vars_pairs[flash_vars_pairs.length]=encodeURIComponent(k)+"="+encodeURIComponent(this.config.flash_vars[k]);
}
var flash_vars=flash_vars_pairs.join("&");
this.flash_html="";
if($.browser.msie){
    this.flash_html+='<object name="'+this.config.instance_name+'" id="'+this.config.instance_name+'" type="application/x-shockwave-flash" width="'+this.config.flash_width+'" height="'+this.config.flash_height+'">';
    this.flash_html+='<param name="movie" value="'+this.config.flash_file+'" />';
    this.flash_html+='<param name="wmode" value="transparent" />';
    this.flash_html+='<param name="menu" value="false" />';
    this.flash_html+='<param name="FlashVars" value="'+flash_vars+'" />';
    this.flash_html+='</object>';
}else{
    this.flash_html+='<embed';
    this.flash_html+=' type="application/x-shockwave-flash"';
    this.flash_html+=' id="'+this.config.instance_name+'"';
    this.flash_html+=' name="'+this.config.instance_name+'"';
    this.flash_html+=' width="'+this.config.flash_width+'"';
    this.flash_html+=' height="'+this.config.flash_height+'"';
    this.flash_html+=' src="'+this.config.flash_file+'"';
    this.flash_html+=' wmode="transparent"';
    this.flash_html+=' menu="false"';
    this.flash_html+=' swliveconnect="true"';
    this.flash_html+=' FlashVars="'+flash_vars+'" />';
}
$.fn.jcupload.instances[this.config.instance_index]=this;
return this;
}
};

$.fn.to_console=function(msg){
    if($.fn.jcupload.debug===true){
        if(typeof(console)!="undefined"){
            console.log(msg);
        }
        else{
            var d=$(document.createElement("div")).appendTo("body");
            d.html(msg);
        }
    }
};

$.jcupload=function(user_config){
    return new $.fn.jcupload.build(user_config);
};

$.jcupload_get_instance=function(instance_name){
    for(var k in $.fn.jcupload.instances){
        if($.fn.jcupload.instances[k].config.instance_name===instance_name){
            return $.fn.jcupload.instances[k];
        }
    }
return false;
};

$.jcupload_flash_call=function(instance_name,action,params){
    if(typeof(instance_name)=="undefined"){
        $.fn.to_console("[flash_call] undefined instance_name");
        return false;
    }
    if(typeof(action)=="undefined"){
        $.fn.to_console("[flash_call] undefined action");
        return false;
    }
    var instance=$.jcupload_get_instance(instance_name);
    if(instance===false){
        $.fn.to_console("[flash_call] invalid instance_name '"+instance_name+"'");
        return false;
    }
    $.fn.to_console("[flash_call] "+instance_name+": "+action);
    switch(action){
        case"init":{

            if(typeof(instance.config.callback.init)=="function"){
                try{
                    instance.config.callback.init(instance,params.jcu_version,params.flash_version);
                }catch(e){
                    this.to_console(e);
                }
            };

        return true;
        }
    case"pre_dialog":{

        if(typeof(instance.config.callback.pre_dialog)=="function"){
            try{
                instance.config.callback.pre_dialog(instance);
            }catch(e){
                instance.to_console(e);
            }
        };

    return true;
    }
case"add_file":{

    return instance.add_file(params);
}
case"upload_start":{

    return instance.upload_start(params);
}
case"upload_progress":{

    return instance.upload_progress(params);
}
case"upload_end":{

    return instance.upload_end(params);
}
case"queue_upload_end":{

    return instance.queue_upload_end();
}
case"error_file_size":{

    return instance.error_file_size(params);
}
case"error_queue_size":{

    return instance.error_queue_size(params);
}
case"error_queue_count":{

    return instance.error_queue_count(params);
}
case"to_console":{

    $.fn.to_console(params);
    return true;
}
default:{

    $.fn.to_console("[flash_call] invalid action "+action);
    return false;
}
}
};

})($);
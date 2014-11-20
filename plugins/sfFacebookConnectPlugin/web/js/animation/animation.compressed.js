function Animation(a){if(this==window){return new Animation(a)}else{this.obj=a;this._reset_state();this.queue=[];this.last_attr=null}}Animation.resolution=20;Animation.offset=0;Animation.prototype._reset_state=function(){this.state={attrs:{},duration:500}};Animation.prototype.stop=function(){this._reset_state();this.queue=[];return this};Animation.prototype._build_container=function(){if(this.container_div){this._refresh_container();return}if(this.obj.firstChild&&this.obj.firstChild.__animation_refs){this.container_div=this.obj.firstChild;this.container_div.__animation_refs++;this._refresh_container();return}var a=document.createElement('div');a.style.padding='0px';a.style.margin='0px';a.style.border='0px';a.__animation_refs=1;var b=this.obj.childNodes;while(b.length){a.appendChild(b[0])}this.obj.appendChild(a);this.obj.style.overflow='hidden';this.container_div=a;this._refresh_container()};Animation.prototype._refresh_container=function(){this.container_div.style.height='auto';this.container_div.style.width='auto';this.container_div.style.height=this.container_div.offsetHeight+'px';this.container_div.style.width=this.container_div.offsetWidth+'px'};Animation.prototype._destroy_container=function(){if(!this.container_div){return}if(!--this.container_div.__animation_refs){var a=this.container_div.childNodes;while(a.length){this.obj.appendChild(a[0])}this.obj.removeChild(this.container_div)}this.container_div=null};Animation.ATTR_TO=1;Animation.ATTR_BY=2;Animation.ATTR_FROM=3;Animation.prototype._attr=function(a,b,c){a=a.replace(/-[a-z]/gi,function(l){return l.substring(1).toUpperCase()});var d=false;switch(a){case'background':this._attr('backgroundColor',b,c);return this;case'margin':b=Animation.parse_group(b);this._attr('marginBottom',b[0],c);this._attr('marginLeft',b[1],c);this._attr('marginRight',b[2],c);this._attr('marginTop',b[3],c);return this;case'padding':b=Animation.parse_group(b);this._attr('paddingBottom',b[0],c);this._attr('paddingLeft',b[1],c);this._attr('paddingRight',b[2],c);this._attr('paddingTop',b[3],c);return this;case'backgroundColor':case'borderColor':case'color':b=Animation.parse_color(b);break;case'opacity':b=parseFloat(b,10);break;case'height':case'width':if(b=='auto'){d=true}else{b=parseInt(b,10)}break;case'borderWidth':case'lineHeight':case'fontSize':case'marginBottom':case'marginLeft':case'marginRight':case'marginTop':case'paddingBottom':case'paddingLeft':case'paddingRight':case'paddingTop':case'bottom':case'left':case'right':case'top':case'scrollTop':case'scrollLeft':b=parseInt(b,10);break;default:throw new Error(a+' is not a supported attribute!');}if(this.state.attrs[a]===undefined){this.state.attrs[a]={}}if(d){this.state.attrs[a].auto=true}switch(c){case Animation.ATTR_FROM:this.state.attrs[a].start=b;break;case Animation.ATTR_BY:this.state.attrs[a].by=true;case Animation.ATTR_TO:this.state.attrs[a].value=b;break}};Animation.prototype.to=function(a,b){if(b===undefined){this._attr(this.last_attr,a,Animation.ATTR_TO)}else{this._attr(a,b,Animation.ATTR_TO);this.last_attr=a}return this};Animation.prototype.by=function(a,b){if(b===undefined){this._attr(this.last_attr,a,Animation.ATTR_BY)}else{this._attr(a,b,Animation.ATTR_BY);this.last_attr=a}return this};Animation.prototype.from=function(a,b){if(b===undefined){this._attr(this.last_attr,a,Animation.ATTR_FROM)}else{this._attr(a,b,Animation.ATTR_FROM);this.last_attr=a}return this};Animation.prototype.duration=function(a){this.state.duration=a?a:0;return this};Animation.prototype.checkpoint=function(a,b){if(a===undefined){a=1}this.state.checkpoint=a;this.state.checkpointcb=b;this.queue.push(this.state);this._reset_state();return this};Animation.prototype.blind=function(){this.state.blind=true;return this};Animation.prototype.hide=function(){this.state.hide=true;return this};Animation.prototype.show=function(){this.state.show=true;return this};Animation.prototype.ease=function(a){this.state.ease=a;return this};Animation.prototype.go=function(){var a=(new Date()).getTime();this.queue.push(this.state);for(var i=0;i<this.queue.length;i++){this.queue[i].start=a-Animation.offset;if(this.queue[i].checkpoint){a+=this.queue[i].checkpoint*this.queue[i].duration}}Animation.push(this);return this};Animation.prototype._frame=function(b){var c=true;var d=false;var f=false;for(var i=0;i<this.queue.length;i++){var g=this.queue[i];if(g.start>b){c=false;continue}else if(g.checkpointcb&&(g.checkpoint*g.duration+g.start>b)){this._callback(g.checkpointcb,b-g.start-g.checkpoint*g.duration);g.checkpointcb=null}if(g.started===undefined){if(g.show){this.obj.style.display='block'}for(var a in g.attrs){if(g.attrs[a].start!==undefined){continue}switch(a){case'backgroundColor':case'borderColor':case'color':var h=Animation.parse_color(Animation.get_style(this.obj,a=='borderColor'?'borderLeftColor':a));if(g.attrs[a].by){g.attrs[a].value[0]=Math.min(255,Math.max(0,g.attrs[a].value[0]+h[0]));g.attrs[a].value[1]=Math.min(255,Math.max(0,g.attrs[a].value[1]+h[1]));g.attrs[a].value[2]=Math.min(255,Math.max(0,g.attrs[a].value[2]+h[2]))}break;case'opacity':var h=((h=Animation.get_style(this.obj,'opacity'))&&parseFloat(h))||((h=Animation.get_style(this.obj,'opacity'))&&(h=/(\d+(?:\.\d+)?)/.exec(h))&&parseFloat(h.pop())/100)||1;if(g.attrs[a].by){g.attrs[a].value=Math.min(1,Math.max(0,g.attrs[a].value+h))}break;case'height':case'width':var h=Animation['get_'+a](this.obj);if(g.attrs[a].by){g.attrs[a].value+=h}break;case'scrollLeft':case'scrollTop':var h=(this.obj==document.body)?(document.documentElement[a]||document.body[a]):this.obj[a];if(g.attrs[a].by){g.attrs[a].value+=h}g['last'+a]=h;break;default:var h=parseInt(Animation.get_style(this.obj,a),10);if(g.attrs[a].by){g.attrs[a].value+=h}break}g.attrs[a].start=h}if((g.attrs.height&&g.attrs.height.auto)||(g.attrs.width&&g.attrs.width.auto)){if(/Firefox\/[12]\./.test(navigator.userAgent)){f=true}this._destroy_container();for(var a in{height:1,width:1,fontSize:1,borderLeftWidth:1,borderRightWidth:1,borderTopWidth:1,borderBottomWidth:1,paddingLeft:1,paddingRight:1,paddingTop:1,paddingBottom:1}){if(g.attrs[a]){this.obj.style[a]=g.attrs[a].value+(typeof g.attrs[a].value=='number'?'px':'')}}if(g.attrs.height&&g.attrs.height.auto){g.attrs.height.value=Animation.get_height(this.obj)}if(g.attrs.width&&g.attrs.width.auto){g.attrs.width.value=Animation.get_width(this.obj)}}g.started=true;if(g.blind){this._build_container()}}var p=(b-g.start)/g.duration;if(p>=1){p=1;if(g.hide){this.obj.style.display='none'}}else{c=false}var j=g.ease?g.ease(p):p;if(!d&&p!=1&&g.blind){d=true}if(f&&this.obj.parentNode){var k=this.obj.parentNode;var l=this.obj.nextSibling;k.removeChild(this.obj)}for(var a in g.attrs){switch(a){case'backgroundColor':case'borderColor':case'color':this.obj.style[a]='rgb('+Animation.calc_tween(j,g.attrs[a].start[0],g.attrs[a].value[0],true)+','+Animation.calc_tween(j,g.attrs[a].start[1],g.attrs[a].value[1],true)+','+Animation.calc_tween(j,g.attrs[a].start[2],g.attrs[a].value[2],true)+')';break;case'opacity':var m=Animation.calc_tween(j,g.attrs[a].start,g.attrs[a].value);try{this.obj.style.opacity=(m==1?'':m);this.obj.style.filter=(m==1?'':'alpha(opacity='+m*100+')')}catch(e){}break;case'height':case'width':this.obj.style[a]=j==1&&g.attrs[a].auto?'auto':Animation.calc_tween(j,g.attrs[a].start,g.attrs[a].value,true)+'px';break;case'scrollLeft':case'scrollTop':var h=(this.obj==document.body)?(document.documentElement[a]||document.body[a]):this.obj[a];if(g['last'+a]!=h){delete g.attrs[a]}else{var n=Animation.calc_tween(j,g.attrs[a].start,g.attrs[a].value,true)-h;if(a=='scrollLeft'){window.scrollBy(n,0)}else{window.scrollBy(0,n)}g['last'+a]=n+h}break;default:this.obj.style[a]=Animation.calc_tween(j,g.attrs[a].start,g.attrs[a].value,true)+'px';break}}if(p==1){this.queue.splice(i--,1);this._callback(g.ondone,b-g.start-g.duration)}}if(f){k[l?'insertBefore':'appendChild'](this.obj,l)}if(!d&&this.container_div){this._destroy_container()}return!c};Animation.prototype.ondone=function(a){this.state.ondone=a;return this};Animation.prototype._callback=function(a,b){if(a){Animation.offset=b;a.call(this);Animation.offset=0}};Animation.calc_tween=function(p,a,b,c){return(c?parseInt:parseFloat)((b-a)*p+a,10)};Animation.parse_color=function(a){var b=/^#([a-f0-9]{1,2})([a-f0-9]{1,2})([a-f0-9]{1,2})$/i.exec(a);if(b){return[parseInt(b[1].length==1?b[1]+b[1]:b[1],16),parseInt(b[2].length==1?b[2]+b[2]:b[2],16),parseInt(b[3].length==1?b[3]+b[3]:b[3],16)]}else{var c=/^rgba? *\(([0-9]+), *([0-9]+), *([0-9]+)(?:, *([0-9]+))?\)$/.exec(a);if(c){if(c[4]==='0'){return[255,255,255]}else{return[parseInt(c[1],10),parseInt(c[2],10),parseInt(c[3],10)]}}else if(a=='transparent'){return[255,255,255]}else{throw'Named color attributes are not supported.';}}};Animation.parse_group=function(a){var a=trim(a).split(/ +/);if(a.length==4){return a}else if(a.length==3){return[a[0],a[1],a[2],a[1]]}else if(a.length==2){return[a[0],a[1],a[0],a[1]]}else{return[a[0],a[0],a[0],a[0]]}};Animation.get_height=function(a){var b=parseInt(Animation.get_style(a,'paddingTop'),10),pB=parseInt(Animation.get_style(a,'paddingBottom'),10),bT=parseInt(Animation.get_style(a,'borderTopWidth'),10),bW=parseInt(Animation.get_style(a,'borderBottomWidth'),10);return a.offsetHeight-(b?b:0)-(pB?pB:0)-(bT?bT:0)-(bW?bW:0)};Animation.get_width=function(a){var b=parseInt(Animation.get_style(a,'paddingLeft'),10),pR=parseInt(Animation.get_style(a,'paddingRight'),10),bL=parseInt(Animation.get_style(a,'borderLeftWidth'),10),bR=parseInt(Animation.get_style(a,'borderRightWidth'),10);return a.offsetWidth-(b?b:0)-(pR?pR:0)-(bL?bL:0)-(bR?bR:0)};Animation.get_style=function(b,c){var d;return(window.getComputedStyle&&window.getComputedStyle(b,null).getPropertyValue(c.replace(/[A-Z]/g,function(a){return'-'+a.toLowerCase()})))||(document.defaultView&&document.defaultView.getComputedStyle&&(d=document.defaultView.getComputedStyle(b,null))&&d.getPropertyValue(c.replace(/[A-Z]/g,function(a){return'-'+a.toLowerCase()})))||(b.currentStyle&&b.currentStyle[c])||b.style[c]};Animation.push=function(a){if(!Animation.active){Animation.active=[]};Animation.active.push(a);if(!Animation.timeout){Animation.timeout=setInterval(Animation.animate,Animation.resolution)}};Animation.animate=function(){var a=true;var b=(new Date()).getTime();for(var i=0;i<Animation.active.length;i++){if(Animation.active[i]._frame(b)){a=false}else{Animation.active.splice(i--,1)}}if(a){clearInterval(Animation.timeout);Animation.timeout=null}};Animation.ease={};Animation.ease.begin=function(p){return p*p};Animation.ease.end=function(p){p-=1;return-(p*p)+1};Animation.ease.both=function(p){if(p<=0.5){return(p*p)*2}else{p-=1;return(p*p)*-2+1}};
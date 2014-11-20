jQuery(function($){
	$.datepicker.regional['cs'] = {
		closeText: 'Zavřít',
		prevText: '&#x3c;Dříve',
		nextText: 'Později&#x3e;',
		currentText: 'Nyní',
		monthNames: ['leden','únor','březen','duben','květen','červen',
        'červenec','srpen','září','říjen','listopad','prosinec'],
		monthNamesShort: ['led','úno','bře','dub','kvě','čer',
		'čvc','srp','zář','říj','lis','pro'],
		dayNames: ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota'],
		dayNamesShort: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
		dayNamesMin: ['ne','po','út','st','čt','pá','so'],
		weekHeader: 'Týd',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['cs']);
});

function clickToNewWindow() {
    window.open(this.href,'_blank');
    return false;
}

function get_fb_comments(el){
    var fb = document.createElement('fb:comments');
    fb.setAttribute('numposts','20');
    fb.setAttribute('width','600');
    document.getElementById(el).appendChild(fb);
}

var menu=function(){
    var t=15,z=50,s=6,a;
    function dd(n){
        this.n=n;
        this.h=[];
        this.c=[]
        }
    dd.prototype.init=function(p,c){
        a=c;
        var w=document.getElementById(p), s=w.getElementsByTagName('ul'), l=s.length, i=0;
        for(i;i<l;i++){
            var h=s[i].parentNode;
            this.h[i]=h;
            this.c[i]=s[i];
            h.onmouseover=new Function(this.n+'.st('+i+',true)');
            h.onmouseout=new Function(this.n+'.st('+i+')');
        }
    }
    dd.prototype.st=function(x,f){
        var c=this.c[x], h=this.h[x], p=h.getElementsByTagName('a')[0];
        clearInterval(c.t);
        c.style.overflow='hidden';
        if(f){
            p.className+=' '+a;
            if(!c.mh){
                c.style.display='block';
                c.style.height='';
                c.mh=c.offsetHeight;
                c.style.height=0
                }
            if(c.mh==c.offsetHeight){
                c.style.overflow='visible'
                }
            else{
                c.style.zIndex=z;
                z++;
                c.t=setInterval(function(){
                    sl(c,1)
                    },t)
                }
        }else{
            p.className=p.className.replace(a,'');
            c.t=setInterval(function(){
                sl(c,-1)
                },t)
            }
    }
    function sl(c,f){
        var h=c.offsetHeight;
        if((h<=0&&f!=1)||(h>=c.mh&&f==1)){
            if(f==1){
                c.style.filter='';
                c.style.opacity=1;
                c.style.overflow='visible'
                }
            clearInterval(c.t);
            return
        }
        var d=(f==1)?Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
        c.style.opacity=o;
        c.style.filter='alpha(opacity='+(o*100)+')';
        c.style.height=h+(d*f)+'px'
    }
    return{
        dd:dd
    }
}();

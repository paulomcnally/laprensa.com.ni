
(function($,Edge,compId){var _=null,y=true,n=false,x77='271px',x84='rgba(85,85,85,1.00)',x24='-49px',qoc='easeOutCubic',x26='342px',x29='cloud3',x60='802px',ff='font-family',cl='clip',x70='rect(0px 123.93212890625px 172.838623046875px 0px)',x92='birdfly_stage',fs='font-size',x8='rgba(224,255,250,1.00)',e93='${_birdsprite_sym}',x17='243px',ta='text-align',x9='hidden',x76='birdsprite_sym4',x90='text_sym',x25='444px',s='style',x61='-31px',x2='1.5.0',e54='${_cloud2Copy}',h='height',i='none',x48='clouds_foreground_sym',x38='266px',x33='196px',po='center',x44='112px',x86='Text',lf='left',x59='-38px',x85='100',e83='${_birdsprite_sym4}',e82='${_birdsprite_sym4Copy2}',rz='rotateZ',x32='252px',x81='birdfly_sym',bg='background-color',x80='-19',x18='auto',x27='cloudCopy2',x23='493px',x79='birdsprite_sym4Copy2',e7='${_logo_sym}',x13='cloud',tp='top',x78='384px',e91='${_Text}',ov='overflow',e10='${_Stage}',x40='cloud2',x4='stage',x75='rect(@@0@@px @@1@@px @@2@@px @@3@@px)',zy='scaleY',t='transform',bp='background-position',x1='lato, sans-serif',c='color',x35='cloud3Copy',x74='@@0@@px @@1@@px',e73='${_birdsprite}',x72='birdsprite_sym',g='image',r='deg',x69='785px',x63='97px',x68='600px',x67='birdsprite',x66='clouds_background_sym',x65='147px',x46='363px',x16='315px',x62='161px',x='text',x58='-150px',x57='773px',e56='${_cloud3}',x14='-65px',x21='0px',e55='${_cloudCopy2}',e5='${_birdfly_stage}',e53='${_cloud3Copy}',x3='1.5.0.217',x28='93px',x37='18px',e51='${_cloud}',x88='960px',e49='${_cloud2}',p='px',x6='pointer',x47='74px',x30='746px',e11='${_clouds_foreground_sym}',x43='146px',x19='rgba(0,0,0,0)',e52='${symbolSelector}',zx='scaleX',x42='38px',dt='Default Timeline',x15='20px',a='Base State',x39='207px',qq='easeInOutQuad',x41='673px',x22='cloudCopy',x36='349px',w='width',m='rect',e50='${_cloudCopy}',ql='linear',x31='24px',x45='cloud2Copy',e12='${_clouds_background_sym}',x89='208px';var im='images/';var g20='cloud.png',g34='cloud3.png',g71='birdsprite.png',g64='cloud2.png';var s87="Aqui Entre Nos";var fonts={};fonts[x1]='<script src=\"http://use.edgefonts.net/lato:n9,i4,n1,i7,i9,n7,i1,i3,n4,n3:all.js\"></script>';var P=Edge.P,T=Edge.T,A=Edge.A;var resources=[];var symbols={"stage":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:'clouds_background_sym',t:m,r:['195','27','auto','auto','auto','auto']},{id:'logo_sym',t:m,r:['207px','44px','auto','auto','auto','auto'],tf:[[],[],[],['0.665','0.665']]},{id:'text_sym',t:m,r:['0','139','auto','auto','auto','auto']},{id:'clouds_foreground_sym',t:m,r:['7','145','auto','auto','auto','auto']},{id:'birdfly_sym',t:m,r:['-358','-270','auto','auto','auto','auto']},{id:'birdfly_stage',t:m,r:['557','-153','auto','auto','auto','auto'],cu:['pointer']}],sI:[{id:'clouds_foreground_sym',sN:'clouds_foreground_sym'},{id:'clouds_background_sym',sN:'clouds_background_sym'},{id:'birdfly_stage',sN:'birdfly_stage'},{id:'birdfly_sym',sN:'birdfly_sym'},{id:'text_sym',sN:'text_sym'},{id:'logo_sym',sN:'logo_sym'}]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:10000,a:y,tt:[]}}},"clouds_foreground_sym":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:x13,t:g,r:[x14,x15,x16,x17,x18,x18],f:[x19,im+g20,x21,x21]},{id:x22,t:g,r:[x23,x24,x25,x26,x18,x18],f:[x19,im+g20,x21,x21]},{id:x27,t:g,r:[x28,x24,x25,x26,x18,x18],f:[x19,im+g20,x21,x21]},{id:x29,t:g,r:[x30,x31,x32,x33,x18,x18],f:[x19,im+g34,x21,x21]},{id:x35,t:g,r:[x36,x37,x38,x39,x18,x18],f:[x19,im+g34,x21,x21]},{id:x40,t:g,r:[x41,x42,x43,x44,x18,x18],f:[x19,im+g20,x21,x21]},{id:x45,t:g,r:[x46,x47,x43,x44,x18,x18],f:[x19,im+g20,x21,x21]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"clouds_background_sym":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:x13,t:g,r:[x57,x15,x16,x17,x18,x18],f:[x19,im+g20,x21,x21]},{id:x22,t:g,r:[x23,x24,x25,x26,x18,x18],f:[x19,im+g20,x21,x21]},{id:x27,t:g,r:[x58,x59,x25,x26,x18,x18],f:[x19,im+g20,x21,x21]},{id:x40,t:g,r:[x60,x61,x62,x63,x18,x18],f:[x19,im+g64,x21,x21]},{id:x29,t:g,r:[x65,x15,x32,x33,x18,x18],f:[x19,im+g34,x21,x21]},{id:x35,t:g,r:[x36,x37,x38,x39,x18,x18],f:[x19,im+g34,x21,x21]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:y,tt:[]}}},"birdsprite_sym":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{t:g,id:x67,r:[x21,x21,x68,x69,x18,x18],cl:[x70],f:[x19,im+g71,x21,x21]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:236,a:n,l:{"still":80},tt:[]}}},"birdfly_sym":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:x76,t:m,r:[x77,x78,x18,x18,x18,x18]},{id:x79,t:m,r:[x77,x78,x18,x18,x18,x18],tf:[[0,0],[x80]]}],sI:[{id:'birdsprite_sym4Copy2',sN:'birdsprite_sym'},{id:'birdsprite_sym4',sN:'birdsprite_sym'}]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:6342,a:y,tt:[{id:"eid110",tr:[function(e,d){this.eSA(e,d);},['play','${_birdsprite_sym4}',[]],""],p:0},{id:"eid111",tr:[function(e,d){this.eSA(e,d);},['play','${_birdsprite_sym4Copy2}',[]],""],p:0}]}}},"text_sym":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{n:[x1,125,x84,x85,i,''],t:x,id:x86,text:s87,align:po,r:[x21,x21,x88,x89,x18,x18]}],sI:[]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:0,a:n,tt:[]}}},"birdfly_stage":{v:x2,mv:x2,b:x3,bS:a,iS:a,gpu:n,rI:n,cn:{dom:[{id:x72,t:m,r:[x77,x78,x18,x18,x18,x18]}],sI:[{id:'birdsprite_sym',sN:'birdsprite_sym'}]},s:{},tl:{"Default Timeline":{fS:a,tS:"",d:3000,a:n,tt:[{id:"eid98",tr:[function(e,d){this.eSA(e,d);},['play','${_birdsprite_sym}',[]],""],p:0},{id:"eid97",tr:[function(e,d){this.eSA(e,d);},['stop','${_birdsprite_sym}',['still']],""],p:3000}]}}}};var S1=symbols[x4];var tl0=S1.tl[dt].tt,st1=S1.s[a]={},A1=A(_,tl0,st1);A1.A(e5).P(tp,132).P(zy,1.48,t,_,"").P(zx,1.48,t).P(lf,155,_,_,p).P("cursor",x6);A1.A(e7).P(zx,0.66,t,_,"").P(tp,44,_,_,p).P(lf,207).P(zy,0.66,t,_,"");A1.A(e10).P(bg,x8,c).P(ov,x9).P(h,400).P(w,960).P("background-image",[261,[['rgba(255,164,235,1.00)',0],['rgba(239,244,211,1.00)',52],['rgba(216,255,253,1.00)',100]]],"gradient").T(0,[286,[['rgba(235,255,133,1.00)',0],['rgba(139,255,249,1.00)',100],['rgba(139,255,249,1.00)',100]]],10,ql);A1.A(e11).P(tp,208).P(zy,1.54,t,_,"").P(zx,1.54,t).P(lf,60,_,_,p).T(0,-353,10,ql).P("filter.blur",10,"subproperty").T(0,0,10);A1.A(e12).P(tp,114).T(10,114).P("filter.blur",0,"subproperty").T(0,10,10,ql).P(lf,52).T(0,-66,10);var S2=symbols[x48];var tl1=S2.tl[dt].tt,st2=S2.s[a]={},A2=A(_,tl1,st2);A2.A(e49).P(h,112).P(tp,38).P(lf,673).P(w,146);A2.A(e50).P(h,342).P(tp,-49).P(lf,493).P(w,444);A2.A(e51).P(lf,-65).P(tp,20);A2.A(e52).P(h,243).P(w,315);A2.A(e53).P(h,207).P(tp,18).P(lf,349).P(w,266);A2.A(e54).P(tp,74).P(h,112).P(lf,363).P(w,146);A2.A(e55).P(tp,-49).P(h,342).P(lf,93).P(w,444);A2.A(e56).P(lf,746).P(tp,24);var S3=symbols[x66];var tl2=S3.tl[dt].tt,st3=S3.s[a]={},A3=A(_,tl2,st3);A3.A(e50).P(tp,-49).P(h,342).P(lf,493).P(w,444);A3.A(e49).P(h,97).P(tp,-31).P(lf,802).P(w,161);A3.A(e56).P(lf,147).P(tp,20);A3.A(e55).P(h,342).P(tp,-38).P(lf,-150).P(w,444);A3.A(e52).P(h,243).P(w,315);A3.A(e51).P(lf,773).P(tp,20);A3.A(e53).P(tp,18).P(h,207).P(lf,349).P(w,266);var S4=symbols[x72];var tl3=S4.tl[dt].tt,st4=S4.s[a]={},A4=A(_,tl3,st4);A4.A(e52).P(h,193).P(w,212);A4.A(e73).P(tp,0).P(lf,46).P(bp,[0,0],_,x74).T(0,[0,0]).T(0.013,[-120,0]).T(0.026,[-240,0]).T(0.039,[-360,0]).T(0.054,[-480,0]).T(0.066,[0,-157]).T(0.08,[-120,-157]).T(0.093,[-240,-157]).T(0.105,[-360,-157]).T(0.119,[-480,-157]).T(0.132,[0,-314]).T(0.145,[-120,-314]).T(0.16,[-240,-314]).T(0.172,[-360,-314]).T(0.183,[-480,-314]).T(0.197,[0,-471]).T(0.21,[-120,-471]).T(0.223,[-240,-471]).T(0.236,[-360,-471]).P(cl,[0,123.93212890625,154.9427490234375,0],_,x75).T(0,[0,123.93212890625,154.9427490234375,0]);var S5=symbols[x81];var tl4=S5.tl[dt].tt,st5=S5.s[a]={},A5=A(_,tl4,st5);A5.A(e52).P(h,412).P(w,339);A5.A(e82).P(zy,-0.53,t,_,"").P(rz,-19,t,_,r).P(zx,-0.53,t,_,"").P(tp,499,_,_,p).T(1.5,160,1.899,ql).P("filter.blur",0,"subproperty").T(2.149,10,1.25).P(lf,183).T(1.5,1276,1.899);A5.A(e83).P(tp,265).T(0,550,1.899,ql).P(zy,-0.53,t,_,"").T(0,-0.72,1.899).P(zx,-0.53,t).T(0,-0.72,1.899).P("filter.blur",10,"subproperty",_,p).T(0,0,1.25).P(lf,177).T(0,1290,1.899,_,178);var S6=symbols[x90];var tl5=S6.tl[dt].tt,st6=S6.s[a]={},A6=A(_,tl5,st6);A6.A(e91).P(tp,0).P(w,960).P(ta,po).P(ff,x1).P(c,x84,c).P("font-weight",100,_,_,"").P(lf,0,_,_,p).P(fs,125);A6.A(e52).P(h,208).P(w,960);var S7=symbols[x92];var tl6=S7.tl[dt].tt,st7=S7.s[a]={},A7=A(_,tl6,st7);A7.A(e52).P(h,83).P(w,99);A7.A(e93).P(zy,-0.53,t,_,"").P(zx,-0.53,t).P(tp,-46,_,_,p).T(0,-286,1.903,qq).T(2.4,-46,0.6,qoc,31).P("filter.blur",0,"subproperty").T(0,10,1.903).T(2.4,0).P(lf,-50).T(0,641,1.903,qq).T(2.4,-50,0.6,qoc,-332);Edge.registerCompositionDefn(compId,symbols,fonts,resources);$(window).ready(function(){Edge.launchComposition(compId);});})(jQuery,AdobeEdge,"EDGE-78729757");


(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'doap'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",50629,function(sym,e){for(i=0;i<500;i++){sym.play(0);}});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_click-here}","click",function(sym,e){window.open("http://doap.com","_self");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_binary}","click",function(sym,e){window.open("http://doap.com","_self");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_backgrounds}","click",function(sym,e){window.open("http://doap.com","_self");});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_development}","click",function(sym,e){window.open("http://doap.com","_self");});
//Edge binding end
})("doap");
//Edge symbol end:'doap'

//=========================================================

//Edge symbol: 'development'
(function(symbolName){})("development");
//Edge symbol end:'development'
})(jQuery,AdobeEdge,"EDGE-355884116");

(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindTimelineAction(compId,symbolName,"Default Timeline","play",function(sym,e){this.play(0);});
//Edge binding end
Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",15250,function(sym,e){this.play(0);});
//Edge binding end
})("stage");
//Edge symbol end:'stage'
})(jQuery,AdobeEdge,"EDGE-464535094");
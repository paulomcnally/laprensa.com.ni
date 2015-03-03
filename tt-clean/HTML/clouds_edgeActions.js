
(function($,Edge,compId){var Composition=Edge.Composition,Symbol=Edge.Symbol;
//Edge symbol: 'stage'
(function(symbolName){Symbol.bindElementAction(compId,symbolName,"${_Stage}","mousemove",function(sym,e){this.onMove(e.pageX,e.pageY);});
//Edge binding end
Symbol.bindSymbolAction(compId,symbolName,"creationComplete",function(sym,e){this.onMove=function(posX,posY){timelineControl=Number(posX)*10;sym.stop(timelineControl);}});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"document","compositionReady",function(sym,e){var stageHeight=sym.$('Stage').height();sym.$("#Stage").css({"transform-origin":"0 0","-ms-transform-origin":"0 0","-webkit-transform-origin":"0 0","-moz-transform-origin":"0 0","-o-transform-origin":"0 0"});function scaleStage(){var stage=sym.$('Stage');var parent=sym.$('Stage').parent();var parentWidth=stage.parent().width();var stageWidth=stage.width();var desiredWidth=Math.round(parentWidth*1);var rescale=(desiredWidth/stageWidth);stage.css('transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');stage.css('-ms-transform','scale('+rescale+')');stage.css('-webkit-transform','scale('+rescale+')');stage.css('-moz-transform','scale('+rescale+')');stage.css('-o-transform','scale('+rescale+')');parent.height(stageHeight*rescale);}
$(window).on('resize',function(){scaleStage();});$(document).ready(function(){scaleStage();});});
//Edge binding end
Symbol.bindElementAction(compId,symbolName,"${_birdfly_stage}","click",function(sym,e){sym.getSymbol("birdfly_stage").play(0);});
//Edge binding end
})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'clouds_foreground_sym'
(function(symbolName){})("clouds_foreground_sym");
//Edge symbol end:'clouds_foreground_sym'

//=========================================================

//Edge symbol: 'clouds_foreground_sym_1'
(function(symbolName){})("clouds_background_sym");
//Edge symbol end:'clouds_background_sym'

//=========================================================

//Edge symbol: 'birdsprite_sym'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",236,function(sym,e){sym.play(0);});
//Edge binding end
})("birdsprite_sym");
//Edge symbol end:'birdsprite_sym'

//=========================================================

//Edge symbol: 'birdfly_sym'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",6342,function(sym,e){sym.play(0);});
//Edge binding end
})("birdfly_sym");
//Edge symbol end:'birdfly_sym'

//=========================================================

//Edge symbol: 'logo_sym'
(function(symbolName){})("logo_sym");
//Edge symbol end:'logo_sym'

//=========================================================

//Edge symbol: 'text_sym'
(function(symbolName){})("text_sym");
//Edge symbol end:'text_sym'

//=========================================================

//Edge symbol: 'birdfly_sym_1'
(function(symbolName){Symbol.bindTriggerAction(compId,symbolName,"Default Timeline",3000,function(sym,e){sym.stop();});
//Edge binding end
})("birdfly_stage");
//Edge symbol end:'birdfly_stage'
})(jQuery,AdobeEdge,"EDGE-78729757");
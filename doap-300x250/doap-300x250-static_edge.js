/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};


var resources = [
];
var symbols = {
"stage": {
   version: "1.0.0",
   minimumCompatibleVersion: "0.1.7",
   build: "1.0.0.185",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
         dom: [
         {
            id:'tiger',
            type:'image',
            rect:['-156px','-271px','612px','792px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"tiger.svg",'0px','0px'],
            transform:[[],[],[],['0.78','0.6']]
         },
         {
            id:'doap-logo',
            type:'image',
            rect:['42px','174px','274px','63px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"doap-logo.png",'0px','0px'],
            transform:[[],[],[],['0.6','0.6']]
         }],
         symbolInstances: [

         ]
      },
   states: {
      "Base State": {
         "${_Stage}": [
            ["color", "background-color", 'rgba(255,255,255,0.00)'],
            ["style", "width", '300px'],
            ["style", "height", '250px'],
            ["style", "overflow", 'hidden']
         ],
         "${_doap-logo}": [
            ["transform", "scaleX", '0.6'],
            ["style", "top", '174.27px'],
            ["transform", "scaleY", '0.6'],
            ["style", "left", '41.83px']
         ],
         "${_tiger}": [
            ["style", "top", '-271.4px'],
            ["transform", "scaleY", '0.6'],
            ["style", "left", '-156.32px'],
            ["transform", "scaleX", '0.78']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 0,
         autoPlay: true,
         timeline: [
         ]
      }
   }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-570605265");

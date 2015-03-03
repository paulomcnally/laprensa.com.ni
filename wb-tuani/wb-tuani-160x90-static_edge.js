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
            id:'doap-logo',
            type:'image',
            rect:['42px','174px','274px','63px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"doap-logo.png",'0px','0px'],
            transform:[[],[],[],['0.6','0.6']]
         },
         {
            id:'wherebananaslogo',
            type:'image',
            rect:['-190px','-176px','640px','480px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"wherebananaslogo.svg",'0px','0px'],
            transform:[[],[],[],['0.4','0.25']]
         }],
         symbolInstances: [

         ]
      },
   states: {
      "Base State": {
         "${_Stage}": [
            ["color", "background-color", 'rgba(255,255,255,0.00)'],
            ["style", "width", '260px'],
            ["style", "height", '90px'],
            ["style", "overflow", 'hidden']
         ],
         "${_wherebananaslogo}": [
            ["style", "top", '-176.32px'],
            ["transform", "scaleY", '0.25'],
            ["style", "left", '-190px'],
            ["transform", "scaleX", '0.4']
         ],
         "${_doap-logo}": [
            ["transform", "scaleX", '0.6'],
            ["style", "top", '174.27px'],
            ["transform", "scaleY", '0.6'],
            ["style", "left", '41.83px']
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

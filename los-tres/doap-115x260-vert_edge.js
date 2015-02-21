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
            id:'sun-bright',
            type:'image',
            rect:['-248px','-318px','612px','792px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"sun-bright.svg",'0px','0px'],
            transform:[[],[],[],['0.2','0.2']]
         },
         {
            id:'beach-glasses',
            type:'image',
            rect:['-246px','-99px','612px','792px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"beach-glasses.svg",'0px','0px'],
            transform:[[],[],[],['0.7','0.7']]
         },
         {
            id:'doap-logo',
            type:'image',
            rect:['-78px','103px','274px','63px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"doap-logo.png",'0px','0px'],
            transform:[[],[],[],['0.4','0.4']]
         },
         {
            id:'Text',
            type:'text',
            rect:['19px','154px','auto','auto','auto','auto'],
            text:"servers<br>hosting<br>design",
            font:['Arial, Helvetica, sans-serif',24,"rgba(0,0,0,1)","normal","none",""]
         },
         {
            id:'Text2',
            type:'text',
            rect:['7px','157px','auto','auto','auto','auto'],
            text:"DevOps<br>and<br>Platforms",
            align:"left",
            font:['Arial, Helvetica, sans-serif',24,"rgba(0,0,0,1)","normal","none","normal"]
         }],
         symbolInstances: [

         ]
      },
   states: {
      "Base State": {
         "${_beach-glasses}": [
            ["style", "top", '-98.85px'],
            ["transform", "scaleX", '0.7'],
            ["transform", "scaleY", '0.7'],
            ["style", "left", '-246.07px']
         ],
         "${_doap-logo}": [
            ["style", "top", '103.2px'],
            ["style", "left", '-78.5px'],
            ["transform", "scaleY", '0.4'],
            ["transform", "scaleX", '0.4']
         ],
         "${_Stage}": [
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "overflow", 'hidden'],
            ["style", "height", '360px'],
            ["style", "width", '115px']
         ],
         "${_sun-bright}": [
            ["style", "top", '-334.55px'],
            ["transform", "scaleY", '0.2'],
            ["transform", "rotateZ", '0deg'],
            ["transform", "scaleX", '0.2'],
            ["style", "left", '-248.2px']
         ],
         "${_Text2}": [
            ["style", "top", '157px'],
            ["style", "opacity", '0'],
            ["style", "left", '7px']
         ],
         "${_Text}": [
            ["style", "top", '154px'],
            ["style", "opacity", '1'],
            ["style", "left", '19px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 14741,
         autoPlay: true,
         labels: {
            "Label 1": 14741
         },
         timeline: [
            { id: "eid55", tween: [ "style", "${_Text2}", "opacity", '1', { fromValue: '0'}], position: 10000, duration: 1737 },
            { id: "eid57", tween: [ "style", "${_Text2}", "opacity", '0', { fromValue: '1'}], position: 11737, duration: 1737 },
            { id: "eid15", tween: [ "transform", "${_sun-bright}", "rotateZ", '-360deg', { fromValue: '0deg'}], position: 0, duration: 14741 },
            { id: "eid16", tween: [ "style", "${_sun-bright}", "top", '-334.55px', { fromValue: '-334.55px'}], position: 0, duration: 0 },
            { id: "eid54", tween: [ "style", "${_Text}", "opacity", '0', { fromValue: '1'}], position: 5000, duration: 2027 }         ]
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
})(jQuery, AdobeEdge, "EDGE-0665_1528");

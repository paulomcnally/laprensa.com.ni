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
            id:'wordpress-logo',
            type:'image',
            rect:['-5px','14px','274px','63px','auto','auto'],
            fill:["rgba(0,0,0,0)",im+"wordpress-logo.png",'0px','0px'],
            transform:[[],[],[],['0.66','0.66']]
         }],
         symbolInstances: [

         ]
      },
   states: {
      "Base State": {
         "${_Stage}": [
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "width", '260px'],
            ["style", "height", '90px'],
            ["style", "overflow", 'visible']
         ],
         "${_wordpress-logo}": [
            ["style", "top", '14px'],
            ["transform", "scaleY", '0.3'],
            ["transform", "rotateZ", '-360deg'],
            ["transform", "scaleX", '0.3'],
            ["style", "left", '-5px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 30000,
         autoPlay: true,
         timeline: [
            { id: "eid7", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 1000, duration: 500 },
            { id: "eid8", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 1500, duration: 500 },
            { id: "eid9", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 2000, duration: 500 },
            { id: "eid10", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 2500, duration: 500 },
            { id: "eid20", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 3000, duration: 500 },
            { id: "eid21", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 3500, duration: 500 },
            { id: "eid22", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 4000, duration: 500 },
            { id: "eid23", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 4500, duration: 500 },
            { id: "eid24", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 5000, duration: 500 },
            { id: "eid25", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 5500, duration: 500 },
            { id: "eid26", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 6000, duration: 500 },
            { id: "eid27", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 6500, duration: 500 },
            { id: "eid42", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 18500, duration: 500 },
            { id: "eid43", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 19000, duration: 500 },
            { id: "eid44", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 19500, duration: 500 },
            { id: "eid45", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 20000, duration: 500 },
            { id: "eid46", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 20500, duration: 500 },
            { id: "eid47", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 21000, duration: 500 },
            { id: "eid48", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 21500, duration: 500 },
            { id: "eid49", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 22000, duration: 500 },
            { id: "eid50", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 22500, duration: 500 },
            { id: "eid51", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 23000, duration: 500 },
            { id: "eid52", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 23500, duration: 500 },
            { id: "eid53", tween: [ "transform", "${_wordpress-logo}", "rotateZ", '0deg', { fromValue: '-360deg'}], position: 24000, duration: 500 },
            { id: "eid2", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.66', { fromValue: '0.3'}], position: 1000, duration: 500 },
            { id: "eid32", tween: [ "transform", "${_wordpress-logo}", "scaleX", '2', { fromValue: '0.66'}], position: 1500, duration: 2500 },
            { id: "eid33", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.66', { fromValue: '2'}], position: 4000, duration: 2500 },
            { id: "eid14", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.3', { fromValue: '0.66'}], position: 6500, duration: 500 },
            { id: "eid54", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.66', { fromValue: '0.3'}], position: 18500, duration: 500 },
            { id: "eid55", tween: [ "transform", "${_wordpress-logo}", "scaleX", '2', { fromValue: '0.66'}], position: 19000, duration: 2500 },
            { id: "eid56", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.66', { fromValue: '2'}], position: 21500, duration: 2500 },
            { id: "eid57", tween: [ "transform", "${_wordpress-logo}", "scaleX", '0.3', { fromValue: '0.66'}], position: 24000, duration: 500 },
            { id: "eid15", tween: [ "style", "${_wordpress-logo}", "left", '-5px', { fromValue: '-5px'}], position: 1000, duration: 0 },
            { id: "eid58", tween: [ "style", "${_wordpress-logo}", "left", '-5px', { fromValue: '-5px'}], position: 18500, duration: 0 },
            { id: "eid4", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.66', { fromValue: '0.3'}], position: 1000, duration: 500 },
            { id: "eid34", tween: [ "transform", "${_wordpress-logo}", "scaleY", '2', { fromValue: '0.66'}], position: 1500, duration: 2500 },
            { id: "eid35", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.66', { fromValue: '2'}], position: 4000, duration: 2500 },
            { id: "eid13", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.3', { fromValue: '0.66'}], position: 6500, duration: 500 },
            { id: "eid38", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.66', { fromValue: '0.3'}], position: 18500, duration: 500 },
            { id: "eid39", tween: [ "transform", "${_wordpress-logo}", "scaleY", '2', { fromValue: '0.66'}], position: 19000, duration: 2500 },
            { id: "eid40", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.66', { fromValue: '2'}], position: 21500, duration: 2500 },
            { id: "eid41", tween: [ "transform", "${_wordpress-logo}", "scaleY", '0.3', { fromValue: '0.66'}], position: 24000, duration: 500 },
            { id: "eid17", tween: [ "style", "${_wordpress-logo}", "top", '268px', { fromValue: '14px'}], position: 1000, duration: 3000 },
            { id: "eid19", tween: [ "style", "${_wordpress-logo}", "top", '14px', { fromValue: '268px'}], position: 4000, duration: 3000 },
            { id: "eid36", tween: [ "style", "${_wordpress-logo}", "top", '268px', { fromValue: '14px'}], position: 18500, duration: 3000 },
            { id: "eid37", tween: [ "style", "${_wordpress-logo}", "top", '14px', { fromValue: '268px'}], position: 21500, duration: 3000 }         ]
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
})(jQuery, AdobeEdge, "doap-466799262");

/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};
   fonts['lato, sans-serif']='<script src=\"http://use.edgefonts.net/lato:n9,i4,n1,i7,i9,n7,i1,i3,n4,n3:all.js\"></script>';


var resources = [
];
var symbols = {
"stage": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
         dom: [
         {
            id:'clouds_background_sym',
            type:'rect',
            rect:['195','27','auto','auto','auto','auto']
         },
         {
            id:'logo_sym',
            type:'rect',
            rect:['207px','44px','auto','auto','auto','auto'],
            transform:[[],[],[],['0.665','0.665']]
         },
         {
            id:'text_sym',
            type:'rect',
            rect:['0','139','auto','auto','auto','auto']
         },
         {
            id:'clouds_foreground_sym',
            type:'rect',
            rect:['7','145','auto','auto','auto','auto']
         },
         {
            id:'birdfly_sym',
            type:'rect',
            rect:['-358','-270','auto','auto','auto','auto']
         },
         {
            id:'birdfly_stage',
            type:'rect',
            rect:['557','-153','auto','auto','auto','auto'],
            cursor:['pointer']
         }],
         symbolInstances: [
         {
            id:'clouds_foreground_sym',
            symbolName:'clouds_foreground_sym'
         },
         {
            id:'clouds_background_sym',
            symbolName:'clouds_background_sym'
         },
         {
            id:'birdfly_stage',
            symbolName:'birdfly_stage'
         },
         {
            id:'birdfly_sym',
            symbolName:'birdfly_sym'
         },
         {
            id:'text_sym',
            symbolName:'text_sym'
         },
         {
            id:'logo_sym',
            symbolName:'logo_sym'
         }
         ]
      },
   states: {
      "Base State": {
         "${_clouds_foreground_sym}": [
            ["style", "top", '208px'],
            ["transform", "scaleY", '1.53839'],
            ["transform", "scaleX", '1.53839'],
            ["subproperty", "filter.blur", '10px'],
            ["style", "left", '60px']
         ],
         "${_birdfly_stage}": [
            ["style", "top", '132px'],
            ["transform", "scaleY", '1.47649'],
            ["transform", "scaleX", '1.47649'],
            ["style", "left", '155px'],
            ["style", "cursor", 'pointer']
         ],
         "${_clouds_background_sym}": [
            ["style", "top", '114px'],
            ["subproperty", "filter.blur", '0px'],
            ["style", "left", '52px']
         ],
         "${_logo_sym}": [
            ["transform", "scaleX", '0.66468'],
            ["style", "top", '44px'],
            ["style", "left", '207px'],
            ["transform", "scaleY", '0.66468']
         ],
         "${_Stage}": [
            ["color", "background-color", 'rgba(224,255,250,1.00)'],
            ["style", "overflow", 'hidden'],
            ["style", "height", '400px'],
            ["gradient", "background-image", [261,[['rgba(255,164,235,1.00)',0],['rgba(239,244,211,1.00)',52],['rgba(216,255,253,1.00)',100]]]],
            ["style", "width", '960px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 10000,
         autoPlay: true,
         timeline: [
            { id: "eid12", tween: [ "style", "${_clouds_background_sym}", "top", '114px', { fromValue: '114px'}], position: 10000, duration: 0 },
            { id: "eid16", tween: [ "subproperty", "${_clouds_foreground_sym}", "filter.blur", '0px', { fromValue: '10px'}], position: 0, duration: 10000 },
            { id: "eid1", tween: [ "gradient", "${_Stage}", "background-image", [286,[['rgba(235,255,133,1.00)',0],['rgba(139,255,249,1.00)',100],['rgba(139,255,249,1.00)',100]]], { fromValue: [261,[['rgba(255,164,235,1.00)',0],['rgba(239,244,211,1.00)',52],['rgba(216,255,253,1.00)',100]]]}], position: 0, duration: 10000 },
            { id: "eid14", tween: [ "subproperty", "${_clouds_background_sym}", "filter.blur", '10px', { fromValue: '0px'}], position: 0, duration: 10000 },
            { id: "eid13", tween: [ "style", "${_clouds_background_sym}", "left", '-66px', { fromValue: '52px'}], position: 0, duration: 10000 },
            { id: "eid7", tween: [ "style", "${_clouds_foreground_sym}", "left", '-353px', { fromValue: '60px'}], position: 0, duration: 10000 }         ]
      }
   }
},
"clouds_foreground_sym": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'cloud',
      type: 'image',
      rect: ['-65px','20px','315px','243px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloudCopy',
      type: 'image',
      rect: ['493px','-49px','444px','342px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloudCopy2',
      type: 'image',
      rect: ['93px','-49px','444px','342px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloud3',
      type: 'image',
      rect: ['746px','24px','252px','196px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud3.png','0px','0px']
   },
   {
      id: 'cloud3Copy',
      type: 'image',
      rect: ['349px','18px','266px','207px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud3.png','0px','0px']
   },
   {
      id: 'cloud2',
      type: 'image',
      rect: ['673px','38px','146px','112px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloud2Copy',
      type: 'image',
      rect: ['363px','74px','146px','112px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_cloud2}": [
            ["style", "height", '112px'],
            ["style", "top", '38px'],
            ["style", "left", '673px'],
            ["style", "width", '146px']
         ],
         "${_cloudCopy}": [
            ["style", "height", '342px'],
            ["style", "top", '-49px'],
            ["style", "left", '493px'],
            ["style", "width", '444px']
         ],
         "${_cloud}": [
            ["style", "left", '-65px'],
            ["style", "top", '20px']
         ],
         "${symbolSelector}": [
            ["style", "height", '243px'],
            ["style", "width", '315px']
         ],
         "${_cloud3Copy}": [
            ["style", "height", '207px'],
            ["style", "top", '18px'],
            ["style", "left", '349px'],
            ["style", "width", '266px']
         ],
         "${_cloud2Copy}": [
            ["style", "top", '74px'],
            ["style", "height", '112px'],
            ["style", "left", '363px'],
            ["style", "width", '146px']
         ],
         "${_cloudCopy2}": [
            ["style", "top", '-49px'],
            ["style", "height", '342px'],
            ["style", "left", '93px'],
            ["style", "width", '444px']
         ],
         "${_cloud3}": [
            ["style", "left", '746px'],
            ["style", "top", '24px']
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
},
"clouds_background_sym": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'cloud',
      type: 'image',
      rect: ['773px','20px','315px','243px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloudCopy',
      type: 'image',
      rect: ['493px','-49px','444px','342px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloudCopy2',
      type: 'image',
      rect: ['-150px','-38px','444px','342px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud.png','0px','0px']
   },
   {
      id: 'cloud2',
      type: 'image',
      rect: ['802px','-31px','161px','97px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud2.png','0px','0px']
   },
   {
      id: 'cloud3',
      type: 'image',
      rect: ['147px','20px','252px','196px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud3.png','0px','0px']
   },
   {
      id: 'cloud3Copy',
      type: 'image',
      rect: ['349px','18px','266px','207px','auto','auto'],
      fill: ['rgba(0,0,0,0)','images/cloud3.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_cloudCopy}": [
            ["style", "top", '-49px'],
            ["style", "height", '342px'],
            ["style", "left", '493px'],
            ["style", "width", '444px']
         ],
         "${_cloud2}": [
            ["style", "height", '97px'],
            ["style", "top", '-31px'],
            ["style", "left", '802px'],
            ["style", "width", '161px']
         ],
         "${_cloud3}": [
            ["style", "left", '147px'],
            ["style", "top", '20px']
         ],
         "${_cloudCopy2}": [
            ["style", "height", '342px'],
            ["style", "top", '-38px'],
            ["style", "left", '-150px'],
            ["style", "width", '444px']
         ],
         "${symbolSelector}": [
            ["style", "height", '243px'],
            ["style", "width", '315px']
         ],
         "${_cloud}": [
            ["style", "left", '773px'],
            ["style", "top", '20px']
         ],
         "${_cloud3Copy}": [
            ["style", "top", '18px'],
            ["style", "height", '207px'],
            ["style", "left", '349px'],
            ["style", "width", '266px']
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
},
"birdsprite_sym": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      type: 'image',
      id: 'birdsprite',
      rect: ['0px','0px','600px','785px','auto','auto'],
      clip: ['rect(0px 123.93212890625px 172.838623046875px 0px)'],
      fill: ['rgba(0,0,0,0)','images/birdsprite.png','0px','0px']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_birdsprite}": [
            ["style", "top", '0px'],
            ["style", "background-position", [0,0], {valueTemplate:'@@0@@px @@1@@px'} ],
            ["style", "clip", [0,123.93212890625,154.9427490234375,0], {valueTemplate:'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'} ],
            ["style", "left", '46px']
         ],
         "${symbolSelector}": [
            ["style", "height", '193px'],
            ["style", "width", '212px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 236,
         autoPlay: false,
         labels: {
            "still": 80
         },
         timeline: [
            { id: "eid17", tween: [ "style", "${_birdsprite}", "background-position", [0,0], { valueTemplate: '@@0@@px @@1@@px', fromValue: [0,0]}], position: 0, duration: 0 },
            { id: "eid18", tween: [ "style", "${_birdsprite}", "background-position", [-120,0], { valueTemplate: '@@0@@px @@1@@px', fromValue: [0,0]}], position: 13, duration: 0 },
            { id: "eid19", tween: [ "style", "${_birdsprite}", "background-position", [-240,0], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-120,0]}], position: 26, duration: 0 },
            { id: "eid20", tween: [ "style", "${_birdsprite}", "background-position", [-360,0], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-240,0]}], position: 39, duration: 0 },
            { id: "eid21", tween: [ "style", "${_birdsprite}", "background-position", [-480,0], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-360,0]}], position: 54, duration: 0 },
            { id: "eid23", tween: [ "style", "${_birdsprite}", "background-position", [0,-157], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-480,0]}], position: 66, duration: 0 },
            { id: "eid24", tween: [ "style", "${_birdsprite}", "background-position", [-120,-157], { valueTemplate: '@@0@@px @@1@@px', fromValue: [0,-157]}], position: 80, duration: 0 },
            { id: "eid25", tween: [ "style", "${_birdsprite}", "background-position", [-240,-157], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-120,-157]}], position: 93, duration: 0 },
            { id: "eid26", tween: [ "style", "${_birdsprite}", "background-position", [-360,-157], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-240,-157]}], position: 105, duration: 0 },
            { id: "eid27", tween: [ "style", "${_birdsprite}", "background-position", [-480,-157], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-360,-157]}], position: 119, duration: 0 },
            { id: "eid29", tween: [ "style", "${_birdsprite}", "background-position", [0,-314], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-480,-157]}], position: 132, duration: 0 },
            { id: "eid30", tween: [ "style", "${_birdsprite}", "background-position", [-120,-314], { valueTemplate: '@@0@@px @@1@@px', fromValue: [0,-314]}], position: 145, duration: 0 },
            { id: "eid31", tween: [ "style", "${_birdsprite}", "background-position", [-240,-314], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-120,-314]}], position: 160, duration: 0 },
            { id: "eid32", tween: [ "style", "${_birdsprite}", "background-position", [-360,-314], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-240,-314]}], position: 172, duration: 0 },
            { id: "eid35", tween: [ "style", "${_birdsprite}", "background-position", [-480,-314], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-360,-314]}], position: 183, duration: 0 },
            { id: "eid36", tween: [ "style", "${_birdsprite}", "background-position", [0,-471], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-480,-314]}], position: 197, duration: 0 },
            { id: "eid37", tween: [ "style", "${_birdsprite}", "background-position", [-120,-471], { valueTemplate: '@@0@@px @@1@@px', fromValue: [0,-471]}], position: 210, duration: 0 },
            { id: "eid38", tween: [ "style", "${_birdsprite}", "background-position", [-240,-471], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-120,-471]}], position: 223, duration: 0 },
            { id: "eid39", tween: [ "style", "${_birdsprite}", "background-position", [-360,-471], { valueTemplate: '@@0@@px @@1@@px', fromValue: [-240,-471]}], position: 236, duration: 0 },
            { id: "eid56", tween: [ "style", "${_birdsprite}", "clip", [0,123.93212890625,154.9427490234375,0], { valueTemplate: 'rect(@@0@@px @@1@@px @@2@@px @@3@@px)', fromValue: [0,123.93212890625,154.9427490234375,0]}], position: 0, duration: 0 }         ]
      }
   }
},
"birdfly_sym": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'birdsprite_sym4',
      type: 'rect',
      rect: ['271px','384px','auto','auto','auto','auto']
   },
   {
      id: 'birdsprite_sym4Copy2',
      type: 'rect',
      rect: ['271px','384px','auto','auto','auto','auto'],
      transform: [[0,0],['-19']]
   }],
   symbolInstances: [
   {
      id: 'birdsprite_sym4Copy2',
      symbolName: 'birdsprite_sym'
   },
   {
      id: 'birdsprite_sym4',
      symbolName: 'birdsprite_sym'
   }   ]
   },
   states: {
      "Base State": {
         "${_birdsprite_sym4}": [
            ["style", "top", '265px'],
            ["transform", "scaleY", '-0.52515'],
            ["transform", "scaleX", '-0.52515'],
            ["subproperty", "filter.blur", '10px'],
            ["style", "left", '177px']
         ],
         "${_birdsprite_sym4Copy2}": [
            ["style", "top", '499px'],
            ["transform", "scaleY", '-0.52515'],
            ["transform", "rotateZ", '-19deg'],
            ["transform", "scaleX", '-0.52515'],
            ["subproperty", "filter.blur", '0px'],
            ["style", "left", '183px']
         ],
         "${symbolSelector}": [
            ["style", "height", '412px'],
            ["style", "width", '339px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 6342,
         autoPlay: true,
         timeline: [
            { id: "eid74", tween: [ "subproperty", "${_birdsprite_sym4Copy2}", "filter.blur", '10px', { fromValue: '0px'}], position: 2149, duration: 1250 },
            { id: "eid66", tween: [ "style", "${_birdsprite_sym4}", "top", '550px', { fromValue: '265px'}], position: 0, duration: 1899 },
            { id: "eid67", tween: [ "transform", "${_birdsprite_sym4}", "scaleX", '-0.71994', { fromValue: '-0.52515'}], position: 0, duration: 1899 },
            { id: "eid70", tween: [ "subproperty", "${_birdsprite_sym4}", "filter.blur", '0px', { fromValue: '10px'}], position: 0, duration: 1250 },
            { id: "eid65", tween: [ "style", "${_birdsprite_sym4}", "left", '1290px', { fromValue: '178px'}], position: 0, duration: 1899 },
            { id: "eid68", tween: [ "transform", "${_birdsprite_sym4}", "scaleY", '-0.71994', { fromValue: '-0.52515'}], position: 0, duration: 1899 },
            { id: "eid71", tween: [ "style", "${_birdsprite_sym4Copy2}", "top", '160px', { fromValue: '499px'}], position: 1500, duration: 1899 },
            { id: "eid73", tween: [ "style", "${_birdsprite_sym4Copy2}", "left", '1276px', { fromValue: '183px'}], position: 1500, duration: 1899 },
            { id: "eid110", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['play', '${_birdsprite_sym4}', [] ], ""], position: 0 },
            { id: "eid111", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['play', '${_birdsprite_sym4Copy2}', [] ], ""], position: 0 }         ]
      }
   }
},
"text_sym": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      font: ['lato, sans-serif',125,'rgba(85,85,85,1.00)','100','none',''],
      type: 'text',
      id: 'Text',
      text: 'this is responsive',
      align: 'center',
      rect: ['0px','0px','960px','208px','auto','auto']
   }],
   symbolInstances: [
   ]
   },
   states: {
      "Base State": {
         "${_Text}": [
            ["style", "top", '0px'],
            ["style", "width", '960px'],
            ["style", "text-align", 'center'],
            ["style", "font-family", 'lato, sans-serif'],
            ["color", "color", 'rgba(85,85,85,1.00)'],
            ["style", "font-weight", '100'],
            ["style", "left", '0px'],
            ["style", "font-size", '125px']
         ],
         "${symbolSelector}": [
            ["style", "height", '208px'],
            ["style", "width", '960px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 0,
         autoPlay: false,
         timeline: [
         ]
      }
   }
},
"birdfly_stage": {
   version: "1.5.0",
   minimumCompatibleVersion: "1.5.0",
   build: "1.5.0.217",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: false,
   resizeInstances: false,
   content: {
   dom: [
   {
      id: 'birdsprite_sym',
      type: 'rect',
      rect: ['271px','384px','auto','auto','auto','auto']
   }],
   symbolInstances: [
   {
      id: 'birdsprite_sym',
      symbolName: 'birdsprite_sym'
   }   ]
   },
   states: {
      "Base State": {
         "${symbolSelector}": [
            ["style", "height", '83px'],
            ["style", "width", '99px']
         ],
         "${_birdsprite_sym}": [
            ["style", "top", '-46px'],
            ["transform", "scaleY", '-0.52515'],
            ["transform", "scaleX", '-0.52515'],
            ["subproperty", "filter.blur", '0px'],
            ["style", "left", '-50px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3000,
         autoPlay: false,
         timeline: [
            { id: "eid109", tween: [ "subproperty", "${_birdsprite_sym}", "filter.blur", '10px', { fromValue: '0px'}], position: 0, duration: 1903, easing: "easeOutCubic" },
            { id: "eid105", tween: [ "subproperty", "${_birdsprite_sym}", "filter.blur", '0px', { fromValue: '10px'}], position: 2400, duration: 0, easing: "easeOutCubic" },
            { id: "eid90", tween: [ "style", "${_birdsprite_sym}", "top", '-286px', { fromValue: '-46px'}], position: 0, duration: 1903, easing: "easeInOutQuad" },
            { id: "eid95", tween: [ "style", "${_birdsprite_sym}", "top", '-46px', { fromValue: '31px'}], position: 2400, duration: 600, easing: "easeOutCubic" },
            { id: "eid89", tween: [ "style", "${_birdsprite_sym}", "left", '641px', { fromValue: '-50px'}], position: 0, duration: 1903, easing: "easeInOutQuad" },
            { id: "eid94", tween: [ "style", "${_birdsprite_sym}", "left", '-50px', { fromValue: '-332px'}], position: 2400, duration: 600, easing: "easeOutCubic" },
            { id: "eid98", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['play', '${_birdsprite_sym}', [] ], ""], position: 0 },
            { id: "eid97", trigger: [ function executeSymbolFunction(e, data) { this._executeSymbolAction(e, data); }, ['stop', '${_birdsprite_sym}', ['still'] ], ""], position: 3000 }         ]
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
})(jQuery, AdobeEdge, "EDGE-78729757");

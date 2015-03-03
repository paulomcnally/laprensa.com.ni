/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};
var opts = {};
var resources = [
];
var symbols = {
"stage": {
    version: "3.0.0",
    minimumCompatibleVersion: "3.0.0",
    build: "3.0.0.322",
    baseState: "Base State",
    scaleToFit: "none",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
            {
                id: 'hombrecito',
                type: 'image',
                rect: ['135px', '-54px','52px','45px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"hombrecito.png",'0px','0px']
            },
            {
                id: 'personas',
                type: 'image',
                rect: ['335px', '76px','120px','45px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"personas.png",'0px','0px']
            },
            {
                id: 'megafono',
                type: 'image',
                rect: ['327px', '0px','63px','45px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"megafono.png",'0px','0px']
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['43px', '9px','auto','auto','auto', 'auto'],
                text: "Opinión",
                font: ['Arial, Helvetica, sans-serif', [24, ""], "rgba(17,120,200,1.00)", "normal", "none", ""],
                textShadow: ["rgba(255,255,255,1.00)", 2, 2, 0]
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['234px', '92px','auto','auto','auto', 'auto'],
                text: "tú",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 24, "rgba(17,120,200,1)", "400", "none", "normal"]
            },
            {
                id: 'Text4',
                type: 'text',
                rect: ['170px', '73px','auto','auto','auto', 'auto'],
                text: "Cuenta",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 20, "rgba(17,120,200,1)", "400", "none", "normal"],
                textShadow: ["rgba(255,255,255,1.00)", 2, 2, 0]
            },
            {
                id: 'Rectangle',
                type: 'rect',
                rect: ['0px', '0px','320px','43px','auto', 'auto'],
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [1,"rgba(87,86,86,1.00)","solid"]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_hombrecito}": [
                ["style", "left", '135px'],
                ["style", "top", '-54px']
            ],
            "${_personas}": [
                ["style", "left", '335px'],
                ["style", "top", '76px']
            ],
            "${_Text}": [
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.offsetH", '2px'],
                ["color", "color", 'rgba(17,120,200,1.00)'],
                ["subproperty", "textShadow.offsetV", '2px'],
                ["style", "left", '43px'],
                ["style", "top", '9px'],
                ["transform", "scaleY", '0'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,1.00)'],
                ["style", "opacity", '1'],
                ["transform", "scaleX", '0']
            ],
            "${_Text4}": [
                ["style", "top", '73px'],
                ["subproperty", "textShadow.offsetH", '2px'],
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,1.00)'],
                ["subproperty", "textShadow.offsetV", '2px'],
                ["style", "left", '170px'],
                ["style", "font-size", '20px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "width", '322px'],
                ["style", "height", '45px'],
                ["style", "overflow", 'hidden']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["color", "border-color", 'rgba(87,86,86,1.00)'],
                ["style", "height", '43px'],
                ["style", "border-style", 'solid'],
                ["style", "border-width", '1px'],
                ["style", "width", '320px']
            ],
            "${_Text2}": [
                ["style", "top", '92px'],
                ["style", "left", '234px']
            ],
            "${_megafono}": [
                ["style", "top", '0px'],
                ["style", "left", '327px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 4695,
            autoPlay: true,
            timeline: [
                { id: "eid15", tween: [ "style", "${_Text2}", "left", '156px', { fromValue: '234px'}], position: 1708, duration: 292 },
                { id: "eid23", tween: [ "style", "${_Text2}", "left", '79px', { fromValue: '156px'}], position: 2907, duration: 420 },
                { id: "eid13", tween: [ "style", "${_hombrecito}", "left", '140px', { fromValue: '135px'}], position: 1250, duration: 359 },
                { id: "eid24", tween: [ "style", "${_hombrecito}", "left", '63px', { fromValue: '140px'}], position: 2907, duration: 420 },
                { id: "eid16", tween: [ "style", "${_personas}", "left", '202px', { fromValue: '335px'}], position: 2178, duration: 572 },
                { id: "eid5", tween: [ "style", "${_megafono}", "left", '0px', { fromValue: '327px'}], position: 0, duration: 750 },
                { id: "eid14", tween: [ "style", "${_Text2}", "top", '17px', { fromValue: '92px'}], position: 1708, duration: 292 },
                { id: "eid11", tween: [ "transform", "${_Text}", "scaleY", '1', { fromValue: '0'}], position: 750, duration: 376 },
                { id: "eid28", tween: [ "style", "${_Text4}", "left", '230px', { fromValue: '170px'}], position: 3500, duration: 250 },
                { id: "eid27", tween: [ "style", "${_Text4}", "top", '25px', { fromValue: '73px'}], position: 3500, duration: 250 },
                { id: "eid12", tween: [ "style", "${_hombrecito}", "top", '0px', { fromValue: '-54px'}], position: 1250, duration: 359 },
                { id: "eid9", tween: [ "transform", "${_Text}", "scaleX", '1', { fromValue: '0'}], position: 750, duration: 376 },
                { id: "eid22", tween: [ "style", "${_Text}", "left", '121px', { fromValue: '43px'}], position: 2907, duration: 420 },
                { id: "eid17", tween: [ "style", "${_personas}", "top", '0px', { fromValue: '76px'}], position: 2178, duration: 572 }            ]
        }
    }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-26607936");

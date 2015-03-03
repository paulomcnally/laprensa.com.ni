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
                id: 'Ellipse',
                type: 'ellipse',
                rect: ['-26px', '-46px','201px','202px','auto', 'auto'],
                clip: ['rect(45.0078125px 201px 92.84765625px 26.13671875px)'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(113,194,217,1.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['323px', '9px','auto','auto','auto', 'auto'],
                text: "HABLEMOS DEL IDIOMA",
                font: ['Times New Roman, Times, serif', [24, ""], "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['22px', '66px','auto','auto','auto', 'auto'],
                text: "Inés Izquierdo",
                align: "left",
                font: ['\'Times New Roman\', Times, serif', 24, "rgba(255,255,255,1.00)", "400", "none", "normal"]
            },
            {
                id: 'Group4',
                type: 'group',
                rect: ['22', '-1','45','45','auto', 'auto'],
                c: [
                {
                    id: 'Ellipse2',
                    type: 'ellipse',
                    rect: ['0px', '0px','45px','45px','auto', 'auto'],
                    borderRadius: ["50%", "50%", "50%", "50%"],
                    fill: ["rgba(158,162,162,1.00)"],
                    stroke: [0,"rgb(0, 0, 0)","none"]
                },
                {
                    id: 'Text3',
                    type: 'text',
                    rect: ['5px', '12px','auto','auto','auto', 'auto'],
                    text: "Hola",
                    align: "left",
                    font: ['\'Times New Roman\', Times, serif', 18, "rgba(255,255,255,1)", "400", "none", "normal"]
                }]
            },
            {
                id: 'Group',
                type: 'group',
                rect: ['79', '-58','66','45','auto', 'auto'],
                c: [
                {
                    id: 'Ellipse2Copy',
                    type: 'ellipse',
                    rect: ['0px', '0px','66px','45px','auto', 'auto'],
                    borderRadius: ["50%", "50%", "50%", "50%"],
                    fill: ["rgba(245,241,160,1.00)"],
                    stroke: [0,"rgb(0, 0, 0)","none"]
                },
                {
                    id: 'Text3Copy',
                    type: 'text',
                    rect: ['4px', '12px','auto','auto','auto', 'auto'],
                    text: "Gracias",
                    align: "left",
                    font: ['\'Times New Roman\', Times, serif', 18, "rgba(0,0,0,1.00)", "400", "none", "normal"]
                }]
            },
            {
                id: 'Group2',
                type: 'group',
                rect: ['152', '-58','55','45','auto', 'auto'],
                c: [
                {
                    id: 'Ellipse2Copy2',
                    type: 'ellipse',
                    rect: ['0px', '0px','55px','45px','auto', 'auto'],
                    borderRadius: ["50%", "50%", "50%", "50%"],
                    fill: ["rgba(208,152,232,1.00)"],
                    stroke: [0,"rgb(0, 0, 0)","none"]
                },
                {
                    id: 'Text3Copy2',
                    type: 'text',
                    rect: ['6px', '12px','auto','auto','auto', 'auto'],
                    text: "Adios",
                    align: "left",
                    font: ['\'Times New Roman\', Times, serif', 18, "rgba(255,255,255,1)", "400", "none", "normal"]
                }]
            },
            {
                id: 'Group3',
                type: 'group',
                rect: ['214', '-58','108','45','auto', 'auto'],
                c: [
                {
                    id: 'Ellipse2Copy3',
                    type: 'ellipse',
                    rect: ['0px', '0px','108px','45px','auto', 'auto'],
                    borderRadius: ["50%", "50%", "50%", "50%"],
                    fill: ["rgba(87,237,237,1.00)"],
                    stroke: [0,"rgb(0, 0, 0)","none"]
                },
                {
                    id: 'Text3Copy3',
                    type: 'text',
                    rect: ['8px', '12px','auto','auto','auto', 'auto'],
                    text: "Aprendamos",
                    align: "left",
                    font: ['\'Times New Roman\', Times, serif', 18, "rgba(255,255,255,1)", "400", "none", "normal"]
                }]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_Group}": [
                ["style", "top", '-58px'],
                ["style", "left", '79px']
            ],
            "${_Ellipse2}": [
                ["color", "background-color", 'rgba(158,162,162,1.00)'],
                ["style", "left", '0px'],
                ["style", "top", '-57px']
            ],
            "${_Text3Copy}": [
                ["style", "top", '12px'],
                ["color", "color", 'rgba(0,0,0,1.00)'],
                ["style", "left", '4px'],
                ["style", "font-size", '18px']
            ],
            "${_Group2}": [
                ["style", "top", '-58px'],
                ["style", "left", '152px']
            ],
            "${_Ellipse2Copy}": [
                ["color", "background-color", 'rgba(245,241,160,1.00)'],
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "width", '66px']
            ],
            "${_Text3Copy2}": [
                ["style", "top", '12px'],
                ["style", "left", '6px'],
                ["style", "font-size", '18px']
            ],
            "${_Text2}": [
                ["style", "top", '66px'],
                ["style", "left", '22px'],
                ["color", "color", 'rgba(255,255,255,1.00)']
            ],
            "${_Text3Copy3}": [
                ["style", "top", '12px'],
                ["style", "left", '8px'],
                ["style", "font-size", '18px']
            ],
            "${_Ellipse2Copy3}": [
                ["color", "background-color", 'rgba(87,237,237,1.00)'],
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "width", '108px']
            ],
            "${_Group3}": [
                ["style", "top", '-58px'],
                ["style", "left", '214px']
            ],
            "${_Text}": [
                ["style", "top", '9px'],
                ["style", "font-family", 'Times New Roman, Times, serif'],
                ["style", "left", '323px']
            ],
            "${_Group4}": [
                ["style", "left", '22px'],
                ["style", "top", '-1px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "width", '322px'],
                ["style", "height", '45px'],
                ["style", "overflow", 'hidden']
            ],
            "${_Text3}": [
                ["style", "top", '-45px'],
                ["style", "left", '5px'],
                ["style", "font-size", '18px']
            ],
            "${_Ellipse2Copy2}": [
                ["color", "background-color", 'rgba(208,152,232,1.00)'],
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "width", '55px']
            ],
            "${_Ellipse}": [
                ["color", "background-color", 'rgba(113,194,217,1.00)'],
                ["style", "clip", [45.0078125,201,92.84765625,26.13671875], {valueTemplate:'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'} ],
                ["style", "left", '-205px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 9500,
            autoPlay: true,
            timeline: [
                { id: "eid6", tween: [ "style", "${_Text2}", "left", '-140px', { fromValue: '22px'}], position: 3545, duration: 501 },
                { id: "eid33", tween: [ "style", "${_Text2}", "left", '13px', { fromValue: '-140px'}], position: 7750, duration: 301 },
                { id: "eid21", tween: [ "style", "${_Group3}", "left", '206px', { fromValue: '214px'}], position: 6445, duration: 256 },
                { id: "eid35", tween: [ "style", "${_Group3}", "left", '197px', { fromValue: '206px'}], position: 8051, duration: 487 },
                { id: "eid16", tween: [ "style", "${_Group}", "left", '9px', { fromValue: '79px'}], position: 5957, duration: 249 },
                { id: "eid8", tween: [ "style", "${_Ellipse2}", "top", '0px', { fromValue: '-57px'}], position: 4046, duration: 255 },
                { id: "eid15", tween: [ "style", "${_Group4}", "top", '-69px', { fromValue: '-1px'}], position: 5750, duration: 207 },
                { id: "eid2", tween: [ "style", "${_Ellipse}", "left", '-26px', { fromValue: '-205px'}], position: 0, duration: 797 },
                { id: "eid5", tween: [ "style", "${_Text2}", "top", '10px', { fromValue: '66px'}], position: 2458, duration: 475 },
                { id: "eid34", tween: [ "style", "${_Text2}", "top", '9px', { fromValue: '10px'}], position: 7750, duration: 301 },
                { id: "eid10", tween: [ "style", "${_Group2}", "top", '0px', { fromValue: '-58px'}], position: 4599, duration: 401 },
                { id: "eid18", tween: [ "style", "${_Group2}", "top", '-80px', { fromValue: '0px'}], position: 6206, duration: 239 },
                { id: "eid9", tween: [ "style", "${_Group}", "top", '-1px', { fromValue: '-58px'}], position: 4301, duration: 298 },
                { id: "eid17", tween: [ "style", "${_Group}", "top", '-69px', { fromValue: '-1px'}], position: 5957, duration: 249 },
                { id: "eid11", tween: [ "style", "${_Group3}", "top", '-1px', { fromValue: '-58px'}], position: 5000, duration: 447 },
                { id: "eid20", tween: [ "style", "${_Group3}", "top", '-80px', { fromValue: '-1px'}], position: 6445, duration: 256 },
                { id: "eid36", tween: [ "style", "${_Group3}", "top", '0px', { fromValue: '-80px'}], position: 8051, duration: 487 },
                { id: "eid19", tween: [ "style", "${_Group2}", "left", '133px', { fromValue: '152px'}], position: 6206, duration: 239 },
                { id: "eid14", tween: [ "style", "${_Group4}", "left", '-93px', { fromValue: '22px'}], position: 5750, duration: 207 },
                { id: "eid7", tween: [ "style", "${_Text3}", "top", '12px', { fromValue: '-45px'}], position: 4046, duration: 255 },
                { id: "eid3", tween: [ "style", "${_Text}", "left", '26px', { fromValue: '323px'}], position: 797, duration: 703 },
                { id: "eid22", tween: [ "style", "${_Text}", "left", '9px', { fromValue: '26px'}], position: 6701, duration: 349 },
                { id: "eid24", tween: [ "style", "${_Text}", "left", '335px', { fromValue: '9px'}], position: 7459, duration: 291 },
                { id: "eid4", tween: [ "style", "${_Text}", "top", '44px', { fromValue: '9px'}], position: 2056, duration: 402 },
                { id: "eid23", tween: [ "style", "${_Text}", "top", '10px', { fromValue: '44px'}], position: 6701, duration: 349 }            ]
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
})(jQuery, AdobeEdge, "EDGE-23935666");

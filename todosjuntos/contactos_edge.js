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
                id: 'Text',
                type: 'text',
                rect: ['35px', '42px','auto','auto','auto', 'auto'],
                text: "BIENVENIDOS  A NUESTRO SITIO WEB",
                font: ['Verdana, Geneva, sans-serif', 30, "rgba(28,16,185,1.00)", "normal", "none", ""],
                textShadow: ["rgba(255,255,255,0.65)", 4, 4, 0]
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['191px', '84px','auto','auto','auto', 'auto'],
                text: "www.laprensa.com.ni",
                align: "left",
                font: ['Verdana, Geneva, sans-serif', 25, "rgba(28,16,185,1)", "400", "none", "normal"],
                textShadow: ["rgba(255,255,255,1.00)", 3, 3, 0]
            },
            {
                id: 'Text3',
                type: 'text',
                rect: ['38px', '-85px','auto','auto','auto', 'auto'],
                text: "Para cualquier consulta, escribanos a nuestro correo o<br> llámenos a nuestros teléfono que aparece en esta sección.",
                align: "left",
                font: ['Verdana, Geneva, sans-serif', 20, "rgba(28,16,185,1)", "400", "none", "normal"]
            },
            {
                id: 'laprensa',
                type: 'image',
                rect: ['180px', '159px','300px','100px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"laprensa.svg",'0px','0px']
            },
            {
                id: 'banderanic',
                type: 'image',
                rect: ['0px', '0px','136px','128px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banderanic.png",'0px','0px']
            },
            {
                id: 'Rectangle',
                type: 'rect',
                rect: ['0px', '0px','656px','124px','auto', 'auto'],
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [2,"rgba(158,156,156,1.00)","solid"]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_banderanic}": [
                ["style", "top", '0px'],
                ["style", "left", '675px']
            ],
            "${_Text}": [
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.offsetH", '4px'],
                ["color", "color", 'rgba(16,81,185,1.00)'],
                ["subproperty", "textShadow.offsetV", '4px'],
                ["style", "left", '35px'],
                ["style", "font-size", '30px'],
                ["style", "top", '-44px'],
                ["style", "font-family", 'Verdana, Geneva, sans-serif'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,0.65)']
            ],
            "${_laprensa}": [
                ["style", "left", '180px'],
                ["style", "top", '159px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '128px'],
                ["gradient", "background-image", [270,[['rgba(205,204,207,1.00)',0],['rgba(255,255,255,1.00)',100]]]],
                ["style", "width", '660px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "left", '0px'],
                ["color", "border-color", 'rgba(158,156,156,1.00)'],
                ["style", "height", '124px'],
                ["style", "border-style", 'solid'],
                ["style", "border-width", '2px'],
                ["style", "width", '656px']
            ],
            "${_Text2}": [
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.offsetH", '3px'],
                ["subproperty", "textShadow.offsetV", '3px'],
                ["style", "top", '135px'],
                ["color", "color", 'rgba(16,81,185,1.00)'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,1.00)'],
                ["style", "left", '195px'],
                ["style", "font-size", '25px']
            ],
            "${_Text3}": [
                ["style", "top", '-85px'],
                ["color", "color", 'rgba(16,81,185,1.00)'],
                ["style", "left", '38px'],
                ["style", "font-size", '20px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 13728,
            autoPlay: true,
            timeline: [
                { id: "eid5", tween: [ "style", "${_Text2}", "left", '191px', { fromValue: '195px'}], position: 680, duration: 433 },
                { id: "eid9", tween: [ "style", "${_Text2}", "left", '-286px', { fromValue: '191px'}], position: 3752, duration: 297 },
                { id: "eid24", tween: [ "color", "${_Text3}", "color", 'rgba(16,81,185,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(16,81,185,1.00)'}], position: 1113, duration: 0 },
                { id: "eid18", tween: [ "style", "${_laprensa}", "left", '173px', { fromValue: '180px'}], position: 9553, duration: 447 },
                { id: "eid6", tween: [ "style", "${_Text2}", "top", '84px', { fromValue: '135px'}], position: 680, duration: 433 },
                { id: "eid10", tween: [ "style", "${_Text2}", "top", '88px', { fromValue: '84px'}], position: 3752, duration: 297 },
                { id: "eid17", tween: [ "style", "${_laprensa}", "top", '14px', { fromValue: '159px'}], position: 9553, duration: 447 },
                { id: "eid23", tween: [ "color", "${_Text2}", "color", 'rgba(16,81,185,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(16,81,185,1.00)'}], position: 1113, duration: 0 },
                { id: "eid22", tween: [ "color", "${_Text}", "color", 'rgba(16,81,185,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(16,81,185,1.00)'}], position: 1113, duration: 0 },
                { id: "eid21", tween: [ "style", "${_banderanic}", "left", '0px', { fromValue: '675px'}], position: 10000, duration: 750 },
                { id: "eid12", tween: [ "style", "${_Text3}", "top", '40px', { fromValue: '-85px'}], position: 4167, duration: 859 },
                { id: "eid14", tween: [ "style", "${_Text3}", "top", '-84px', { fromValue: '40px'}], position: 9000, duration: 553 },
                { id: "eid7", tween: [ "style", "${_Text}", "left", '675px', { fromValue: '35px'}], position: 3500, duration: 549 },
                { id: "eid11", tween: [ "style", "${_Text3}", "left", '28px', { fromValue: '38px'}], position: 4167, duration: 859 },
                { id: "eid13", tween: [ "style", "${_Text3}", "left", '-16px', { fromValue: '28px'}], position: 9000, duration: 553 },
                { id: "eid2", tween: [ "style", "${_Text}", "top", '42px', { fromValue: '-44px'}], position: 0, duration: 680 },
                { id: "eid8", tween: [ "style", "${_Text}", "top", '35px', { fromValue: '42px'}], position: 3500, duration: 549 }            ]
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
})(jQuery, AdobeEdge, "EDGE-4543509");

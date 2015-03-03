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
                id: 'linea3',
                type: 'image',
                rect: ['0px', '27px','300px','63px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"linea3.svg",'0px','0px']
            },
            {
                id: 'linea2',
                type: 'image',
                rect: ['0px', '35px','300px','69px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"linea2.svg",'0px','0px']
            },
            {
                id: 'linea1',
                type: 'image',
                rect: ['0px', '45px','300px','75px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"linea1.svg",'0px','0px']
            },
            {
                id: 'usela',
                type: 'image',
                rect: ['83px', '47px','135px','26px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"usela.svg",'0px','0px']
            },
            {
                id: 'titulo',
                type: 'image',
                rect: ['13px', '0px','277px','51px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"titulo.svg",'0px','0px']
            },
            {
                id: 'Group',
                type: 'group',
                rect: ['240px', '136px','55','51','auto', 'auto'],
                c: [
                {
                    id: 'Ellipse',
                    type: 'ellipse',
                    rect: ['-4px', '-4px','61px','59px','auto', 'auto'],
                    borderRadius: ["50%", "50%", "50%", "50%"],
                    fill: ["rgba(245,49,49,1.00)"],
                    stroke: [0,"rgba(0,0,0,1)","none"],
                    transform: [[],[],[],['0.8644','0.8644']]
                },
                {
                    id: 'Text',
                    type: 'text',
                    rect: ['6px', '12px','auto','auto','auto', 'auto'],
                    text: "Presenta <br>tu tarjeta<br>y",
                    align: "center",
                    font: ['Arial, Helvetica, sans-serif', 10, "rgba(255,255,255,1.00)", "normal", "none", ""],
                    transform: [[],['-19']]
                }]
            },
            {
                id: 'Group2',
                type: 'group',
                rect: ['100', '84','115','31','auto', 'auto'],
                c: [
                {
                    id: 'Text2',
                    type: 'text',
                    rect: ['5px', '0px','auto','auto','auto', 'auto'],
                    text: "OBTIENES GRANDES",
                    font: ['Arial, Helvetica, sans-serif', 10, "rgba(255,255,255,1.00)", "normal", "none", ""]
                },
                {
                    id: 'Text3',
                    type: 'text',
                    rect: ['0px', '9px','auto','auto','auto', 'auto'],
                    text: "DESCUENTOS",
                    align: "left",
                    font: ['Arial Black, Gadget, sans-serif', 15, "rgba(255,237,24,1.00)", "400", "none", "normal"]
                }]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_titulo}": [
                ["style", "left", '-278px'],
                ["style", "top", '0px']
            ],
            "${_Group2}": [
                ["style", "top", '120px']
            ],
            "${_Text3}": [
                ["style", "top", '9px'],
                ["color", "color", 'rgba(255,237,24,1.00)'],
                ["style", "font-family", 'Arial Black, Gadget, sans-serif'],
                ["style", "left", '0px'],
                ["style", "font-size", '15px']
            ],
            "${_Text2}": [
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "top", '0px'],
                ["style", "left", '5px'],
                ["style", "font-size", '10px']
            ],
            "${_Group}": [
                ["style", "left", '240px'],
                ["style", "top", '136px']
            ],
            "${_linea1}": [
                ["style", "left", '-301px'],
                ["style", "top", '45px']
            ],
            "${_Ellipse}": [
                ["style", "top", '-4px'],
                ["transform", "scaleY", '0.8644'],
                ["transform", "scaleX", '0.8644'],
                ["style", "left", '-4px'],
                ["color", "background-color", 'rgba(245,49,49,1.00)']
            ],
            "${_linea2}": [
                ["style", "top", '35px'],
                ["style", "left", '-301px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '120px'],
                ["gradient", "background-image", [40,25,true,'farthest-corner',[['rgba(228,242,250,0.76)',35],['rgba(7,146,194,1.00)',100]]]],
                ["style", "width", '300px']
            ],
            "${_usela}": [
                ["style", "left", '83px'],
                ["style", "top", '-27px']
            ],
            "${_linea3}": [
                ["style", "left", '-301px'],
                ["style", "top", '27px']
            ],
            "${_Text}": [
                ["style", "top", '12px'],
                ["style", "text-align", 'center'],
                ["transform", "rotateZ", '-19deg'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "left", '6px'],
                ["style", "font-size", '10px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 2955,
            autoPlay: true,
            timeline: [
                { id: "eid18", tween: [ "style", "${_Group}", "top", '47px', { fromValue: '136px'}], position: 1171, duration: 392 },
                { id: "eid12", tween: [ "style", "${_linea1}", "left", '0px', { fromValue: '-301px'}], position: 460, duration: 540, easing: "easeOutCirc" },
                { id: "eid17", tween: [ "style", "${_Group}", "left", '28px', { fromValue: '240px'}], position: 1171, duration: 392 },
                { id: "eid14", tween: [ "style", "${_linea2}", "left", '0px', { fromValue: '-301px'}], position: 566, duration: 538, easing: "easeOutQuint" },
                { id: "eid16", tween: [ "style", "${_linea3}", "left", '0px', { fromValue: '-301px'}], position: 750, duration: 500, easing: "easeInOutQuad" },
                { id: "eid20", tween: [ "style", "${_Group2}", "top", '84px', { fromValue: '120px'}], position: 1250, duration: 313 },
                { id: "eid2", tween: [ "style", "${_titulo}", "left", '13px', { fromValue: '-278px'}], position: 0, duration: 809 },
                { id: "eid4", tween: [ "style", "${_usela}", "top", '47px', { fromValue: '-27px'}], position: 809, duration: 362 }            ]
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
})(jQuery, AdobeEdge, "EDGE-14060940");

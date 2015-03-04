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
                id: 'Rectangle',
                type: 'rect',
                rect: ['0px', '0px','296px','116px','auto', 'auto'],
                fill: ["rgba(255,255,255,1.00)"],
                stroke: [2,"rgba(76,166,217,1.00)","solid"]
            },
            {
                id: 'N',
                type: 'text',
                rect: ['7px', '27px','auto','auto','auto', 'auto'],
                text: "N",
                font: ['Times New Roman, Times, serif', 45, "rgba(47,132,204,1.00)", "normal", "none", ""]
            },
            {
                id: 'o',
                type: 'text',
                rect: ['43px', '27px','auto','auto','auto', 'auto'],
                text: "O",
                font: ['Times New Roman, Times, serif', 45, "rgba(47,132,204,1.00)", "normal", "none", ""]
            },
            {
                id: 't',
                type: 'text',
                rect: ['78px', '27px','auto','auto','auto', 'auto'],
                text: "T",
                font: ['Times New Roman, Times, serif', 45, "rgba(47,132,204,1.00)", "normal", "none", ""]
            },
            {
                id: 'i',
                type: 'text',
                rect: ['109px', '27px','auto','auto','auto', 'auto'],
                text: "I",
                font: ['Times New Roman, Times, serif', 45, "rgba(47,132,204,1.00)", "normal", "none", ""]
            },
            {
                id: 'p',
                type: 'text',
                rect: ['128px', '27px','auto','auto','auto', 'auto'],
                text: "P",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'e',
                type: 'text',
                rect: ['152px', '27px','auto','auto','auto', 'auto'],
                text: "E",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'l',
                type: 'text',
                rect: ['181px', '27px','auto','auto','auto', 'auto'],
                text: "L",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'l-',
                type: 'text',
                rect: ['208px', '27px','auto','auto','auto', 'auto'],
                text: "L",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'a',
                type: 'text',
                rect: ['235px', '27px','auto','auto','auto', 'auto'],
                text: "A",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 's',
                type: 'text',
                rect: ['266px', '27px','auto','auto','auto', 'auto'],
                text: "S",
                font: ['Times New Roman, Times, serif', 45, "rgba(0,0,0,1)", "normal", "none", ""]
            },
            {
                id: 'Rectangle2',
                type: 'rect',
                rect: ['0px', '88px','301px','32px','auto', 'auto'],
                fill: ["rgba(161,204,222,1.00)"],
                stroke: [0,"rgb(76, 166, 217)","none"]
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['10px', '94px','auto','auto','auto', 'auto'],
                text: "El portal de noticias del Grupo Pellas",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 17, "rgba(255,255,255,1.00)", "400", "none", "normal"]
            },
            {
                id: 'Rectangle3',
                type: 'rect',
                rect: ['0px', '0px','300px','120px','auto', 'auto'],
                fill: ["rgba(255,255,255,1.00)"],
                stroke: [1,"rgb(76, 166, 217)","solid"]
            },
            {
                id: 'p1',
                type: 'image',
                rect: ['84px', '133px','130px','90px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"p1.svg",'0px','0px']
            },
            {
                id: 'p2',
                type: 'image',
                rect: ['124px', '141px','83px','53px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"p2.svg",'0px','0px']
            },
            {
                id: 'p3',
                type: 'image',
                rect: ['136px', '154px','50px','35px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"p3.svg",'0px','0px']
            },
            {
                id: 'p4',
                type: 'image',
                rect: ['153px', '164px','18px','14px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"p4.svg",'0px','0px']
            },
            {
                id: 'PELLAS',
                type: 'rect',
                rect: ['157', '41','auto','auto','auto', 'auto']
            },
            {
                id: 'GRUPO',
                type: 'rect',
                rect: ['152', '14','auto','auto','auto', 'auto']
            }],
            symbolInstances: [
            {
                id: 'GRUPO',
                symbolName: 'GRUPO',
                autoPlay: {

                }
            },
            {
                id: 'PELLAS',
                symbolName: 'PELLAS',
                autoPlay: {

                }
            }
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2}": [
                ["color", "background-color", 'rgba(161,204,222,1.00)'],
                ["style", "top", '88px'],
                ["style", "height", '32px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '0px']
            ],
            "${_N}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["color", "color", 'rgba(47,132,204,1.00)'],
                ["style", "font-family", 'Times New Roman, Times, serif'],
                ["style", "left", '7px'],
                ["style", "font-size", '45px']
            ],
            "${_e}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '152px'],
                ["style", "font-size", '45px']
            ],
            "${_l-}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '208px'],
                ["style", "font-size", '45px']
            ],
            "${_l}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '181px'],
                ["style", "font-size", '45px']
            ],
            "${_PELLAS}": [
                ["style", "top", '154px'],
                ["style", "opacity", '0'],
                ["style", "left", '171px']
            ],
            "${_GRUPO}": [
                ["style", "top", '145px'],
                ["style", "opacity", '0'],
                ["style", "left", '195px']
            ],
            "${_p3}": [
                ["style", "left", '136px'],
                ["style", "top", '154px']
            ],
            "${_p1}": [
                ["style", "top", '133px'],
                ["style", "left", '84px']
            ],
            "${_a}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '235px'],
                ["style", "font-size", '45px']
            ],
            "${_Text2}": [
                ["style", "top", '94px'],
                ["style", "font-size", '17px'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "font-family", 'Arial, Helvetica, sans-serif'],
                ["style", "left", '10px'],
                ["style", "width", '0px']
            ],
            "${_i}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["color", "color", 'rgba(47,132,204,1.00)'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '109px'],
                ["style", "font-size", '45px']
            ],
            "${_p4}": [
                ["style", "left", '153px'],
                ["style", "top", '164px']
            ],
            "${_o}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["color", "color", 'rgba(47,132,204,1.00)'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '43px'],
                ["style", "font-size", '45px']
            ],
            "${_Rectangle3}": [
                ["style", "top", '120px'],
                ["color", "background-color", 'rgba(255,255,255,1.00)'],
                ["style", "left", '0px'],
                ["style", "height", '116px'],
                ["style", "border-style", 'solid'],
                ["style", "border-width", '2px'],
                ["style", "width", '296px']
            ],
            "${_p}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '128px'],
                ["style", "font-size", '45px']
            ],
            "${_t}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["color", "color", 'rgba(47,132,204,1.00)'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '78px'],
                ["style", "font-size", '45px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '120px'],
                ["style", "width", '300px']
            ],
            "${_s}": [
                ["style", "top", '27px'],
                ["style", "opacity", '0'],
                ["style", "font-family", '\'Times New Roman\', Times, serif'],
                ["style", "left", '266px'],
                ["style", "font-size", '45px']
            ],
            "${_p2}": [
                ["style", "left", '124px'],
                ["style", "top", '141px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(255,255,255,1.00)'],
                ["style", "border-style", 'solid'],
                ["style", "border-width", '2px'],
                ["style", "height", '116px'],
                ["color", "border-color", 'rgba(76,166,217,1.00)'],
                ["style", "left", '0px'],
                ["style", "width", '296px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 5612,
            autoPlay: true,
            timeline: [
                { id: "eid12", tween: [ "style", "${_p}", "opacity", '1', { fromValue: '0'}], position: 815, duration: 227 },
                { id: "eid5", tween: [ "style", "${_p2}", "left", '50px', { fromValue: '124px'}], position: 3438, duration: 109 },
                { id: "eid1", tween: [ "style", "${_p1}", "top", '26px', { fromValue: '133px'}], position: 3347, duration: 91 },
                { id: "eid73", tween: [ "style", "${_Rectangle3}", "width", '296px', { fromValue: '296px'}], position: 5129, duration: 0 },
                { id: "eid7", tween: [ "style", "${_p3}", "left", '59px', { fromValue: '136px'}], position: 3547, duration: 104 },
                { id: "eid58", tween: [ "style", "${_GRUPO}", "top", '14px', { fromValue: '145px'}], position: 3500, duration: 500 },
                { id: "eid16", tween: [ "style", "${_l}", "opacity", '1', { fromValue: '0'}], position: 1250, duration: 214 },
                { id: "eid24", tween: [ "style", "${_Rectangle2}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid29", tween: [ "style", "${_Rectangle2}", "opacity", '1', { fromValue: '0.000000'}], position: 2178, duration: 537 },
                { id: "eid11", tween: [ "style", "${_p4}", "left", '78px', { fromValue: '153px'}], position: 3651, duration: 99 },
                { id: "eid2", tween: [ "style", "${_p1}", "left", '11px', { fromValue: '84px'}], position: 3347, duration: 91 },
                { id: "eid8", tween: [ "style", "${_t}", "opacity", '1', { fromValue: '0'}], position: 382, duration: 227 },
                { id: "eid22", tween: [ "style", "${_s}", "opacity", '1', { fromValue: '0'}], position: 1953, duration: 225 },
                { id: "eid32", tween: [ "style", "${_Text2}", "width", '277px', { fromValue: '0px'}], position: 2178, duration: 537 },
                { id: "eid68", tween: [ "style", "${_PELLAS}", "top", '53px', { fromValue: '154px'}], position: 4000, duration: 500 },
                { id: "eid4", tween: [ "style", "${_N}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 164 },
                { id: "eid74", tween: [ "style", "${_Rectangle3}", "left", '0px', { fromValue: '0px'}], position: 5129, duration: 0 },
                { id: "eid14", tween: [ "style", "${_e}", "opacity", '1', { fromValue: '0'}], position: 1042, duration: 208 },
                { id: "eid18", tween: [ "style", "${_l-}", "opacity", '1', { fromValue: '0'}], position: 1464, duration: 237 },
                { id: "eid67", tween: [ "style", "${_PELLAS}", "left", '157px', { fromValue: '171px'}], position: 4000, duration: 500 },
                { id: "eid70", tween: [ "style", "${_Rectangle3}", "height", '116px', { fromValue: '116px'}], position: 5129, duration: 0 },
                { id: "eid9", tween: [ "style", "${_p3}", "top", '44px', { fromValue: '154px'}], position: 3547, duration: 104 },
                { id: "eid30", tween: [ "style", "${_Rectangle2}", "width", '301px', { fromValue: '0px'}], position: 2178, duration: 537 },
                { id: "eid10", tween: [ "style", "${_i}", "opacity", '1', { fromValue: '0'}], position: 609, duration: 206 },
                { id: "eid53", tween: [ "style", "${_GRUPO}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid55", tween: [ "style", "${_GRUPO}", "opacity", '1', { fromValue: '0'}], position: 3500, duration: 500 },
                { id: "eid34", tween: [ "style", "${_Rectangle3}", "top", '0px', { fromValue: '120px'}], position: 3151, duration: 196 },
                { id: "eid62", tween: [ "style", "${_PELLAS}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid64", tween: [ "style", "${_PELLAS}", "opacity", '1', { fromValue: '0'}], position: 4000, duration: 500 },
                { id: "eid59", tween: [ "style", "${_GRUPO}", "left", '152px', { fromValue: '195px'}], position: 3500, duration: 500 },
                { id: "eid3", tween: [ "style", "${_p2}", "top", '33px', { fromValue: '141px'}], position: 3438, duration: 109 },
                { id: "eid69", tween: [ "style", "${_Rectangle3}", "border-width", '2px', { fromValue: '2px'}], position: 5129, duration: 0 },
                { id: "eid6", tween: [ "style", "${_o}", "opacity", '1', { fromValue: '0'}], position: 164, duration: 218 },
                { id: "eid13", tween: [ "style", "${_p4}", "top", '53px', { fromValue: '164px'}], position: 3651, duration: 99 },
                { id: "eid20", tween: [ "style", "${_a}", "opacity", '1', { fromValue: '0'}], position: 1701, duration: 252 }            ]
        }
    }
},
"GRUPO": {
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
                    rect: ['0px', '0px', 'auto', 'auto', 'auto', 'auto'],
                    font: ['Arial Black, Gadget, sans-serif', 30, 'rgba(0,0,0,1.00)', '400', 'none', 'normal'],
                    id: 'Text3',
                    text: 'GRUPO',
                    align: 'left',
                    type: 'text'
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Text3}": [
                ["style", "top", '0px'],
                ["color", "color", 'rgba(0,0,0,1.00)'],
                ["style", "font-family", 'Arial Black, Gadget, sans-serif'],
                ["style", "left", '0px'],
                ["style", "font-size", '30px']
            ],
            "${symbolSelector}": [
                ["style", "height", '42px'],
                ["style", "width", '120px']
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
"PELLAS": {
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
                    rect: ['0px', '0px', 'auto', 'auto', 'auto', 'auto'],
                    font: ['Arial Black, Gadget, sans-serif', 30, 'rgba(0,0,0,1.00)', '400', 'none', 'normal'],
                    id: 'Text3Copy',
                    text: 'PELLAS',
                    align: 'left',
                    type: 'text'
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Text3Copy}": [
                ["style", "top", '0px'],
                ["color", "color", 'rgba(0,0,0,1)'],
                ["style", "font-family", '\'Arial Black\', Gadget, sans-serif'],
                ["style", "left", '0px'],
                ["style", "font-size", '30px']
            ],
            "${symbolSelector}": [
                ["style", "height", '42px'],
                ["style", "width", '129px']
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


Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-22397848");

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
                id: 'fondo',
                type: 'image',
                rect: ['0px', '0px','300px','120px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fondo.png",'0px','0px']
            },
            {
                id: 'Rectangle2',
                type: 'rect',
                rect: ['0px', '102px','300px','18px','auto', 'auto'],
                fill: ["rgba(21,72,156,1.00)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['8px', '103px','auto','auto','auto', 'auto'],
                text: "Teléfono: 2264-8800",
                font: ['Arial, Helvetica, sans-serif', 14, "rgba(255,255,255,1.00)", "300", "none", ""]
            },
            {
                id: 'Text3',
                type: 'text',
                rect: ['161px', '103px','auto','auto','auto', 'auto'],
                text: "www.comtech.com.ni",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 14, "rgba(255,255,255,1)", "300", "none", "normal"]
            },
            {
                id: 'aire2',
                type: 'image',
                rect: ['22px', '63px','94px','34px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"aire.png",'0px','0px']
            },
            {
                id: 'verano2',
                type: 'image',
                rect: ['-154px', '15px','148px','87px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"verano2.svg",'0px','0px']
            },
            {
                id: 'textouno',
                type: 'image',
                rect: ['-120px', '12px','107px','96px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"textouno.svg",'0px','0px']
            },
            {
                id: 'textodos',
                type: 'image',
                rect: ['308px', '40px','84px','59px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"textodos.svg",'0px','0px']
            },
            {
                id: 'logocomtech2',
                type: 'image',
                rect: ['186px', '-38px','114px','35px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logocomtech2.svg",'0px','0px']
            },
            {
                id: 'Group',
                type: 'group',
                rect: ['355px', '29px','137','101','auto', 'auto'],
                c: [
                {
                    id: 'Group2',
                    type: 'group',
                    rect: ['0', '-1','137','102','auto', 'auto'],
                    c: [
                    {
                        id: 'tele2',
                        type: 'image',
                        rect: ['15px', '6px','114px','96px','auto', 'auto'],
                        fill: ["rgba(0,0,0,0)",im+"tele.png",'0px','0px']
                    },
                    {
                        id: 'gratis2',
                        type: 'image',
                        rect: ['0px', '1px','49px','49px','auto', 'auto'],
                        fill: ["rgba(0,0,0,0)",im+"gratis2.svg",'0px','0px']
                    },
                    {
                        id: 'lg2',
                        type: 'image',
                        rect: ['102px', '0px','35px','35px','auto', 'auto'],
                        fill: ["rgba(0,0,0,0)",im+"lg2.svg",'0px','0px']
                    }]
                }]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_gratis2}": [
                ["style", "height", '49px'],
                ["style", "top", '1px'],
                ["style", "left", '0px'],
                ["style", "width", '49px']
            ],
            "${_Rectangle2}": [
                ["style", "height", '18px'],
                ["style", "top", '102px'],
                ["color", "background-color", 'rgba(21,72,156,1.00)']
            ],
            "${_tele2}": [
                ["style", "height", '96px'],
                ["style", "top", '6px'],
                ["style", "left", '15px'],
                ["style", "width", '114px']
            ],
            "${_logocomtech2}": [
                ["style", "height", '35px'],
                ["style", "top", '-38px'],
                ["style", "left", '186px'],
                ["style", "width", '114px']
            ],
            "${_Text3}": [
                ["style", "top", '103px'],
                ["style", "left", '161px']
            ],
            "${_fondo}": [
                ["style", "left", '0px'],
                ["style", "top", '0px']
            ],
            "${_aire2}": [
                ["style", "top", '60px'],
                ["style", "height", '34px'],
                ["style", "left", '-100px'],
                ["style", "width", '94px']
            ],
            "${_verano2}": [
                ["style", "top", '15px'],
                ["style", "height", '87px'],
                ["style", "opacity", '1'],
                ["style", "left", '-154px'],
                ["style", "width", '148px']
            ],
            "${_textodos}": [
                ["style", "top", '40px'],
                ["style", "height", '59px'],
                ["style", "left", '308px'],
                ["style", "width", '84px']
            ],
            "${_Text}": [
                ["style", "top", '103px'],
                ["style", "left", '8px'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "font-weight", '300'],
                ["style", "text-decoration", 'none'],
                ["style", "font-size", '14px']
            ],
            "${_textouno}": [
                ["style", "top", '12px'],
                ["style", "height", '96px'],
                ["style", "left", '-120px'],
                ["style", "width", '107px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "width", '300px'],
                ["style", "height", '120px'],
                ["style", "overflow", 'hidden']
            ],
            "${_lg2}": [
                ["style", "height", '35px'],
                ["style", "top", '0px'],
                ["style", "left", '102px'],
                ["style", "width", '35px']
            ],
            "${_Group}": [
                ["style", "top", '29px'],
                ["style", "opacity", '1'],
                ["style", "left", '355px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 4606,
            autoPlay: true,
            timeline: [
                { id: "eid6", tween: [ "style", "${_verano2}", "width", '134px', { fromValue: '148px'}], position: 4192, duration: 414 },
                { id: "eid8", tween: [ "style", "${_textouno}", "top", '-99px', { fromValue: '12px'}], position: 3535, duration: 576 },
                { id: "eid2", tween: [ "style", "${_verano2}", "left", '1px', { fromValue: '-154px'}], position: 0, duration: 1250 },
                { id: "eid15", tween: [ "style", "${_Group}", "left", '159px', { fromValue: '355px'}], position: 0, duration: 1250 },
                { id: "eid9", tween: [ "style", "${_textodos}", "left", '202px', { fromValue: '308px'}], position: 4192, duration: 414 },
                { id: "eid49", tween: [ "style", "${_aire2}", "left", '22px', { fromValue: '-100px'}], position: 4192, duration: 414 },
                { id: "eid16", tween: [ "style", "${_Group}", "top", '1px', { fromValue: '29px'}], position: 0, duration: 1250 },
                { id: "eid7", tween: [ "style", "${_textouno}", "left", '8px', { fromValue: '-120px'}], position: 2454, duration: 546 },
                { id: "eid50", tween: [ "style", "${_aire2}", "top", '63px', { fromValue: '60px'}], position: 4192, duration: 414 },
                { id: "eid1", tween: [ "style", "${_verano2}", "top", '1px', { fromValue: '15px'}], position: 0, duration: 1250 },
                { id: "eid5", tween: [ "style", "${_verano2}", "height", '79px', { fromValue: '87px'}], position: 4192, duration: 414 },
                { id: "eid10", tween: [ "style", "${_logocomtech2}", "top", '8px', { fromValue: '-38px'}], position: 4192, duration: 414 },
                { id: "eid17", tween: [ "style", "${_Group}", "opacity", '0', { fromValue: '1'}], position: 3535, duration: 576 },
                { id: "eid3", tween: [ "style", "${_verano2}", "opacity", '0', { fromValue: '1'}], position: 1628, duration: 372 },
                { id: "eid4", tween: [ "style", "${_verano2}", "opacity", '1', { fromValue: '0'}], position: 4192, duration: 414 }            ]
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
})(jQuery, AdobeEdge, "EDGE-2034832");

/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};    fonts['inika, sans-serif']='<script src=\"http://use.edgefonts.net/inika:n7,n4:all.js\"></script>';

var opts = {
    'preloadAudio': false
};
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
                rect: ['0px', '0px','728px','137px','auto', 'auto'],
                fill: ["rgba(231,225,225,0.00)"],
                stroke: [1,"rgba(0,0,0,1.00)","solid"]
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['22px', '16px','auto','auto','auto', 'auto'],
                text: "ANUNCIATE EN",
                font: ['inika, sans-serif', 32, "rgba(23,98,162,1.00)", "normal", "none", ""]
            },
            {
                id: 'logomagazine',
                type: 'image',
                rect: ['81px', '62px','166px','42px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logomagazine.svg",'0px','0px']
            },
            {
                id: 'revistas2',
                type: 'rect',
                rect: ['273', '-1','auto','auto','auto', 'auto']
            },
            {
                id: 'Ellipse',
                type: 'ellipse',
                rect: ['18px', '114px','16px','16px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(244,143,0,1.00)",[50,50,true,'farthest-corner',[['rgba(227,92,12,1.00)',0],['rgba(239,238,238,0.73)',16]]]],
                stroke: [0,"rgba(200,86,3,1.00)","none"]
            },
            {
                id: 'EllipseCopy',
                type: 'ellipse',
                rect: ['52px', '114px','16px','16px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(150,149,149,1.00)",[50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]],
                stroke: [0,"rgba(63,62,62,1.00)","none"]
            },
            {
                id: 'EllipseCopy2',
                type: 'ellipse',
                rect: ['87px', '114px','16px','16px','auto', 'auto'],
                borderRadius: ["50%", "50%", "50%", "50%"],
                fill: ["rgba(150,149,149,1.00)",[50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]],
                stroke: [0,"rgba(63,62,62,1.00)","none"]
            },
            {
                id: 'rev4',
                type: 'image',
                rect: ['376px', '4px','131px','158px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"rev4.png",'0px','0px']
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['26', '-54','auto','auto','auto', 'auto'],
                text: "Suscríbete a ",
                align: "left",
                font: ['inika, sans-serif', 32, "rgba(23,98,162,1)", "400", "none", "normal"]
            },
            {
                id: 'rev3',
                type: 'image',
                rect: ['434px', '0px','146px','185px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"rev3.png",'0px','0px']
            },
            {
                id: 'rev2',
                type: 'image',
                rect: ['519px', '4px','121px','168px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"rev2.png",'0px','0px']
            },
            {
                id: 'rev1',
                type: 'image',
                rect: ['555px', '-1px','170px','201px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"rev1.png",'0px','0px']
            },
            {
                id: 'Text4',
                type: 'text',
                rect: ['452px', '40px','auto','auto','auto', 'auto'],
                text: "2225 6770",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 32, "rgba(23,98,162,1)", "400", "none", "normal"]
            },
            {
                id: 'Text5',
                type: 'text',
                rect: ['364px', '83px','auto','auto','auto', 'auto'],
                text: "suscripciones@laprensa.com.ni",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 23, "rgba(23,98,162,1)", "400", "none", "normal"]
            },
            {
                id: 'Text6',
                type: 'text',
                rect: ['164px', '-44px','auto','auto','auto', 'auto'],
                text: "Suscripciones<br>",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 23, "rgba(23,98,162,1)", "400", "none", "normal"]
            },
            {
                id: 'Text8',
                type: 'text',
                rect: ['296px', '146px','auto','auto','auto', 'auto'],
                text: "Silvio Vega<br>silvio.vega@laprensa.com.ni<br>Tel: (505) 22556770 Ext. 5107",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 16, "rgba(0,0,0,1.00)", "400", "none", "normal"]
            },
            {
                id: 'Text6Copy',
                type: 'text',
                rect: ['547px', '-48px','auto','auto','auto', 'auto'],
                text: "Ventas",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 23, "rgba(23,98,162,1)", "400", "none", "normal"]
            },
            {
                id: 'Text8Copy',
                type: 'text',
                rect: ['526px', '-94px','auto','auto','auto', 'auto'],
                text: "Mayra Largaespada<br>mayra.largaespada@<br>laprensa.com.ni<br>Tel: (505) 22556767 Ext. 5202",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 16, "rgba(0,0,0,1.00)", "400", "none", "normal"]
            },
            {
                id: 'boton',
                type: 'rect',
                rect: ['-3', '-1','auto','auto','auto', 'auto'],
                cursor: ['pointer']
            }],
            symbolInstances: [
            {
                id: 'revistas2',
                symbolName: 'revistas',
                autoPlay: {

                }
            },
            {
                id: 'boton',
                symbolName: 'boton',
                autoPlay: {

                }
            }
            ]
        },
    states: {
        "Base State": {
            "${_rev1}": [
                ["style", "top", '13px'],
                ["style", "left", '728px']
            ],
            "${_Text8}": [
                ["color", "color", 'rgba(0,0,0,1.00)'],
                ["style", "top", '146px'],
                ["style", "left", '296px'],
                ["style", "font-size", '16px']
            ],
            "${_rev2}": [
                ["style", "left", '604px'],
                ["style", "top", '153px']
            ],
            "${_rev4}": [
                ["style", "left", '739px'],
                ["style", "top", '-142px']
            ],
            "${_rev3}": [
                ["style", "left", '784px'],
                ["style", "top", '21px']
            ],
            "${_EllipseCopy}": [
                ["style", "top", '114px'],
                ["gradient", "background-image", [50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]],
                ["color", "border-color", 'rgb(63, 62, 62)'],
                ["style", "left", '52px'],
                ["color", "background-color", 'rgba(150,149,149,1)']
            ],
            "${_Text4}": [
                ["style", "top", '-85px'],
                ["style", "font-family", 'Arial, Helvetica, sans-serif'],
                ["style", "left", '541px']
            ],
            "${_boton}": [
                ["style", "cursor", 'pointer']
            ],
            "${_Text6Copy}": [
                ["style", "left", '547px'],
                ["style", "top", '-48px']
            ],
            "${_Text2}": [
                ["style", "top", '-54px']
            ],
            "${_Text8Copy}": [
                ["style", "top", '-94px'],
                ["color", "color", 'rgba(0,0,0,1)'],
                ["style", "left", '526px'],
                ["style", "font-size", '16px']
            ],
            "${_Text5}": [
                ["style", "top", '145px'],
                ["style", "font-family", 'Arial, Helvetica, sans-serif'],
                ["style", "left", '273px'],
                ["style", "font-size", '23px']
            ],
            "${_Text6}": [
                ["style", "left", '164px'],
                ["style", "top", '-44px']
            ],
            "${_EllipseCopy2}": [
                ["style", "top", '114px'],
                ["color", "background-color", 'rgba(150,149,149,1)'],
                ["color", "border-color", 'rgb(63, 62, 62)'],
                ["style", "left", '87px'],
                ["gradient", "background-image", [50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]]
            ],
            "${_Text}": [
                ["style", "top", '16px'],
                ["color", "color", 'rgba(23,98,162,1.00)'],
                ["style", "font-family", 'inika, sans-serif'],
                ["style", "left", '-247px'],
                ["style", "font-size", '32px']
            ],
            "${_revistas2}": [
                ["style", "opacity", '0']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '137px'],
                ["gradient", "background-image", [270,[['rgba(222,220,225,1.00)',0],['rgba(255,255,255,1.00)',100]]]],
                ["style", "width", '728px']
            ],
            "${_Ellipse}": [
                ["style", "top", '114px'],
                ["color", "background-color", 'rgba(244,93,0,1.00)'],
                ["color", "border-color", 'rgb(200, 86, 3)'],
                ["style", "left", '18px'],
                ["gradient", "background-image", [50,50,true,'farthest-corner',[['rgba(255,127,0,1.00)',0],['rgba(239,237,237,0.73)',25]]]]
            ],
            "${_logomagazine}": [
                ["style", "top", '138px'],
                ["style", "height", '42px'],
                ["style", "left", '81px'],
                ["style", "width", '166px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(255,255,255,0.00)'],
                ["gradient", "background-image", [270,[['rgba(255,255,255,0.00)',0],['rgba(255,255,255,0.00)',100]]]],
                ["style", "left", '0px'],
                ["style", "width", '726px'],
                ["style", "top", '0px'],
                ["transform", "scaleY", '1'],
                ["style", "height", '135px'],
                ["color", "border-color", 'rgba(0,0,0,1.00)'],
                ["style", "border-style", 'solid'],
                ["style", "border-width", '1px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 13363,
            autoPlay: true,
            timeline: [
                { id: "eid35", tween: [ "style", "${_rev2}", "left", '519px', { fromValue: '604px'}], position: 4121, duration: 227 },
                { id: "eid46", tween: [ "style", "${_rev2}", "left", '579px', { fromValue: '519px'}], position: 5171, duration: 255 },
                { id: "eid82", tween: [ "gradient", "${_Ellipse}", "background-image", [50,50,true,'farthest-corner',[['rgba(227,92,12,1.00)',0],['rgba(239,238,238,0.73)',16]]], { fromValue: [50,50,true,'farthest-corner',[['rgba(255,127,0,1.00)',0],['rgba(239,237,237,0.73)',25]]]}], position: 0, duration: 3250 },
                { id: "eid16", tween: [ "gradient", "${_Ellipse}", "background-image", [50,50,true,'farthest-corner',[['rgba(255,255,255,1.00)',0],['rgba(239,238,238,0.73)',84]]], { fromValue: [50,50,true,'farthest-corner',[['rgba(227,92,12,1.00)',0],['rgba(239,238,238,0.73)',16]]]}], position: 3250, duration: 148 },
                { id: "eid20", tween: [ "color", "${_EllipseCopy}", "border-color", 'rgba(255,76,0,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgb(63, 62, 62)'}], position: 3250, duration: 148 },
                { id: "eid65", tween: [ "color", "${_EllipseCopy}", "border-color", 'rgba(108,108,108,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,76,0,1)'}], position: 7077, duration: 117 },
                { id: "eid31", tween: [ "style", "${_rev3}", "left", '434px', { fromValue: '784px'}], position: 3851, duration: 270 },
                { id: "eid44", tween: [ "style", "${_rev3}", "left", '401px', { fromValue: '434px'}], position: 4831, duration: 340 },
                { id: "eid7", tween: [ "gradient", "${_Rectangle}", "background-image", [270,[['rgba(255,255,255,0.00)',0],['rgba(255,255,255,0.00)',100]]], { fromValue: [270,[['rgba(255,255,255,0.00)',0],['rgba(255,255,255,0.00)',100]]]}], position: 0, duration: 0 },
                { id: "eid81", tween: [ "color", "${_Ellipse}", "background-color", 'rgba(244,143,0,1)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(244,93,0,1.00)'}], position: 0, duration: 3250 },
                { id: "eid15", tween: [ "color", "${_Ellipse}", "background-color", 'rgba(143,142,139,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(244,143,0,1)'}], position: 3250, duration: 148 },
                { id: "eid19", tween: [ "gradient", "${_EllipseCopy}", "background-image", [50,50,true,'farthest-corner',[['rgba(255,99,0,1.00)',0],['rgba(239,238,238,0.73)',27]]], { fromValue: [50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]}], position: 3250, duration: 148 },
                { id: "eid64", tween: [ "gradient", "${_EllipseCopy}", "background-image", [50,50,true,'farthest-corner',[['rgba(255,251,249,1.00)',0],['rgba(239,237,237,0.73)',27]]], { fromValue: [50,50,true,'farthest-corner',[['rgba(255,99,0,1.00)',0],['rgba(239,237,237,0.73)',27]]]}], position: 7077, duration: 117 },
                { id: "eid6", tween: [ "color", "${_Rectangle}", "background-color", 'rgba(255,255,255,0.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(255,255,255,0.00)'}], position: 0, duration: 0 },
                { id: "eid11", tween: [ "style", "${_logomagazine}", "top", '62px', { fromValue: '138px'}], position: 622, duration: 419 },
                { id: "eid51", tween: [ "style", "${_Text4}", "left", '452px', { fromValue: '541px'}], position: 5668, duration: 297 },
                { id: "eid66", tween: [ "style", "${_Text4}", "left", '296px', { fromValue: '452px'}], position: 7194, duration: 306 },
                { id: "eid74", tween: [ "style", "${_Text6Copy}", "top", '19px', { fromValue: '-48px'}], position: 8500, duration: 333 },
                { id: "eid36", tween: [ "style", "${_rev2}", "top", '4px', { fromValue: '153px'}], position: 4121, duration: 227 },
                { id: "eid45", tween: [ "style", "${_rev2}", "top", '194px', { fromValue: '4px'}], position: 5171, duration: 255 },
                { id: "eid9", tween: [ "style", "${_Text}", "left", '22px', { fromValue: '-247px'}], position: 0, duration: 622 },
                { id: "eid23", tween: [ "style", "${_Text}", "left", '-248px', { fromValue: '22px'}], position: 3398, duration: 210 },
                { id: "eid17", tween: [ "color", "${_Ellipse}", "border-color", 'rgba(72,71,70,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgb(200, 86, 3)'}], position: 3250, duration: 148 },
                { id: "eid55", tween: [ "style", "${_Text5}", "left", '364px', { fromValue: '273px'}], position: 5965, duration: 227 },
                { id: "eid69", tween: [ "style", "${_Text5}", "left", '151px', { fromValue: '364px'}], position: 7500, duration: 337 },
                { id: "eid13", tween: [ "style", "${_revistas2}", "opacity", '1', { fromValue: '0'}], position: 1041, duration: 635 },
                { id: "eid14", tween: [ "style", "${_revistas2}", "opacity", '0', { fromValue: '1'}], position: 2500, duration: 750 },
                { id: "eid24", tween: [ "style", "${_Text2}", "top", '19px', { fromValue: '-54px'}], position: 3398, duration: 210 },
                { id: "eid28", tween: [ "style", "${_rev4}", "left", '376px', { fromValue: '739px'}], position: 3608, duration: 243 },
                { id: "eid41", tween: [ "style", "${_rev4}", "left", '207px', { fromValue: '376px'}], position: 4580, duration: 251 },
                { id: "eid57", tween: [ "color", "${_EllipseCopy2}", "background-color", 'rgba(255,83,0,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(150,149,149,1)'}], position: 7077, duration: 117 },
                { id: "eid73", tween: [ "style", "${_Text8}", "left", '301px', { fromValue: '296px'}], position: 8070, duration: 430 },
                { id: "eid80", tween: [ "style", "${_Text8}", "left", '270px', { fromValue: '301px'}], position: 9178, duration: 528 },
                { id: "eid40", tween: [ "style", "${_rev1}", "top", '-1px', { fromValue: '13px'}], position: 4348, duration: 232 },
                { id: "eid48", tween: [ "style", "${_rev1}", "top", '45px', { fromValue: '-1px'}], position: 5426, duration: 242 },
                { id: "eid72", tween: [ "style", "${_Text8}", "top", '56px', { fromValue: '146px'}], position: 8070, duration: 430 },
                { id: "eid59", tween: [ "color", "${_EllipseCopy2}", "border-color", 'rgba(255,133,0,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgb(63, 62, 62)'}], position: 7077, duration: 117 },
                { id: "eid75", tween: [ "style", "${_Text8Copy}", "top", '56px', { fromValue: '-94px'}], position: 8833, duration: 345 },
                { id: "eid18", tween: [ "color", "${_EllipseCopy}", "background-color", 'rgba(250,92,0,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(150,149,149,1)'}], position: 3250, duration: 148 },
                { id: "eid63", tween: [ "color", "${_EllipseCopy}", "background-color", 'rgba(112,111,110,1.00)', { animationColorSpace: 'RGB', valueTemplate: undefined, fromValue: 'rgba(250,92,0,1)'}], position: 7077, duration: 117 },
                { id: "eid76", tween: [ "style", "${_Text8Copy}", "left", '528px', { fromValue: '526px'}], position: 8833, duration: 345 },
                { id: "eid79", tween: [ "style", "${_Text8Copy}", "left", '497px', { fromValue: '528px'}], position: 9178, duration: 528 },
                { id: "eid5", tween: [ "style", "${_Rectangle}", "width", '726px', { fromValue: '726px'}], position: 0, duration: 0 },
                { id: "eid39", tween: [ "style", "${_rev1}", "left", '555px', { fromValue: '728px'}], position: 4348, duration: 232 },
                { id: "eid47", tween: [ "style", "${_rev1}", "left", '749px', { fromValue: '555px'}], position: 5426, duration: 242 },
                { id: "eid4", tween: [ "style", "${_Rectangle}", "height", '135px', { fromValue: '135px'}], position: 0, duration: 0 },
                { id: "eid58", tween: [ "gradient", "${_EllipseCopy2}", "background-image", [50,50,true,'farthest-corner',[['rgba(248,141,0,1.00)',0],['rgba(239,238,238,0.73)',20]]], { fromValue: [50,50,true,'farthest-corner',[['rgba(253,252,255,1.00)',0],['rgba(239,238,238,0.73)',100]]]}], position: 7077, duration: 117 },
                { id: "eid78", tween: [ "style", "${_Text6Copy}", "left", '516px', { fromValue: '547px'}], position: 9178, duration: 528 },
                { id: "eid52", tween: [ "style", "${_Text4}", "top", '40px', { fromValue: '-85px'}], position: 5668, duration: 297 },
                { id: "eid67", tween: [ "style", "${_Text4}", "top", '-67px', { fromValue: '40px'}], position: 7194, duration: 306 },
                { id: "eid56", tween: [ "style", "${_Text5}", "top", '83px', { fromValue: '145px'}], position: 5965, duration: 227 },
                { id: "eid68", tween: [ "style", "${_Text5}", "top", '167px', { fromValue: '83px'}], position: 7500, duration: 337 },
                { id: "eid32", tween: [ "style", "${_rev3}", "top", '0px', { fromValue: '21px'}], position: 3851, duration: 270 },
                { id: "eid43", tween: [ "style", "${_rev3}", "top", '159px', { fromValue: '0px'}], position: 4831, duration: 340 },
                { id: "eid71", tween: [ "style", "${_Text6}", "top", '19px', { fromValue: '-44px'}], position: 7837, duration: 233 },
                { id: "eid70", tween: [ "style", "${_Text6}", "left", '296px', { fromValue: '164px'}], position: 7837, duration: 233 },
                { id: "eid77", tween: [ "style", "${_Text6}", "left", '265px', { fromValue: '296px'}], position: 9178, duration: 528 },
                { id: "eid27", tween: [ "style", "${_rev4}", "top", '4px', { fromValue: '-142px'}], position: 3608, duration: 243 },
                { id: "eid42", tween: [ "style", "${_rev4}", "top", '154px', { fromValue: '4px'}], position: 4580, duration: 251 }            ]
        }
    }
},
"revistas": {
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
                    rect: ['0px', '0px', '457px', '137px', 'auto', 'auto'],
                    id: 'revistas',
                    opacity: 1,
                    type: 'image',
                    fill: ['rgba(0,0,0,0)', 'images/revistas.png', '0px', '0px']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_revistas}": [
                ["style", "top", '0px'],
                ["style", "height", '137px'],
                ["style", "opacity", '1'],
                ["style", "left", '0px'],
                ["style", "width", '457px']
            ],
            "${symbolSelector}": [
                ["style", "height", '137px'],
                ["style", "width", '457px']
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
"boton": {
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
                    type: 'rect',
                    id: 'Rectangle2',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    rect: ['0px', '0px', '731px', '137px', 'auto', 'auto'],
                    fill: ['rgba(192,192,192,0.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2}": [
                ["style", "top", '0px'],
                ["style", "height", '137px'],
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "left", '0px'],
                ["style", "width", '731px']
            ],
            "${symbolSelector}": [
                ["style", "height", '137px'],
                ["style", "width", '731px']
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
})(jQuery, AdobeEdge, "EDGE-1332745");

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
                id: 'boton2',
                type: 'rect',
                rect: ['227', '13','auto','auto','auto', 'auto']
            },
            {
                id: 'logolptv',
                type: 'image',
                rect: ['9px', '2px','86px','42px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logolptv.svg",'0px','0px']
            }],
            symbolInstances: [
            {
                id: 'boton2',
                symbolName: 'boton2'
            }
            ]
        },
    states: {
        "Base State": {
            "${_Stage}": [
                ["color", "background-color", 'rgba(0,0,0,1.00)'],
                ["style", "width", '300px'],
                ["style", "height", '42px'],
                ["style", "overflow", 'hidden']
            ],
            "${_logolptv}": [
                ["style", "left", '9px'],
                ["style", "top", '2px']
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
                    transform: [[0, 0], [], [], ['0.81361', '0.81361']],
                    rect: ['-7px', '-4px', '77px', '42px', 'auto', 'auto'],
                    borderRadius: ['10px', '10px', '10px', '10px'],
                    type: 'rect',
                    id: 'RoundRect',
                    stroke: [0, 'rgb(0, 0, 0)', 'none'],
                    clip: ['rect(0px 77px 35.5234375px 0px)'],
                    fill: ['rgba(192,192,192,1)', [270, [['rgba(44,120,139,1.00)', 0], ['rgba(59,141,215,1.00)', 100]]]]
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${symbolSelector}": [
                ["style", "height", '34px'],
                ["style", "width", '63px']
            ],
            "${_RoundRect}": [
                ["style", "top", '-4px'],
                ["transform", "scaleY", '0.81361'],
                ["transform", "scaleX", '0.81361'],
                ["gradient", "background-image", [270,[['rgba(44,120,139,1.00)',0],['rgba(59,141,215,1.00)',100]]]],
                ["style", "clip", [0,77,35.5234375,0], {valueTemplate:'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'} ],
                ["style", "left", '-7px']
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
"boton2": {
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
                    rect: ['0px', '0px', '63', '34', 'auto', 'auto'],
                    id: 'Group',
                    cursor: ['default'],
                    type: 'group',
                    c: [
                    {
                        id: 'boton',
                        type: 'rect',
                        rect: ['0px', '0px', 'auto', 'auto', 'auto', 'auto']
                    },
                    {
                        rect: ['9px', '4px', 'auto', 'auto', 'auto', 'auto'],
                        id: 'Text',
                        text: 'ver todos<br>los videos',
                        font: ['Arial, Helvetica, sans-serif', 10, 'rgba(255,255,255,1.00)', 'normal', 'none', ''],
                        type: 'text'
                    }]
                }
            ],
            symbolInstances: [
            {
                id: 'boton',
                symbolName: 'boton',
                autoPlay: {

               }
            }            ]
        },
    states: {
        "Base State": {
            "${_Group}": [
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "cursor", 'default']
            ],
            "${_boton}": [
                ["style", "left", '0px'],
                ["style", "top", '0px']
            ],
            "${_Text}": [
                ["style", "top", '4px'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "left", '9px'],
                ["style", "font-size", '10px']
            ],
            "${symbolSelector}": [
                ["style", "height", '34px'],
                ["style", "width", '63px']
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
})(jQuery, AdobeEdge, "EDGE-30643859");

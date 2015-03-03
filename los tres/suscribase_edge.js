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
                id: 'RoundRect',
                type: 'rect',
                rect: ['-10px', '54px','136px','54px','auto', 'auto'],
                clip: ['rect(0px 136px 54px 10.43359375px)'],
                borderRadius: ["10px", "10px", "10px", "10px"],
                fill: ["rgba(243,153,33,1.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'texto2',
                type: 'image',
                rect: ['8px', '56px','107px','55px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"texto2.svg",'0px','0px']
            },
            {
                id: 'textosuscribite',
                type: 'image',
                rect: ['29px', '7px','248px','43px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"textosuscribite.svg",'0px','0px']
            },
            {
                id: 'diario',
                type: 'image',
                rect: ['123px', '46px','183px','80px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"diario.png",'0px','0px'],
                transform: [[],[],[],['0.8764','0.8764']]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_RoundRect}": [
                ["style", "top", '127px'],
                ["style", "clip", [0,136,54,10.43359375], {valueTemplate:'rect(@@0@@px @@1@@px @@2@@px @@3@@px)'} ],
                ["style", "left", '-10px'],
                ["color", "background-color", 'rgba(243,153,33,1.00)']
            ],
            "${_textosuscribite}": [
                ["style", "left", '-249px'],
                ["style", "top", '7px']
            ],
            "${_texto2}": [
                ["style", "left", '8px'],
                ["style", "top", '129px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(54,84,158,1.00)'],
                ["style", "width", '300px'],
                ["style", "height", '120px'],
                ["style", "overflow", 'hidden']
            ],
            "${_diario}": [
                ["style", "top", '161px'],
                ["transform", "scaleY", '0.8764'],
                ["style", "left", '248px'],
                ["transform", "scaleX", '0.8764']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 3330,
            autoPlay: true,
            timeline: [
                { id: "eid2", tween: [ "style", "${_textosuscribite}", "left", '29px', { fromValue: '-249px'}], position: 0, duration: 683 },
                { id: "eid5", tween: [ "style", "${_texto2}", "top", '56px', { fromValue: '129px'}], position: 683, duration: 500 },
                { id: "eid6", tween: [ "style", "${_RoundRect}", "top", '54px', { fromValue: '127px'}], position: 683, duration: 500 },
                { id: "eid10", tween: [ "style", "${_diario}", "top", '46px', { fromValue: '161px'}], position: 1183, duration: 525, easing: "easeInBack" },
                { id: "eid9", tween: [ "style", "${_diario}", "left", '123px', { fromValue: '248px'}], position: 1183, duration: 525, easing: "swing" }            ]
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
})(jQuery, AdobeEdge, "EDGE-13280513");

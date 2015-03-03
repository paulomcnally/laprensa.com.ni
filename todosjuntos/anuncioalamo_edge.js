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
                fill: ["rgba(0,0,0,0)",im+"fondo.svg",'0px','0px']
            },
            {
                id: 'texto',
                type: 'image',
                rect: ['150px', '12px','114px','34px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"texto.svg",'0px','0px']
            },
            {
                id: 'hombrecito',
                type: 'image',
                rect: ['163px', '40px','90px','93px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"hombrecito.svg",'0px','0px']
            },
            {
                id: 'fondo2',
                type: 'image',
                rect: ['0px', '0px','300px','131px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fondo2.svg",'0px','0px']
            },
            {
                id: 'texto2fondo2',
                type: 'image',
                rect: ['179px', '74px','111px','53px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"texto2fondo2.svg",'0px','0px']
            },
            {
                id: 'textofondo2',
                type: 'image',
                rect: ['9px', '72px','154px','59px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"textofondo2.svg",'0px','0px']
            },
            {
                id: 'fondo3',
                type: 'image',
                rect: ['0px', '0px','300px','131px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fondo3.svg",'0px','0px']
            },
            {
                id: 'logoalamo',
                type: 'image',
                rect: ['72px', '29px','159px','73px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logoalamo.svg",'0px','0px','100%','100%']
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_texto}": [
                ["style", "left", '327px'],
                ["style", "top", '66px']
            ],
            "${_texto2fondo2}": [
                ["style", "top", '139px'],
                ["style", "opacity", '1'],
                ["style", "left", '175px']
            ],
            "${_logoalamo}": [
                ["style", "top", '29px'],
                ["transform", "scaleY", '-0.00732'],
                ["transform", "scaleX", '-0.00732'],
                ["style", "opacity", '1'],
                ["style", "left", '72px']
            ],
            "${_fondo3}": [
                ["style", "top", '-136px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "height", '120px']
            ],
            "${_fondo}": [
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "height", '120px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '120px'],
                ["style", "width", '300px']
            ],
            "${_fondo2}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '300px'],
                ["style", "height", '120px']
            ],
            "${_hombrecito}": [
                ["style", "top", '136px'],
                ["style", "left", '157px'],
                ["style", "height", '80px']
            ],
            "${_textofondo2}": [
                ["style", "top", '131px'],
                ["style", "opacity", '1'],
                ["style", "left", '9px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 9250,
            autoPlay: true,
            timeline: [
                { id: "eid4", tween: [ "style", "${_texto}", "top", '12px', { fromValue: '66px'}], position: 0, duration: 1500, easing: "easeOutElastic" },
                { id: "eid25", tween: [ "transform", "${_logoalamo}", "scaleX", '1', { fromValue: '-0.00732'}], position: 6446, duration: 713 },
                { id: "eid27", tween: [ "transform", "${_logoalamo}", "scaleX", '2.19035', { fromValue: '1'}], position: 7159, duration: 787 },
                { id: "eid29", tween: [ "transform", "${_logoalamo}", "scaleX", '0.96855', { fromValue: '2.19035'}], position: 7946, duration: 655, easing: "easeOutElastic" },
                { id: "eid44", tween: [ "style", "${_fondo3}", "opacity", '1', { fromValue: '0'}], position: 5437, duration: 890 },
                { id: "eid5", tween: [ "style", "${_hombrecito}", "height", '80px', { fromValue: '80px'}], position: 1500, duration: 0 },
                { id: "eid20", tween: [ "style", "${_fondo3}", "top", '0px', { fromValue: '-136px'}], position: 5437, duration: 890 },
                { id: "eid42", tween: [ "style", "${_fondo2}", "opacity", '1', { fromValue: '0'}], position: 2250, duration: 1000 },
                { id: "eid26", tween: [ "transform", "${_logoalamo}", "scaleY", '1', { fromValue: '-0.00732'}], position: 6446, duration: 713 },
                { id: "eid28", tween: [ "transform", "${_logoalamo}", "scaleY", '2.19035', { fromValue: '1'}], position: 7159, duration: 787 },
                { id: "eid30", tween: [ "transform", "${_logoalamo}", "scaleY", '0.96855', { fromValue: '2.19035'}], position: 7946, duration: 655, easing: "easeOutElastic" },
                { id: "eid1", tween: [ "style", "${_fondo2}", "height", '120px', { fromValue: '120px'}], position: 3250, duration: 0, easing: "easeOutElastic" },
                { id: "eid32", tween: [ "style", "${_texto2fondo2}", "top", '65px', { fromValue: '139px'}], position: 3785, duration: 517, easing: "easeOutBounce" },
                { id: "eid31", tween: [ "style", "${_texto2fondo2}", "left", '179px', { fromValue: '175px'}], position: 3785, duration: 517, easing: "easeOutBounce" },
                { id: "eid2", tween: [ "style", "${_fondo3}", "height", '120px', { fromValue: '120px'}], position: 6327, duration: 0 },
                { id: "eid39", tween: [ "style", "${_logoalamo}", "opacity", '0.37144442755601', { fromValue: '1'}], position: 7159, duration: 787 },
                { id: "eid40", tween: [ "style", "${_logoalamo}", "opacity", '1', { fromValue: '0.3714439868927002'}], position: 7946, duration: 655, easing: "easeOutElastic" },
                { id: "eid10", tween: [ "style", "${_fondo2}", "left", '0px', { fromValue: '300px'}], position: 2250, duration: 1000 },
                { id: "eid12", tween: [ "style", "${_textofondo2}", "top", '65px', { fromValue: '131px'}], position: 3250, duration: 535, easing: "easeOutElastic" },
                { id: "eid3", tween: [ "style", "${_texto}", "left", '150px', { fromValue: '327px'}], position: 0, duration: 1500, easing: "easeOutElastic" },
                { id: "eid7", tween: [ "style", "${_hombrecito}", "left", '163px', { fromValue: '157px'}], position: 0, duration: 1500, easing: "easeInOutElastic" },
                { id: "eid8", tween: [ "style", "${_hombrecito}", "top", '40px', { fromValue: '136px'}], position: 0, duration: 1500, easing: "easeInOutElastic" }            ]
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
})(jQuery, AdobeEdge, "EDGE-949527");

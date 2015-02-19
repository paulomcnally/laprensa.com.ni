/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='images/';

var fonts = {};    fonts['dynalight, sans-serif']='<script src=\"http://use.edgefonts.net/dynalight:n4:all.js\"></script>';

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
                rect: ['0px', '0px','725px','88px','auto', 'auto'],
                fill: ["rgba(239,240,163,0.00)"],
                stroke: [1,"rgba(0,0,0,1.00)","solid"]
            },
            {
                id: 'carrito',
                type: 'image',
                rect: ['5.4%', '4.4%','95px','78px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"carrito.svg",'0px','0px']
            },
            {
                id: 'RoundRect',
                type: 'rect',
                rect: ['337px', '17px','235px','28px','auto', 'auto'],
                borderRadius: ["10px", "10px", "10px", "10px"],
                fill: ["rgba(239,240,163,1.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'laprensa',
                type: 'image',
                rect: ['743px', '-5px','300px','100px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"laprensa.svg",'0px','0px']
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['825px', '18px','auto','auto','auto', 'auto'],
                text: "Tienda ",
                font: ['dynalight, sans-serif', 45, "rgba(100,104,169,1.00)", "normal", "none", ""]
            },
            {
                id: 'Text2',
                type: 'text',
                rect: ['127px', '-49px','auto','auto','auto', 'auto'],
                text: "TODOS nuestros artículos en un solo lugar",
                font: ['Arial, Helvetica, sans-serif', [24, ""], "rgba(17,32,175,1.00)", "normal", "none", ""]
            },
            {
                id: 'Text3',
                type: 'text',
                rect: ['106px', '113px','auto','auto','auto', 'auto'],
                text: "ingresa a nuestro sitio www.laprensa.com.ni y <br>dale clic a la sección TIENDA",
                align: "center",
                font: ['Arial, Helvetica, sans-serif', 24, "rgba(17,32,175,1)", "400", "none", "normal"]
            },
            {
                id: 'fondo',
                type: 'image',
                rect: ['-159px', '69px','1045px','171px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fondo.png",'0px','0px'],
                transform: [[],[],[],['0.69665','0.69665']]
            },
            {
                id: 'manito2',
                type: 'image',
                rect: ['559px', '129px','51px','59px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"manito2.svg",'0px','0px']
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_carrito}": [
                ["style", "-webkit-transform-origin", [50,50], {valueTemplate:'@@0@@% @@1@@%'} ],
                ["style", "-moz-transform-origin", [50,50],{valueTemplate:'@@0@@% @@1@@%'}],
                ["style", "-ms-transform-origin", [50,50],{valueTemplate:'@@0@@% @@1@@%'}],
                ["style", "msTransformOrigin", [50,50],{valueTemplate:'@@0@@% @@1@@%'}],
                ["style", "-o-transform-origin", [50,50],{valueTemplate:'@@0@@% @@1@@%'}],
                ["transform", "scaleX", '1'],
                ["style", "background-size", [99.2,99.2], {valueTemplate:'@@0@@% @@1@@%'} ],
                ["style", "left", '103.79%'],
                ["style", "width", '93px'],
                ["style", "top", '4.44%'],
                ["transform", "scaleY", '1'],
                ["transform", "skewX", '0deg'],
                ["transform", "skewY", '0deg'],
                ["style", "opacity", '1']
            ],
            "${_RoundRect}": [
                ["style", "top", '17px'],
                ["style", "opacity", '0'],
                ["color", "background-color", 'rgba(239,240,163,1.00)']
            ],
            "${_laprensa}": [
                ["style", "top", '-5px'],
                ["style", "opacity", '1'],
                ["style", "left", '743px']
            ],
            "${_Text3}": [
                ["style", "top", '113px'],
                ["style", "text-align", 'center'],
                ["style", "left", '106px']
            ],
            "${_fondo}": [
                ["style", "top", '69px'],
                ["transform", "scaleY", '0.69665'],
                ["style", "left", '-159px'],
                ["transform", "scaleX", '0.69665']
            ],
            "${_Text2}": [
                ["style", "top", '-49px'],
                ["style", "left", '127px'],
                ["color", "color", 'rgba(17,32,175,1.00)']
            ],
            "${_manito2}": [
                ["style", "top", '129px'],
                ["style", "left", '559px']
            ],
            "${_Text}": [
                ["style", "top", '18px'],
                ["color", "color", 'rgba(100,104,169,1.00)'],
                ["style", "font-family", 'dynalight, sans-serif'],
                ["style", "left", '825px'],
                ["style", "font-size", '45px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '90px'],
                ["gradient", "background-image", [270,[['rgba(205,204,206,1.00)',0],['rgba(255,255,255,1.00)',100]]]],
                ["style", "width", '728px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(239,240,163,0.00)'],
                ["style", "border-width", '1px'],
                ["style", "height", '88px'],
                ["style", "border-style", 'solid'],
                ["style", "left", '0px'],
                ["style", "width", '725px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 13750,
            autoPlay: true,
            timeline: [
                { id: "eid5", tween: [ "style", "${_carrito}", "left", '5.77%', { fromValue: '103.79%'}], position: 0, duration: 2000, easing: "easeOutBack" },
                { id: "eid12", tween: [ "style", "${_laprensa}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 394, easing: "easeOutElastic" },
                { id: "eid11", tween: [ "style", "${_laprensa}", "left", '370px', { fromValue: '743px'}], position: 1500, duration: 500, easing: "easeOutBack" },
                { id: "eid39", tween: [ "style", "${_carrito}", "top", '4.44%', { fromValue: '4.44%'}], position: 3690, duration: 0, easing: "easeOutElastic" },
                { id: "eid66", tween: [ "style", "${_Text3}", "left", '101px', { fromValue: '106px'}], position: 6860, duration: 305 },
                { id: "eid40", tween: [ "style", "${_carrito}", "width", '93px', { fromValue: '93px'}], position: 3690, duration: 0, easing: "easeOutElastic" },
                { id: "eid69", tween: [ "style", "${_fondo}", "top", '-26px', { fromValue: '69px'}], position: 9500, duration: 361 },
                { id: "eid8", tween: [ "transform", "${_carrito}", "scaleX", '1.51356', { fromValue: '1'}], position: 0, duration: 2000, easing: "swing" },
                { id: "eid37", tween: [ "style", "${_carrito}", "background-size", [99.2,99.2], { valueTemplate: '@@0@@% @@1@@%', fromValue: [99.2,99.2]}], position: 3690, duration: 0, easing: "easeOutElastic" },
                { id: "eid45", tween: [ "style", "${_carrito}", "opacity", '0', { fromValue: '1'}], position: 3690, duration: 103, easing: "easeOutElastic" },
                { id: "eid10", tween: [ "style", "${_Text}", "top", '23px', { fromValue: '18px'}], position: 750, duration: 750, easing: "easeOutBack" },
                { id: "eid14", tween: [ "style", "${_Text}", "top", '18px', { fromValue: '23px'}], position: 3394, duration: 675, easing: "easeOutElastic" },
                { id: "eid62", tween: [ "style", "${_Text2}", "left", '126px', { fromValue: '127px'}], position: 3733, duration: 259 },
                { id: "eid63", tween: [ "style", "${_Text2}", "left", '31px', { fromValue: '126px'}], position: 6500, duration: 185 },
                { id: "eid68", tween: [ "style", "${_RoundRect}", "opacity", '1', { fromValue: '0'}], position: 7000, duration: 110 },
                { id: "eid71", tween: [ "style", "${_manito2}", "top", '15px', { fromValue: '129px'}], position: 9500, duration: 219 },
                { id: "eid35", tween: [ "transform", "${_carrito}", "skewX", '0deg', { fromValue: '0deg'}], position: 3690, duration: 0, easing: "easeOutElastic" },
                { id: "eid65", tween: [ "style", "${_Text3}", "top", '17px', { fromValue: '113px'}], position: 6860, duration: 305 },
                { id: "eid9", tween: [ "style", "${_Text}", "left", '240px', { fromValue: '825px'}], position: 750, duration: 750, easing: "easeOutBack" },
                { id: "eid13", tween: [ "style", "${_Text}", "left", '760px', { fromValue: '240px'}], position: 3394, duration: 675, easing: "easeOutElastic" },
                { id: "eid70", tween: [ "style", "${_manito2}", "left", '393px', { fromValue: '559px'}], position: 10580, duration: 219 },
                { id: "eid61", tween: [ "style", "${_Text2}", "top", '29px', { fromValue: '-49px'}], position: 3733, duration: 259 },
                { id: "eid64", tween: [ "style", "${_Text2}", "top", '-63px', { fromValue: '29px'}], position: 6500, duration: 185 }            ]
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
})(jQuery, AdobeEdge, "EDGE-638465");

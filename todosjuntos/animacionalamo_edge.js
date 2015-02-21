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
                id: 'logosol',
                type: 'image',
                rect: ['10px', '120px','283px','111px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logosol.svg",'0px','0px']
            },
            {
                id: 'Text',
                type: 'text',
                rect: ['11px', '145px','auto','auto','auto', 'auto'],
                text: "www.budget.com.ni",
                font: ['Arial, Helvetica, sans-serif', 14, "rgba(255,207,0,1.00)", "normal", "none", ""]
            },
            {
                id: 'Group',
                type: 'group',
                rect: ['170', '128','130','18','auto', 'auto'],
                c: [
                {
                    id: 'Text2',
                    type: 'text',
                    rect: ['15px', '0px','auto','auto','auto', 'auto'],
                    text: " / budgetnicaragua",
                    align: "left",
                    font: ['Arial, Helvetica, sans-serif', 14, "rgba(255,207,0,1)", "400", "none", "normal"]
                },
                {
                    id: 'Text3',
                    type: 'text',
                    rect: ['0px', '0px','auto','auto','auto', 'auto'],
                    text: "f",
                    align: "left",
                    font: ['Arial, Helvetica, sans-serif', 16, "rgba(255,255,255,1.00)", "400", "none", "normal"]
                }]
            },
            {
                id: 'Group2',
                type: 'group',
                rect: ['300px', '85px','0px','28','auto', 'auto'],
                c: [
                {
                    id: 'Rectangle',
                    type: 'rect',
                    rect: ['0px', '0px','300px','28px','auto', 'auto'],
                    fill: ["rgba(139,221,243,1.00)"],
                    stroke: [0,"rgba(0,0,0,1)","none"]
                },
                {
                    id: 'Text4',
                    type: 'text',
                    rect: ['15px', '5px','auto','auto','auto', 'auto'],
                    text: "Ahora en San Juan del Sur, Nicaragua",
                    align: "left",
                    font: ['Arial, Helvetica, sans-serif', 16, "rgba(15,11,183,1.00)", "400", "none", "normal"],
                    textShadow: ["rgba(255,255,255,0.65)", 1, 1, 0]
                }]
            },
            {
                id: 'Group2Copy',
                type: 'group',
                rect: ['305px', '85px','0px','28','auto', 'auto'],
                c: [
                {
                    id: 'RectangleCopy',
                    type: 'rect',
                    rect: ['0px', '0px','300px','28px','auto', 'auto'],
                    fill: ["rgba(139,221,243,1.00)"],
                    stroke: [0,"rgba(0,0,0,1)","none"]
                },
                {
                    id: 'Text4Copy',
                    type: 'text',
                    rect: ['15px', '5px','auto','auto','auto', 'auto'],
                    text: "Seguimos Creciendo...",
                    align: "left",
                    font: ['Arial, Helvetica, sans-serif', 16, "rgba(15,11,183,1.00)", "400", "none", "normal"],
                    textShadow: ["rgba(255,255,255,0.65)", 1, 1, 0]
                }]
            },
            {
                id: 'logobudget',
                type: 'image',
                rect: ['6px', '4px','283px','80px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"logobudget.svg",'0px','0px']
            },
            {
                id: 'Rectangle2',
                type: 'rect',
                rect: ['0px', '1px','300px','120px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(192,192,192,0.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            }],
            symbolInstances: [

            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2}": [
                ["color", "background-color", 'rgba(192,192,192,0.00)'],
                ["style", "cursor", 'pointer']
            ],
            "${_logosol}": [
                ["style", "top", '120px'],
                ["style", "height", '111px'],
                ["style", "left", '10px'],
                ["style", "width", '283px']
            ],
            "${_Group2}": [
                ["style", "top", '85px'],
                ["style", "left", '300px'],
                ["style", "width", '0px']
            ],
            "${_Text3}": [
                ["style", "top", '0px'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "left", '0px'],
                ["style", "font-size", '16px']
            ],
            "${_Text2}": [
                ["color", "color", 'rgba(255,207,0,1)'],
                ["style", "left", '15px'],
                ["style", "top", '0px']
            ],
            "${_logobudget}": [
                ["style", "top", '4px'],
                ["style", "height", '80px'],
                ["style", "opacity", '0'],
                ["style", "left", '6px'],
                ["style", "width", '283px']
            ],
            "${_Group}": [
                ["style", "left", '170px'],
                ["style", "top", '128px']
            ],
            "${_Text4}": [
                ["style", "top", '5px'],
                ["subproperty", "textShadow.offsetH", '1px'],
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.offsetV", '1px'],
                ["color", "color", 'rgba(15,11,183,1.00)'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,0.65)'],
                ["style", "left", '15px'],
                ["style", "font-size", '16px']
            ],
            "${_RectangleCopy}": [
                ["color", "background-color", 'rgba(139,221,243,1)'],
                ["style", "left", '0px'],
                ["style", "top", '0px']
            ],
            "${_Text}": [
                ["style", "top", '145px'],
                ["color", "color", 'rgba(255,207,0,1.00)'],
                ["style", "left", '11px'],
                ["style", "font-size", '14px']
            ],
            "${_Group2Copy}": [
                ["style", "top", '85px'],
                ["style", "left", '305px'],
                ["style", "width", '308px']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(139,221,243,1.00)'],
                ["style", "left", '0px'],
                ["style", "top", '0px']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(0,39,99,1.00)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '120px'],
                ["style", "width", '300px']
            ],
            "${_Text4Copy}": [
                ["subproperty", "textShadow.blur", '0px'],
                ["subproperty", "textShadow.offsetH", '1px'],
                ["style", "top", '5px'],
                ["subproperty", "textShadow.color", 'rgba(255,255,255,0.65098)'],
                ["color", "color", 'rgba(15,11,183,1)'],
                ["subproperty", "textShadow.offsetV", '1px'],
                ["style", "left", '15px'],
                ["style", "font-size", '16px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 5750,
            autoPlay: true,
            timeline: [
                { id: "eid44", tween: [ "style", "${_Group2Copy}", "left", '0px', { fromValue: '305px'}], position: 4504, duration: 634, easing: "easeOutSine" },
                { id: "eid3", tween: [ "style", "${_Group}", "left", '162px', { fromValue: '170px'}], position: 0, duration: 1015 },
                { id: "eid28", tween: [ "style", "${_Group}", "left", '163px', { fromValue: '162px'}], position: 1436, duration: 295 },
                { id: "eid48", tween: [ "style", "${_logosol}", "top", '-21px', { fromValue: '120px'}], position: 2550, duration: 515 },
                { id: "eid4", tween: [ "style", "${_Group}", "top", '98px', { fromValue: '128px'}], position: 0, duration: 1015 },
                { id: "eid29", tween: [ "style", "${_Group}", "top", '128px', { fromValue: '98px'}], position: 1436, duration: 295 },
                { id: "eid35", tween: [ "style", "${_Group2}", "left", '0px', { fromValue: '300px'}], position: 1731, duration: 819 },
                { id: "eid42", tween: [ "style", "${_Group2}", "left", '-308px', { fromValue: '0px'}], position: 3835, duration: 541, easing: "easeOutSine" },
                { id: "eid34", tween: [ "style", "${_Group2}", "width", '313px', { fromValue: '0px'}], position: 1731, duration: 819 },
                { id: "eid43", tween: [ "style", "${_Group2}", "width", '308px', { fromValue: '313px'}], position: 3835, duration: 541, easing: "easeOutSine" },
                { id: "eid46", tween: [ "style", "${_logobudget}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 1015 },
                { id: "eid47", tween: [ "style", "${_logobudget}", "opacity", '0', { fromValue: '1'}], position: 1436, duration: 295 },
                { id: "eid30", tween: [ "style", "${_Text}", "left", '8px', { fromValue: '11px'}], position: 1436, duration: 295 },
                { id: "eid49", tween: [ "style", "${_logosol}", "left", '15px', { fromValue: '10px'}], position: 2550, duration: 515 },
                { id: "eid1", tween: [ "style", "${_Text}", "top", '97px', { fromValue: '145px'}], position: 0, duration: 1015 },
                { id: "eid31", tween: [ "style", "${_Text}", "top", '129px', { fromValue: '97px'}], position: 1436, duration: 295 }            ]
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
})(jQuery, AdobeEdge, "EDGE-18407505");

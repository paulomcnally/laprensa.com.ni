/***********************
* Acciones de composición de Adobe Edge Animate
*
* Editar este archivo con precaución, teniendo cuidado de conservar 
* las firmas de función y los comentarios que comienzan con "Edge" para mantener la 
* capacidad de interactuar con estas acciones en Adobe Edge Animate
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // los alias más comunes para las clases de Edge

   //Edge symbol: 'stage'
   (function(symbolName) {
      
      
      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 5750, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

      Symbol.bindElementAction(compId, symbolName, "${_Rectangle2}", "click", function(sym, e) {
         // Ir a una nueva dirección URL en la ventana actual
         // (sustituya "_self" por un atributo de destino para una nueva ventana)
         window.open("http://www.budget.com.ni", "_blank");
         

      });
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

})(jQuery, AdobeEdge, "EDGE-18407505");
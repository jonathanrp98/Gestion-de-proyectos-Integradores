

//filtro por grupo

$("#codigo").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[1].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});

//filtro por semestre

$("#semestre").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[3].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});

//filtro por jornada

$("#jornada").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[5].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});

//filtro por perido

$("#periodo").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[7].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});

//filtro por asesor

$("#asesor").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[9].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});

//filtro por programa

$("#programa").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);
    let e = obj.content[11].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
        $(this).show();
    }
  });
});


function mapDOM(element, json) {
    var treeObject = {};
  
    // If string convert to document Node
    if (typeof element === "string") {
      if (window.DOMParser) {
        parser = new DOMParser();
        docNode = parser.parseFromString(element, "text/xml");
      } else { // Microsoft strikes again
        docNode = new ActiveXObject("Microsoft.XMLDOM");
        docNode.async = false;
        docNode.loadXML(element);
      }
      element = docNode.firstChild;
    }
    //Recursively loop through DOM elements and assign properties to object
    function treeHTML(element, object) {
      object["type"] = element.nodeName;
      var nodeList = element.childNodes;
      if (nodeList != null) {
        if (nodeList.length) {
          object["content"] = [];
          for (var i = 0; i < nodeList.length; i++) {
            if (nodeList[i].nodeType == 3) {
              object["content"].push(nodeList[i].nodeValue);
            } else {
              object["content"].push({});
              treeHTML(nodeList[i], object["content"][object["content"].length - 1]);
            }
          }
        }
      }
      if (element.attributes != null) {
        if (element.attributes.length) {
          object["attributes"] = {};
          for (var i = 0; i < element.attributes.length; i++) {
            object["attributes"][element.attributes[i].nodeName] = element.attributes[i].nodeValue;
          }
        }
      }
    }
    treeHTML(element, treeObject);
  
    return (json) ? JSON.stringify(treeObject) : treeObject;
  }
  
	  document.getElementById("codigo").onclick = limpiaCampo;
		document.getElementById("semestre").onclick = limpiaCampo;
		document.getElementById("jornada").onclick = limpiaCampo;
		document.getElementById("periodo").onclick = limpiaCampo;
		document.getElementById("asesor").onclick = limpiaCampo;
		document.getElementById("programa").onclick = limpiaCampo;
		var elements = document.querySelectorAll("input");

		for (var i = 0; i < elements.length; i++) {
			elements[i].addEventListener("focus", function () {

				inputfocused = this;
			});
		}

		function limpiaCampo() {
			$("#formEjemplo")[0].reset();
			


		}
// filtro por codigo 

var filtro = [];

$(document).ready(function () {
    $.each($("#mytable tbody tr "), function () {
        //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
        // console.log($(this).text());
        //console.log(this);
        var json = mapDOM(this, true);
        obj = JSON.parse(json);
        filtro.push(obj.content[3].content[0]);
    });
});




//filtro por grupo

$("#codigo").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
    // console.log($(this).text());
    //console.log(this);
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);

    let e = obj.content[3].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
      console.log(obj.content[3].content[0]);
      filtro.push(obj.content[3].content[0]);
      $(this).show();
    }
  });
});

//filtro por semestre

$("#semestre").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
    // console.log($(this).text());
    //console.log(this);
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);

    let e = obj.content[5].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
      console.log(obj.content[3].content[0]);
      filtro.push(obj.content[3].content[0]);
      $(this).show();
    }
  });
});



//filtro por jornada
$("#jornada").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
    // console.log($(this).text());
    //console.log(this);
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);

    let e = obj.content[7].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
      console.log(obj.content[3].content[0]);
      filtro.push(obj.content[3].content[0]);
      $(this).show();
    }
  });
});
//filtro por asesor
$("#asesor").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
    // console.log($(this).text());
    //console.log(this);
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);

    let e = obj.content[9].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
      console.log(obj.content[3].content[0]);
      filtro.push(obj.content[3].content[0]);
      $(this).show();
    }
  });
});
//filtro por programa 
$("#programa").keyup(function () {
  filtro = [];
  _this = this;
  $.each($("#mytable tbody tr "), function () {
    //console.log($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()));
    // console.log($(this).text());
    //console.log(this);
    var json = mapDOM(this, true);
    obj = JSON.parse(json);
    console.log(this);

    let e = obj.content[11].content[0].toLowerCase().indexOf($(_this).val().toLowerCase());
    if (e === -1) {
      $(this).hide();
    } else {
      console.log(obj.content[3].content[0]);
      filtro.push(obj.content[3].content[0]);
      $(this).show();
    }
  });
});


// ----------------------------------------------
// CONVERTIR EN JSON
// -----------------------------------------------

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

// ---------------------------------------------------
// ALL CHECKBOX
//-----------------------------------------------------


//activar checkbox 

$("#selectall").on("click", function () {
  // if all checkbox are selected, check the selectall checkbox and viceversa  
  filtro.forEach(k => {
    $("#form-check-input" + k).prop("checked", this.checked);
    $("#form-check-input" + k).on("click", function () {
      if ($("#form-check-input" + k).length == $("#form-check-input" + k + ":checked").length) {
        $("#selectall").prop("checked", true);
      } else {
        $("#selectall").prop("checked", false);
      }
    });

  })
});


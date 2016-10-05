
function drawVolumeText(value){ // в литрах
  if(typeof layer_4 != "undefined") { // очищаем память
    layer_4.destroy();
  }
  
  layer_4 = new Konva.Layer({
  });
  
  var volumeText = new Konva.Text({
    x: 260,
    y: 25,
    width: 95,
    height: 80,
    text: "Объем жидкости:\n\n" + value + " литров",
    fontSize: 14,
    align: 'center'
  });
  layer_4.add(volumeText);
  
  stage.add(layer_4); 
}


function drawChangeDiameter(value){
  if(typeof layer != "undefined") { // очищаем память
    layer.destroy();
  }
  
  layer = new Konva.Layer({
  });
  
  var diameterName = new Konva.Text({
    x: 80,
    y: 114,
    text: value + " мм.",
    fontSize: 14,
    align: 'center'
  });
  layer.add(diameterName);
  
  stage.add(layer);  
  calc_v(); 
}


function drawChangeLength(value){
  if(typeof layer_2 != "undefined") { // очищаем память
    layer_2.destroy();
  }
  
  layer_2 = new Konva.Layer({
  });
  
  var lengthName = new Konva.Text({
    x: 180,
    y: 323,
    text: value + " м.",
    fontSize: 14,
  });
  layer_2.add(lengthName);
  
  stage.add(layer_2);  
  calc_v();  
}

function drawChangeFilling(value){
  
if(typeof layer_3 != "undefined") { // очищаем память
  layer_3.destroy();
}

layer_3 = new Konva.Layer({
});

if (value != 0){
  group = new Konva.Group({
    clip: {
        x : 150,
        y : 120,
        width : 80,
        height : -1 * (80 * value / Number($('input[name="diameter"]').val())) // 100% = 80 единиц
    }
  });  
} else {
  group = new Konva.Group({
    clip: {
        x : 150,
        y : 120,
        width : 80,
        height : 0.01
    }
  }); 
}


circleFill = new Konva.Circle({
  x: stage.getWidth() / 2,
  y: 80,
  radius: 39,
  fill: '#00D2FF'
});

group.add(circleFill);
layer_3.add(group);

if (value != 0){
  group_2 = new Konva.Group({
    clip: {
        x : 40,
        y : 271,
        width : 300,
        height : -1 * (80 * value / Number($('input[name="diameter"]').val())) // 100% = 80 единиц
    }
  });
} else {
  group_2 = new Konva.Group({
    clip: {
        x : 40,
        y : 271,
        width : 300,
        height : 0.01
    }
  });
}
  

rectFill = new Konva.Rect({
  x: 41,
  y: 192,
  width: 298,
  height: 78,
  fill: '#00D2FF'
});

group_2.add(rectFill);
layer_3.add(group_2);


circleDim = new Konva.Line({
  points: [237,33, 138,132, 70,132],
  stroke: '#787878',
  strokeWidth: 2
})
layer_3.add(circleDim);

circleDim2 = new Konva.Line({
  points: [204,55, 218,52, 215,66],
  stroke: '#787878',
  strokeWidth: 2
})
layer_3.add(circleDim2);

circleDim3 = new Konva.Line({
  points: [168,94, 162,108, 176,105],
  stroke: '#787878',
  strokeWidth: 2
})
layer_3.add(circleDim3);



stage.add(layer_3);


calc_v(); 
}


























stage = new Konva.Stage({
    container: 'container',
    width: (380),
    height: (380)
});

backgroundLayer = new Konva.Layer({
  
});

// Фон слоя
ground = new Konva.Rect({ 
  width: stage.getWidth(),
  height: stage.getHeight(),
  fill: '#ecf0f5'
})
backgroundLayer.add(ground);

circleOuter = new Konva.Circle({
  x: stage.getWidth() / 2,
  y: 80,
  radius: 46,
  fill: '#bebebe',
  stroke: 'black',
  strokeWidth: 2
});
backgroundLayer.add(circleOuter);

circleInner = new Konva.Circle({
  x: stage.getWidth() / 2,
  y: 80,
  radius: 40,
  fill: '#ecf0f5',
  stroke: 'black',
  strokeWidth: 2
});
backgroundLayer.add(circleInner);




pipeRect = new Konva.Rect({ 
  width: 300,
  height: 92,
  x: 40,
  y: 185,
  fill: '#bebebe',
  stroke: 'black',
  strokeWidth: 2
})
backgroundLayer.add(pipeRect);

pipeRect2 = new Konva.Rect({ 
  width: 300,
  height: 80,
  x: 40,
  y: 191,
  fill: '#ecf0f5',
  stroke: 'black',
  strokeWidth: 2
})
backgroundLayer.add(pipeRect2);

pipeDim = new Konva.Line({
  points: [40,285, 40,350],
  stroke: '#787878',
  strokeWidth: 2
})
backgroundLayer.add(pipeDim);

pipeDim2 = new Konva.Line({
  points: [340,285, 340,350],
  stroke: '#787878',
  strokeWidth: 2
})
backgroundLayer.add(pipeDim2);

pipeDim3 = new Konva.Line({
  points: [40,341, 340,341],
  stroke: '#787878',
  strokeWidth: 2
})
backgroundLayer.add(pipeDim3);

pipeDim4 = new Konva.Line({
  points: [53,334, 40,341, 53,349],
  stroke: '#787878',
  strokeWidth: 2
})
backgroundLayer.add(pipeDim4);

pipeDim5 = new Konva.Line({
  points: [327,334, 340,341, 327,349],
  stroke: '#787878',
  strokeWidth: 2
})
backgroundLayer.add(pipeDim5);












stage.add(backgroundLayer);









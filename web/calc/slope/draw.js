

function drawTriangle() {
  
  if (angle < 45) {
    triAngleWidth = 300;
    triAngleHeight = Math.tan(angle * Math.PI / 180) * triAngleWidth;
  } else {
    triAngleHeight = 300;
    triAngleWidth = triAngleHeight / Math.tan(angle * Math.PI / 180);
  }
  
  
  
  if(typeof layer != "undefined") { // очищаем память
    layer.destroy();
  }
  
  layer = new Konva.Layer({
    x: 40,
    y: 40
  });
  
  var angleBorder = new Konva.Line({
    points: [0,0, 0,triAngleHeight, triAngleWidth,0, 0,0],
    stroke: '#787878',
    strokeWidth: 2,
    closed : true,
    fill: '#00D2FF'
  })
  layer.add(angleBorder);
  
  var angleIcon = new Konva.Line({
    points: [0,0, 0,12, 12,12, 12,0, 0,0],
    stroke: '#787878',
    strokeWidth: 1,
    fill: '#00D2FF'
  })
  layer.add(angleIcon);
  
  var basisName = new Konva.Text({
    x: (triAngleWidth / 2),
    y: -5,
    text: basis,
    fontSize: 14
  });
  basisName.scaleY(-1);
  basisName.scaleX(-1);
  layer.add(basisName);
  
  
  hCat = Math.tan(angle * Math.PI / 180) * basis;
  var hCatName = new Konva.Text({
    x: -20,
    y: (triAngleHeight / 2),
    text: number_good_view(hCat, 2),
    fontSize: 14
  });
  hCatName.scaleY(-1);
  hCatName.scaleX(-1);
  hCatName.rotation(90);
  layer.add(hCatName);
  
  
  hypotenuse = basis / Math.cos(angle * Math.PI / 180);
  var hypotenuseName = new Konva.Text({
    x: (triAngleWidth / 2)+16,
    y: (triAngleHeight / 2)+16,
    text: number_good_view(hypotenuse, 2),
    fontSize: 14
  });
  hypotenuseName.scaleY(-1);
  hypotenuseName.scaleX(-1);
  hypotenuseName.rotation(-angle);
  layer.add(hypotenuseName);
  
  
  var angleName = new Konva.Text({
    x: (triAngleWidth)+16,
    y: 14,
    text: number_good_view(angle, 1) + " град.",
    fontSize: 14
  });
  angleName.scaleY(-1);
  angleName.scaleX(-1);
  angleName.rotation(-angle);
  layer.add(angleName);
  
  
  var percentName = new Konva.Text({
    x: triAngleWidth,
    y: -18,
    text: number_good_view(percent, 1)+" %",
    fontSize: 14
  });
  percentName.scaleY(-1);
  percentName.scaleX(-1);
  layer.add(percentName);
  

  stage.add(layer); 
   
}



var stage = new Konva.Stage({
    container: 'container',
    width: (300 + 80),
    height: (300 + 80),
    x: (300 + 80),
    y: (300 + 80),
});

var backgroundLayer = new Konva.Layer({
  
});

var ground = new Konva.Rect({ 
  width: stage.getWidth(),
  height: stage.getHeight(),
  fill: '#ecf0f5'
})
backgroundLayer.add(ground);

stage.scaleX(-1);
stage.scaleY(-1);
stage.add(backgroundLayer);







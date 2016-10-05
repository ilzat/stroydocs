
function drawVeter(Jan_S, Jan_SV, Jan_V, Jan_UV, Jan_U, Jan_UZ, Jan_Z, Jan_SZ, Jul_S, Jul_SV, Jul_V, Jul_UV, Jul_U, Jul_UZ, Jul_Z, Jul_SZ,city){
	
	$("#Jan_S").html(Jan_S);
	$("#Jan_SV").html(Jan_SV);
	$("#Jan_V").html(Jan_V);
	$("#Jan_UV").html(Jan_UV);
	$("#Jan_U").html(Jan_U);
	$("#Jan_UZ").html(Jan_UZ);
	$("#Jan_Z").html(Jan_Z);
	$("#Jan_SZ").html(Jan_SZ);
	$("#Jul_S").html(Jul_S);
	$("#Jul_SV").html(Jul_SV);
	$("#Jul_V").html(Jul_V);
	$("#Jul_UV").html(Jul_UV);
	$("#Jul_U").html(Jul_U);
	$("#Jul_UZ").html(Jul_UZ);
	$("#Jul_Z").html(Jul_Z);
	$("#Jul_SZ").html(Jul_SZ);
	$("#city_name").html(city);

document.getElementById('veter_jan_header').innerHTML = "Роза ветров. "+city+". Январь";
document.getElementById('veter_jul_header').innerHTML = "Роза ветров. "+city+". Июль";
document.getElementById('veter_jan_jul_header').innerHTML = "Роза ветров. "+city+". Январь. Июль";

///////////////////////////////////Jan//////////////////////////////////////////////
var canvas = document.getElementById("myCanvas");
if (canvas.getContext){
var context = canvas.getContext("2d");

//настройка
context.clearRect(0, 0, canvas.width, canvas.height);
var marginCanvas=20;
context.lineWidth=2;
context.strokeStyle="#6A6A6A";

//горизонт
context.beginPath();
context.moveTo(marginCanvas+0,marginCanvas+100);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+190,marginCanvas+94);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.lineTo(marginCanvas+190,marginCanvas+106);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+10,marginCanvas+94);        
context.lineTo(marginCanvas+0,marginCanvas+100);
context.lineTo(marginCanvas+10,marginCanvas+106);
context.stroke();
//вертикаль
context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+0);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+10);        
context.lineTo(marginCanvas+100,marginCanvas+0);
context.lineTo(marginCanvas+106,marginCanvas+10);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+190);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.lineTo(marginCanvas+106,marginCanvas+190);
context.stroke();
//косая 1
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+170);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+32);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.lineTo(marginCanvas+168,marginCanvas+41);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+159);        
context.lineTo(marginCanvas+29,marginCanvas+170);
context.lineTo(marginCanvas+41,marginCanvas+168);
context.stroke();
//косая 2
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+29);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+41);        
context.lineTo(marginCanvas+29,marginCanvas+29);
context.lineTo(marginCanvas+41,marginCanvas+32);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+168);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.lineTo(marginCanvas+168,marginCanvas+159);
context.stroke();

context.font = "italic bold 13pt Calibri";
context.textAlign="center";
context.fillText("С",marginCanvas+100,marginCanvas-7);
context.fillText("С-В",marginCanvas+176,marginCanvas+22);
context.fillText("В",marginCanvas+210,marginCanvas+105);
context.fillText("Ю-В",marginCanvas+177,marginCanvas+188);
context.fillText("Ю",marginCanvas+100,marginCanvas+215);
context.fillText("Ю-З",marginCanvas+23,marginCanvas+188);
context.fillText("З",marginCanvas-10,marginCanvas+105);
context.fillText("С-З",marginCanvas+23,marginCanvas+22);

//строим график за январь
context.strokeStyle="#0000FF"; //синий
Jan_max=Math.max(Jan_S, Jan_SV, Jan_V, Jan_UV, Jan_U, Jan_UZ, Jan_Z, Jan_SZ);
    //масштаб max 70
scale=70/Jan_max;
Jan_sc_S=Jan_S*scale;
Jan_sc_SV=Jan_SV*scale;
Jan_sc_V=Jan_V*scale;
Jan_sc_UV=Jan_UV*scale;
Jan_sc_U=Jan_U*scale;
Jan_sc_UZ=Jan_UZ*scale;
Jan_sc_Z=Jan_Z*scale;
Jan_sc_SZ=Jan_SZ*scale;
Sin45=Math.sin(Math.PI*45/180);

context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+100-Jan_sc_S);    //Jan_S    
context.lineTo(marginCanvas+100+Sin45*Jan_sc_SV,marginCanvas+100-Sin45*Jan_sc_SV);  //Jan_SV
context.lineTo(marginCanvas+100+Jan_sc_V,marginCanvas+100);  //Jan_V
context.lineTo(marginCanvas+100+Sin45*Jan_sc_UV,marginCanvas+100+Sin45*Jan_sc_UV);  //Jan_UV
context.lineTo(marginCanvas+100,marginCanvas+100+Jan_sc_U);  //Jan_U
context.lineTo(marginCanvas+100-Sin45*Jan_sc_UZ,marginCanvas+100+Sin45*Jan_sc_UZ);  //Jan_UZ
context.lineTo(marginCanvas+100-Jan_sc_Z,marginCanvas+100);  //Jan_Z
context.lineTo(marginCanvas+100-Sin45*Jan_sc_SZ,marginCanvas+100-Sin45*Jan_sc_SZ);  //Jan_SZ
context.closePath();
context.stroke();

context.font = "italic bold 8pt Calibri";
if (Jan_S/Jan_max>0.3){
    context.fillText(Jan_S,marginCanvas+100+9,marginCanvas+100-Jan_sc_S-9);
}
if (Jan_SV/Jan_max>0.35){
    context.fillText(Jan_SV,marginCanvas+100+Sin45*Jan_sc_SV+13,marginCanvas+100-Sin45*Jan_sc_SV+1);
}
if (Jan_V/Jan_max>0.35){
    context.fillText(Jan_V,marginCanvas+100+Jan_sc_V+9,marginCanvas+100+10);
}
if (Jan_UV/Jan_max>0.35){
    context.fillText(Jan_UV,marginCanvas+100+Sin45*Jan_sc_UV,marginCanvas+100+Sin45*Jan_sc_UV+15);
}
if (Jan_U/Jan_max>0.35){
    context.fillText(Jan_U,marginCanvas+100-11,marginCanvas+100+Jan_sc_U+17);
}
if (Jan_UZ/Jan_max>0.35){
    context.fillText(Jan_UZ,marginCanvas+100-Sin45*Jan_sc_UZ-17,marginCanvas+100+Sin45*Jan_sc_UZ+9);
}
if (Jan_Z/Jan_max>0.35){
    context.fillText(Jan_Z,marginCanvas+100-Jan_sc_Z-14,marginCanvas+100-4);
}
if (Jan_SZ/Jan_max>0.35){
    context.fillText(Jan_SZ,marginCanvas+100-Sin45*Jan_sc_SZ,marginCanvas+100-Sin45*Jan_sc_SZ-7);
}
//context.strokeRect(0, 0, canvas.width, canvas.height);

// save canvas image as data url (png format by default)
var dataURL = canvas.toDataURL();

// set canvasImg image src to dataURL
// so it can be saved as an image
document.getElementById('canvasImg').src = dataURL;
}
else {
alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
}
///////////////////////////////////Jul//////////////////////////////////////////////
var canvas = document.getElementById("myCanvas2");
if (canvas.getContext){
var context = canvas.getContext("2d");

//настройка
context.clearRect(0, 0, canvas.width, canvas.height);
var marginCanvas=20;
context.lineWidth=2;
context.strokeStyle="#6A6A6A";

//горизонт
context.beginPath();
context.moveTo(marginCanvas+0,marginCanvas+100);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+190,marginCanvas+94);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.lineTo(marginCanvas+190,marginCanvas+106);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+10,marginCanvas+94);        
context.lineTo(marginCanvas+0,marginCanvas+100);
context.lineTo(marginCanvas+10,marginCanvas+106);
context.stroke();
//вертикаль
context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+0);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+10);        
context.lineTo(marginCanvas+100,marginCanvas+0);
context.lineTo(marginCanvas+106,marginCanvas+10);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+190);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.lineTo(marginCanvas+106,marginCanvas+190);
context.stroke();
//косая 1
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+170);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+32);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.lineTo(marginCanvas+168,marginCanvas+41);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+159);        
context.lineTo(marginCanvas+29,marginCanvas+170);
context.lineTo(marginCanvas+41,marginCanvas+168);
context.stroke();
//косая 2
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+29);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+41);        
context.lineTo(marginCanvas+29,marginCanvas+29);
context.lineTo(marginCanvas+41,marginCanvas+32);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+168);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.lineTo(marginCanvas+168,marginCanvas+159);
context.stroke();

context.font = "italic bold 13pt Calibri";
context.textAlign="center";
context.fillText("С",marginCanvas+100,marginCanvas-7);
context.fillText("С-В",marginCanvas+176,marginCanvas+22);
context.fillText("В",marginCanvas+210,marginCanvas+105);
context.fillText("Ю-В",marginCanvas+177,marginCanvas+188);
context.fillText("Ю",marginCanvas+100,marginCanvas+215);
context.fillText("Ю-З",marginCanvas+23,marginCanvas+188);
context.fillText("З",marginCanvas-10,marginCanvas+105);
context.fillText("С-З",marginCanvas+23,marginCanvas+22);

//строим график за июль
context.strokeStyle="#FF0000"; //красный
Jul_max=Math.max(Jul_S, Jul_SV, Jul_V, Jul_UV, Jul_U, Jul_UZ, Jul_Z, Jul_SZ);
    //масштаб max 70
scale=70/Jul_max;
Jul_sc_S=Jul_S*scale;
Jul_sc_SV=Jul_SV*scale;
Jul_sc_V=Jul_V*scale;
Jul_sc_UV=Jul_UV*scale;
Jul_sc_U=Jul_U*scale;
Jul_sc_UZ=Jul_UZ*scale;
Jul_sc_Z=Jul_Z*scale;
Jul_sc_SZ=Jul_SZ*scale;
Sin45=Math.sin(Math.PI*45/180);

context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+100-Jul_sc_S);    //Jul_S    
context.lineTo(marginCanvas+100+Sin45*Jul_sc_SV,marginCanvas+100-Sin45*Jul_sc_SV);  //Jul_SV
context.lineTo(marginCanvas+100+Jul_sc_V,marginCanvas+100);  //Jul_V
context.lineTo(marginCanvas+100+Sin45*Jul_sc_UV,marginCanvas+100+Sin45*Jul_sc_UV);  //Jul_UV
context.lineTo(marginCanvas+100,marginCanvas+100+Jul_sc_U);  //Jul_U
context.lineTo(marginCanvas+100-Sin45*Jul_sc_UZ,marginCanvas+100+Sin45*Jul_sc_UZ);  //Jul_UZ
context.lineTo(marginCanvas+100-Jul_sc_Z,marginCanvas+100);  //Jul_Z
context.lineTo(marginCanvas+100-Sin45*Jul_sc_SZ,marginCanvas+100-Sin45*Jul_sc_SZ);  //Jul_SZ
context.closePath();
context.stroke();

context.font = "italic bold 8pt Calibri";
if (Jul_S/Jul_max>0.3){
    context.fillText(Jul_S,marginCanvas+100+9,marginCanvas+100-Jul_sc_S-9);
}
if (Jul_SV/Jul_max>0.35){
    context.fillText(Jul_SV,marginCanvas+100+Sin45*Jul_sc_SV+13,marginCanvas+100-Sin45*Jul_sc_SV+1);
}
if (Jul_V/Jul_max>0.35){
    context.fillText(Jul_V,marginCanvas+100+Jul_sc_V+9,marginCanvas+100+10);
}
if (Jul_UV/Jul_max>0.35){
    context.fillText(Jul_UV,marginCanvas+100+Sin45*Jul_sc_UV,marginCanvas+100+Sin45*Jul_sc_UV+15);
}
if (Jul_U/Jul_max>0.35){
    context.fillText(Jul_U,marginCanvas+100-11,marginCanvas+100+Jul_sc_U+17);
}
if (Jul_UZ/Jul_max>0.35){
    context.fillText(Jul_UZ,marginCanvas+100-Sin45*Jul_sc_UZ-17,marginCanvas+100+Sin45*Jul_sc_UZ+9);
}
if (Jul_Z/Jul_max>0.35){
    context.fillText(Jul_Z,marginCanvas+100-Jul_sc_Z-14,marginCanvas+100-4);
}
if (Jul_SZ/Jul_max>0.35){
    context.fillText(Jul_SZ,marginCanvas+100-Sin45*Jul_sc_SZ,marginCanvas+100-Sin45*Jul_sc_SZ-7);
}
//context.strokeRect(0, 0, canvas.width, canvas.height);

// save canvas image as data url (png format by default)
var dataURL = canvas.toDataURL();

// set canvasImg image src to dataURL
// so it can be saved as an image
document.getElementById('canvasImg2').src = dataURL;
}
else {
alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
}
///////////////////////////////////Jan//////////////////////////////////////////////
var canvas = document.getElementById("myCanvas3");
if (canvas.getContext){
var context = canvas.getContext("2d");

//настройка
context.clearRect(0, 0, canvas.width, canvas.height);
var marginCanvas=20;
context.lineWidth=2;
context.strokeStyle="#6A6A6A";

//горизонт
context.beginPath();
context.moveTo(marginCanvas+0,marginCanvas+100);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+190,marginCanvas+94);        
context.lineTo(marginCanvas+200,marginCanvas+100);
context.lineTo(marginCanvas+190,marginCanvas+106);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+10,marginCanvas+94);        
context.lineTo(marginCanvas+0,marginCanvas+100);
context.lineTo(marginCanvas+10,marginCanvas+106);
context.stroke();
//вертикаль
context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+0);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+10);        
context.lineTo(marginCanvas+100,marginCanvas+0);
context.lineTo(marginCanvas+106,marginCanvas+10);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+94,marginCanvas+190);        
context.lineTo(marginCanvas+100,marginCanvas+200);
context.lineTo(marginCanvas+106,marginCanvas+190);
context.stroke();
//косая 1
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+170);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+32);        
context.lineTo(marginCanvas+170,marginCanvas+29);
context.lineTo(marginCanvas+168,marginCanvas+41);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+159);        
context.lineTo(marginCanvas+29,marginCanvas+170);
context.lineTo(marginCanvas+41,marginCanvas+168);
context.stroke();
//косая 2
context.beginPath();
context.moveTo(marginCanvas+29,marginCanvas+29);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+32,marginCanvas+41);        
context.lineTo(marginCanvas+29,marginCanvas+29);
context.lineTo(marginCanvas+41,marginCanvas+32);
context.stroke();
context.beginPath();
context.moveTo(marginCanvas+159,marginCanvas+168);        
context.lineTo(marginCanvas+171,marginCanvas+171);
context.lineTo(marginCanvas+168,marginCanvas+159);
context.stroke();

context.font = "italic bold 13pt Calibri";
context.textAlign="center";
context.fillText("С",marginCanvas+100,marginCanvas-7);
context.fillText("С-В",marginCanvas+176,marginCanvas+22);
context.fillText("В",marginCanvas+210,marginCanvas+105);
context.fillText("Ю-В",marginCanvas+177,marginCanvas+188);
context.fillText("Ю",marginCanvas+100,marginCanvas+215);
context.fillText("Ю-З",marginCanvas+23,marginCanvas+188);
context.fillText("З",marginCanvas-10,marginCanvas+105);
context.fillText("С-З",marginCanvas+23,marginCanvas+22);

//строим график за январь
context.strokeStyle="#0000FF"; //синий
Jan_max=Math.max(Jan_S, Jan_SV, Jan_V, Jan_UV, Jan_U, Jan_UZ, Jan_Z, Jan_SZ);
    //масштаб max 70
scale=70/Jan_max;
Jan_sc_S=Jan_S*scale;
Jan_sc_SV=Jan_SV*scale;
Jan_sc_V=Jan_V*scale;
Jan_sc_UV=Jan_UV*scale;
Jan_sc_U=Jan_U*scale;
Jan_sc_UZ=Jan_UZ*scale;
Jan_sc_Z=Jan_Z*scale;
Jan_sc_SZ=Jan_SZ*scale;
Sin45=Math.sin(Math.PI*45/180);

context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+100-Jan_sc_S);    //Jan_S    
context.lineTo(marginCanvas+100+Sin45*Jan_sc_SV,marginCanvas+100-Sin45*Jan_sc_SV);  //Jan_SV
context.lineTo(marginCanvas+100+Jan_sc_V,marginCanvas+100);  //Jan_V
context.lineTo(marginCanvas+100+Sin45*Jan_sc_UV,marginCanvas+100+Sin45*Jan_sc_UV);  //Jan_UV
context.lineTo(marginCanvas+100,marginCanvas+100+Jan_sc_U);  //Jan_U
context.lineTo(marginCanvas+100-Sin45*Jan_sc_UZ,marginCanvas+100+Sin45*Jan_sc_UZ);  //Jan_UZ
context.lineTo(marginCanvas+100-Jan_sc_Z,marginCanvas+100);  //Jan_Z
context.lineTo(marginCanvas+100-Sin45*Jan_sc_SZ,marginCanvas+100-Sin45*Jan_sc_SZ);  //Jan_SZ
context.closePath();
context.stroke();


//строим график за июль
context.strokeStyle="#FF0000"; //красный
Jul_max=Math.max(Jul_S, Jul_SV, Jul_V, Jul_UV, Jul_U, Jul_UZ, Jul_Z, Jul_SZ);
    //масштаб max 70
scale=70/Jul_max;
Jul_sc_S=Jul_S*scale;
Jul_sc_SV=Jul_SV*scale;
Jul_sc_V=Jul_V*scale;
Jul_sc_UV=Jul_UV*scale;
Jul_sc_U=Jul_U*scale;
Jul_sc_UZ=Jul_UZ*scale;
Jul_sc_Z=Jul_Z*scale;
Jul_sc_SZ=Jul_SZ*scale;
Sin45=Math.sin(Math.PI*45/180);

context.beginPath();
context.moveTo(marginCanvas+100,marginCanvas+100-Jul_sc_S);    //Jul_S    
context.lineTo(marginCanvas+100+Sin45*Jul_sc_SV,marginCanvas+100-Sin45*Jul_sc_SV);  //Jul_SV
context.lineTo(marginCanvas+100+Jul_sc_V,marginCanvas+100);  //Jul_V
context.lineTo(marginCanvas+100+Sin45*Jul_sc_UV,marginCanvas+100+Sin45*Jul_sc_UV);  //Jul_UV
context.lineTo(marginCanvas+100,marginCanvas+100+Jul_sc_U);  //Jul_U
context.lineTo(marginCanvas+100-Sin45*Jul_sc_UZ,marginCanvas+100+Sin45*Jul_sc_UZ);  //Jul_UZ
context.lineTo(marginCanvas+100-Jul_sc_Z,marginCanvas+100);  //Jul_Z
context.lineTo(marginCanvas+100-Sin45*Jul_sc_SZ,marginCanvas+100-Sin45*Jul_sc_SZ);  //Jul_SZ
context.closePath();
context.stroke();

//context.strokeRect(0, 0, canvas.width, canvas.height);

// save canvas image as data url (png format by default)
var dataURL = canvas.toDataURL();

// set canvasImg image src to dataURL
// so it can be saved as an image
document.getElementById('canvasImg3').src = dataURL;
}
else {
alert ("Ваш браузер не потдерживает функцию отрисовки рисунков, обновите браузер.");
}
}

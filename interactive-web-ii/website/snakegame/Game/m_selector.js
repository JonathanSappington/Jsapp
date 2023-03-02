var selected = 0;

var fps = 20;
const perfectFrameTime = 1000 / fps;
let deltaTime = 0;
let lastTimestamp = 0;

var myreq;

function loadGame()
{
	reset();
	s_game.stop();
	s_game.initialize();
	initSnake();
	document.getElementById("title").innerHTML = "Snake";
}

function reset()
{
	window.cancelAnimationFrame(myreq);
	
	deltaTime = 0;
	lastTimestamp = 0;
	
	document.getElementById("frame").remove();

	var pla = document.createElement('div');
	var entity = document.createElement('div');
	var newParent = document.createElement('div');
	var frame = document.createElement('div');
	
	newParent.id = 'parent';
	pla.id = 'player';
	entity.id = 'entity';
	frame.id = "frame";
	
	document.getElementById("body").appendChild(frame);
	document.getElementById("frame").appendChild(pla);
	document.getElementById("frame").appendChild(entity);
	document.getElementById("frame").appendChild(newParent);
}
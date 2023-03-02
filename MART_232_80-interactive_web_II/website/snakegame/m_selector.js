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
	p_game.stop();
	b_game.stop();
	switch(selected){
		case 0:
			b_game.initialize();
			initBreakout();
			document.getElementById("title").innerHTML = "Breakout";
		break;
		case 1:
			s_game.initialize();
			initSnake();
			document.getElementById("title").innerHTML = "Snake";
		break;
		case 2:
			p_game.initialize();
			initPong();
			document.getElementById("title").innerHTML = "Pong";
		break;
	}
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

function prevGame()
{
	selected = selected > 0 ? selected -= 1 : 1;
	loadGame();
}

function nextGame()
{
	selected = selected < 2 ? selected += 1 : 0;
	loadGame();
}
function Pong()
{
	this.paddleY = 20;
	this.pongVec = [0,0];

	this.pongHeight = 5;

	this.paddleDir = 0;
	this.pongDir = [-1,0];

	this.player = document.getElementById("player");
	this.item = document.getElementById("entity");
	this.width = document.getElementById("frame").clientWidth;
	this.height = document.getElementById("frame").clientHeight;

	this.children = [];

	this.running = false;
	
	this.initialize = function(){
		this.paddleY = 20;
		this.paddleDir = 0;
		this.pongDir = [-1,0];
		
		this.running = true;
		
		this.player = document.getElementById("player");
		this.item = document.getElementById("entity");
		this.width = document.getElementById("frame").clientWidth;
		this.height = document.getElementById("frame").clientHeight;
		
		this.children = [];

		this.player.style.background = "#00000000";

		this.pongVec[0] = Math.floor(this.width / 2 / 10) * 10;
		this.pongVec[1] = Math.floor(this.height / 2 / 10) * 10;
		
		this.item.style.left = this.pongVec[0].toString() + "px";
		this.item.style.bottom = this.pongVec[1].toString() + "px";

		for(var i = 0; i < this.pongHeight; i++)
		{
			var newNode = document.createElement('div');
			if(i != this.pongHeight - 1)
				newNode.className = 'body';
			
			newNode.style.bottom = (this.paddleY + i * 10 - 10).toString() + "px";

			var newBody = this.player.appendChild(newNode);
			
			this.children.push(newBody);
		}
		
		this.gameloop(0);
	}
	
	this.stop = function(){
		this.running = false;
	}
	
	this.gameloop = function(timestamp)
	{
		deltaTime = (timestamp - lastTimestamp) / perfectFrameTime;
		lastTimestamp = timestamp;

		if(!isNaN(deltaTime)){
			paddle();
			
			ball();
		}
	}
}
var p_game = new Pong();

function initPong(timestamp)
{
	if(p_game.running){
		myreq = window.requestAnimationFrame(initPong);
	}
	
	p_game.gameloop(timestamp);
}

document.addEventListener("keydown",event)
document.addEventListener("keyup",key)
var prevKey = 0;

function event(e)
{
	if(e.keyCode == 87)
	{
		p_game.paddleDir = 1;
	}
	if(e.keyCode == 83)
	{
		p_game.paddleDir = -1;
	}
	
	prevKey = e.keyCode;
}

function key(k)
{
	if((k.keyCode == 87 || k.keyCode == 83) && k.keyCode == prevKey)
	{
		p_game.paddleDir = 0;
	}
}

function boxCollider(origin,target,boxWidth,boxHeight)
{
	var collider = {
		point1: [origin[0],origin[1]],
		point2: [origin[0] + boxWidth,origin[1] + boxHeight]
	};

	if(target[0] < collider.point2[0] &&
		target[1] < collider.point2[1] &&
		target[0] > collider.point1[0] &&
		target[1] > collider.point1[1])
		return true;
	
	return false;
}

function paddle()
{
	var speed = 10 * deltaTime;

	if(p_game.paddleY + parseInt(p_game.paddleDir) * speed < p_game.height - p_game.children.length * 10 && p_game.paddleDir > 0)
		p_game.paddleY += 1 * speed;
	else if(p_game.paddleY + parseInt(p_game.paddleDir) * speed > -10 && p_game.paddleDir < 0)
		p_game.paddleY -= 1 * speed;
	
	p_game.player.style.bottom = p_game.paddleY.toString() + "px";
	p_game.player.style.left = "10" + "px";
}

function ball()
{
	var speed = 10 * deltaTime;
	
	if(p_game.pongVec[0] + p_game.pongDir[0] < 0)
	{
		p_game.pongVec[0] = Math.floor(p_game.width / 2 / 10) * 10;
		p_game.pongVec[1] = Math.floor(p_game.height / 2 / 10) * 10;
	}
	if(p_game.pongVec[0] + p_game.pongDir[0] >= p_game.width - 10)
		p_game.pongDir[0] = -p_game.pongDir[0];

	if(p_game.pongVec[1] + p_game.pongDir[1] > p_game.height - 10 || p_game.pongVec[1] + p_game.pongDir[1] < 0)
	{
		p_game.pongDir[1] = -p_game.pongDir[1];
	}
	
	if(boxCollider([20,p_game.paddleY],p_game.pongVec,5,55))
	{
		if(p_game.paddleDir != 0)
			p_game.pongDir[1] = p_game.paddleDir;
		
		p_game.pongDir[0] = -p_game.pongDir[0];
	}
	
	if(boxCollider([10,p_game.paddleY],p_game.pongVec,5,55))
	{
		p_game.pongDir[1] = -p_game.pongDir[1];
	}

	p_game.pongVec[0] += p_game.pongDir[0] * speed;
	p_game.pongVec[1] += p_game.pongDir[1] * speed;
	
	p_game.item.style.left = p_game.pongVec[0].toString() + "px";
	p_game.item.style.bottom = p_game.pongVec[1].toString() + "px";
}

var selected = 0;

var fps = 20;
const perfectFrameTime = 1000 / fps;
let deltaTime = 0;
let lastTimestamp = 0;

var myreq;

function loadGame()
{
	reset();
	p_game.stop();
	p_game.initialize();
	initPong();
}

loadGame();

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
function Snake()
{
	this.bodies = [];
	this.vector2 = [0,0];
	this.itemVec2 = [100,0];
	this.add = 1;
	
	this.item = document.getElementById("entity");
	this.width = document.getElementById("frame").clientWidth;
	this.height = document.getElementById("frame").clientHeight;
	
	this.dir = [0,0];

	this.running = false;
	
	this.initialize = function(){
		this.running = true;
		
		this.bodies = [];
		this.vector2 = [0,0];
		this.itemVec2 = [100,0];
		this.add = 1;

		this.item = document.getElementById("entity");
		this.width = document.getElementById("frame").clientWidth;
		this.height = document.getElementById("frame").clientHeight;

		this.dir = [0,0];

		this.item.style.left = "0px";
		this.item.style.bottom = "0px";
	}
	
	this.stop = function(){
		this.running = false;
	}
	
	this.gameloop = function()
	{
		movement();
		apple();
	}
}

var s_game = new Snake();

function initSnake()
{
	if(s_game.running){
		setTimeout(() => {myreq = window.requestAnimationFrame(initSnake);}, 1000 / fps);
	}
	
	s_game.gameloop();
}

document.addEventListener("keydown",event)
function event(e)
{
	if(e.keyCode == 68 && s_game.dir[0] != -1)
	{
		s_game.dir = [1,0];
	}
	if(e.keyCode == 87 && s_game.dir[1] != -1)
	{
		s_game.dir = [0,1];
	}
	if(e.keyCode == 65 && s_game.dir[0] != 1)
	{
		s_game.dir = [-1,0];
	}
	if(e.keyCode == 83 && s_game.dir[1] != 1)
	{
		s_game.dir = [0,-1];
	}
}

function movement()
{
	var speed = 10;

	var player = document.getElementById("player");
	body(player);
	
	if(s_game.vector2[0] + parseInt(s_game.dir[0]) * speed >= s_game.width)
		s_game.vector2[0] = -10;
	else if(s_game.vector2[0] + parseInt(s_game.dir[0]) * speed < 0)
		s_game.vector2[0] = s_game.width;
		
	if(s_game.vector2[1] + parseInt(s_game.dir[1]) * speed >= s_game.height)
		s_game.vector2[1] = -10;
	else if(s_game.vector2[1] + parseInt(s_game.dir[1]) * speed < 0)
		s_game.vector2[1] = s_game.height;
	
	s_game.vector2[0] += parseInt(s_game.dir[0]) * speed;
	s_game.vector2[1] += parseInt(s_game.dir[1]) * speed;
	
	player.style.left = s_game.vector2[0].toString() + "px";
	player.style.bottom = s_game.vector2[1].toString() + "px";
	
	collide(player);
}

function body(head)
{		
	for (var i = s_game.bodies.length - 1; i >= 0; i--) 
	{
		s_game.bodies[i].style.left = i == 0 ? head.style.left : s_game.bodies[i - 1].style.left;
		s_game.bodies[i].style.bottom = i == 0 ? head.style.bottom : s_game.bodies[i - 1].style.bottom;
	}
}

function collide(head)
{		
	var parent = document.getElementById("parent");
	var isHit = false;

	for (var i = 0; i < s_game.bodies.length;i++) 
	{
		if(s_game.bodies[i].style.left == head.style.left && s_game.bodies[i].style.bottom == head.style.bottom)
		{
			isHit = true;
			break;
		}
	}
	
	if(isHit)
	{
		document.getElementById("parent").remove();
		
		s_game.bodies = [];
		
		s_game.vector2 = [0,0];

		var newNode = document.createElement('div');
		newNode.id = 'parent';
		
		document.getElementById("frame").appendChild(newNode);
		
		s_game.dir = [0,0];
	}
}

function apple()
{
	s_game.item.style.left = s_game.itemVec2[0].toString() + "px";
	s_game.item.style.bottom = s_game.itemVec2[1].toString() + "px";
	
	if(s_game.vector2[0] == s_game.itemVec2[0] && s_game.vector2[1] == s_game.itemVec2[1])
	{
		s_game.itemVec2[0] = Math.floor(Math.random() * s_game.width / 10) * 10;
		s_game.itemVec2[1] = Math.floor(Math.random() * s_game.height / 10) * 10;
		
		for(var i = 0; i < s_game.add; i++)
		{
			var newNode = document.createElement('div');
			newNode.className = 'body';
			
			var newBody = document.getElementById("parent").appendChild(newNode);
			
			s_game.bodies.push(newNode);
		}
	}
}

loadGame();
function Breakout()
{
	this.paddleX = 20;
	this.pongVec = [0,0];
	this.fps = 20;

	this.pongHeight = 5;
	this.bricks = [];
	this.brickPos = [];

	this.paddleDir = 0;
	this.pongDir = [0,-1];

	this.player = document.getElementById("player");
	this.item = document.getElementById("entity");
	this.width = document.getElementById("frame").clientWidth;
	this.height = document.getElementById("frame").clientHeight;

	this.children = [];

	this.running = false;
	
	this.info = function()
	{
		return this.paddleX + " " + this.pongVec + " " + this.fps
		+ " " + this.pongHeight + " " + this.bricks
		+ " " + this.brickPos + " " + this.paddleDir
		+ " " + this.pongDir + " " + this.player
		+ " " + this.item + " " + this.width 
		+ " " + this.height + " " + this.children + " " + this.running;
	}
	
	this.initialize = function(){
		this.paddleX = 20;
		this.paddleDir = 0;
		this.pongDir = [0,-1];
		
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
			
			newNode.style.left = (this.paddleX + i * 10 - 10).toString() + "px";

			var newBody = player.appendChild(newNode);
			
			this.children.push(newBody);
		}
		
		Brick();
	}
	
	this.stop = function(){
		this.running = false;
	}
	
	this.gameloop = function(timestamp)
	{
		deltaTime = (timestamp - lastTimestamp) / perfectFrameTime;
		lastTimestamp = timestamp;

		if(!isNaN(deltaTime)){
			bounce(this.paddleDir);
			brickCol();
			circle();
		}
	}
}

var b_game = new Breakout();

function initBreakout(timestamp)
{
	if(b_game.running){
		myreq = window.requestAnimationFrame(initBreakout);
	}
	
	b_game.gameloop(timestamp);
}

document.addEventListener("keydown",event)
document.addEventListener("keyup",key)
var prevKey = 0;

function event(e)
{
	if(e.keyCode == 68)
	{
		b_game.paddleDir = 1;
	}
	if(e.keyCode == 65)
	{
		b_game.paddleDir = -1;
	}
	
	prevKey = e.keyCode;
}

function key(k)
{
	if((k.keyCode == 68 || k.keyCode == 65) && k.keyCode == prevKey)
	{
		b_game.paddleDir = 0;
	}
}

function boxCollider(origin,target,boxWidth,boxHeight,debug)
{
	var collider = {
		point1: [origin[0],origin[1]],
		point2: [origin[0] + boxWidth,origin[1] + boxHeight]
	};
	
	if(debug == true)
	{
		var debug1 = document.getElementById("debug1");
		var debug2 = document.getElementById("debug2");
		
		debug1.style.left = collider.point2[0].toString() + "px";
		debug1.style.bottom = collider.point2[1].toString() + "px";
		debug2.style.left = collider.point1[0].toString() + "px";
		debug2.style.bottom = collider.point1[1].toString() + "px";
		
		// console.log("Bottom Left: " + collider.point1 + " Top Right: " + collider.point2 + " " + target);
		// console.log(target[0] > collider.point1[0]);
	}

	if(target[0] < collider.point2[0] &&
		target[1] < collider.point2[1] &&
		target[0] > collider.point1[0] &&
		target[1] > collider.point1[1])
		return true;
	
	return false;
}

function bounce(vec)
{
	var speed = 10 * deltaTime;

	if(b_game.paddleX + parseInt(vec) * speed < b_game.width - b_game.children.length * 10 && vec > 0)
		b_game.paddleX += 1 * speed;
	else if(b_game.paddleX + parseInt(vec) * speed > -10 && vec < 0)
		b_game.paddleX -= 1 * speed;
	
	b_game.player.style.left = b_game.paddleX.toString() + "px";
	b_game.player.style.bottom = "20" + "px";
}

function Brick()
{
	for(var x = 0; x < 8;x++)
	{
		for(var y = 0; y < b_game.width / 10 / 2;y++)
		{
			var brick = document.createElement('div');
			
			brick.id = 'brick' + (y + x * 8).toString();
			brick.className = 'brick';
			
			switch(x){
				case 0:
					brick.style.background = "red";
				break;
				case 1:
					brick.style.background = "red";
				break;
				case 2:
					brick.style.background = "orange";
				break;
				case 3:
					brick.style.background = "orange";
				break;
				case 4:
					brick.style.background = "green";
				break;
				case 5:
					brick.style.background = "green";
				break;
				case 6:
					brick.style.background = "yellow";
				break;
				case 7:
					brick.style.background = "yellow";
				break;
			}
			
			brick.style.left = (y * 20).toString() + "px";
			brick.style.bottom = (b_game.height - 20 - x * 10).toString() + "px";
			b_game.brickPos.push([y * 20,b_game.height - 20 - x * 10]);
			
			b_game.bricks.push(document.getElementById("frame").appendChild(brick));
		}
	}
}

function brickCol()
{
	var i = 0;
	b_game.bricks.forEach(element => {
	if(boxCollider(b_game.brickPos[i],b_game.pongVec,30,20,false))
		{
			element.remove();
			b_game.brickPos.splice(i,1);
			b_game.bricks.splice(i,1);
			b_game.pongDir[0] = b_game.pongDir[0];
			b_game.pongDir[1] = -b_game.pongDir[1];
		}
		i++;
	});
}

function circle()
{
	var speed = 10 * deltaTime;
	
	if(b_game.pongVec[1] + b_game.pongDir[1] < 0)
	{
		b_game.pongVec[0] = Math.floor(b_game.width / 2 / 10) * 10;
		b_game.pongVec[1] = Math.floor(b_game.height / 2 / 10) * 10;
	}
	if(b_game.pongVec[0] + b_game.pongDir[0] >= b_game.width - 10 || b_game.pongVec[0] + b_game.pongDir[0] < 0)
		b_game.pongDir[0] = -b_game.pongDir[0];

	if(b_game.pongVec[1] + b_game.pongDir[1] > b_game.height - 10)
	{
		b_game.pongDir[1] = -b_game.pongDir[1];
	}

	if(boxCollider([b_game.paddleX,20],b_game.pongVec,55,5,false))
	{
		if(b_game.paddleDir != 0)
			b_game.pongDir[0] = b_game.paddleDir;
		
		b_game.pongDir[1] = 1;
	}

	b_game.pongVec[0] += b_game.pongDir[0] * speed;
	b_game.pongVec[1] += b_game.pongDir[1] * speed;
	
	b_game.item.style.left = b_game.pongVec[0].toString() + "px";
	b_game.item.style.bottom = b_game.pongVec[1].toString() + "px";
}
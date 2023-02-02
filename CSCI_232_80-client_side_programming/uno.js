var players = [];
var starterCard;

class Card
{
	name;
	deck;

	constructor(name,deck)
	{
		self.name = name;
		self.deck = deck;
	}

	introduceSelf()
	{
		return self.name + " " + String(self.deck);
	}

	GetCards()
	{
		return self.deck;
	}
	
	DrawCards(num)
	{
		var colors = ["Red","Yellow","Blue","Green"];
		var extraCard = ["4+","W"];
		
		for(var i = 0; i < num;i++){
			if (Math.random() * 25 == 1)
				self.deck.push(extraCard[parseInt(Math.floor(Math.random() * extraCard.length))]);
			else
				self.deck.push(String(parseInt(Math.floor(Math.random() * 9)) + 1) + colors[parseInt(Math.floor(Math.random() * colors.length))]);
		}
	}

	PlayCards(card)
	{
		if (card == "4+")
		{
			players[order + 1 ? order < players.length - 1 : 0].DrawCards(4);
			self.deck.remove(card);
			discard = true;
			
			return color;
		}
		else if (card == "W")
		{
			discard = true;
			self.deck.remove(card);
			
			return color;
		}
		else if (starterCard.includes(card.substring(0,1)) || starterCard.includes(card.substring(1,card.length)))
		{
			alert("correct");
			self.deck.splice(card);

			return card;
		}
	}
}

function loadCards()
{
	var img = [];
	for (var i = 0; i < 4; i++)
	{
		players.push(new Card("Player " + String(i),[]));
		players[i].DrawCards(7);
		
		var player = document.createElement('div');
		
		player.id = "player" + String(i);
		document.getElementById('body').appendChild(player);
		
		for (var j = 0; j < players[0].GetCards().length; j++)
		{
			var btn = document.createElement('input');
			var choosen = players[i].GetCards()[j];
			
			btn.classList.add("cards");
			btn.type = "Button";
			btn.value = players[i].GetCards()[j].substring(0,1);
			btn.onclick = function(){players[i].PlayCards("9Yellow")};
			btn.setAttribute("style", "background-color: " + players[i].GetCards()[j].substring(1,players[i].GetCards()[j].length) + ";");
			
			document.getElementById('player' + String(i)).appendChild(btn);
		}
		document.getElementById("body").appendChild(document.createElement('br'));
	}

	var order = 0;

	var colors = ["Red","Yellow","Blue","Green"];
	starterCard = String(Math.floor(Math.random() * 9) + 1) + colors[parseInt(Math.floor(Math.random() * colors.length))];
}
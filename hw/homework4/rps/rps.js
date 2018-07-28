var imgPlayer;
var computerChoice;
var playerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	deselectAll();
}

function deselectAll()
{
	$("#btnPaper").css("background-color", "silver");
	$("#btnScissors").css("background-color", "silver");
	$("#btnRock").css("background-color", "silver");
}

function select(choice)
{
	playerChoice = choice;
	imgPlayer.src = "images/" + choice + ".png";
	deselectAll();
	
	if(choice=='rock') $("#btnRock").css("background-color", "#888888");
	else if(choice=='scissors') $("#btnScissors").css("background-color", "#888888");
	else if(choice=='paper') $("#btnPaper").css("background-color", "#888888");
	
	$("#btnGo").show();
}

function go()
{
	var numChoice = Math.floor(Math.random() * 3);
	var imgComputer = document.getElementById("imgComputer");

	$("#lblRock").css("background-color", "#EEEEEE");
	$("#lblPaper").css("background-color", "#EEEEEE");
	$("#lblScissors").css("background-color", "#EEEEEE");
	
	if(numChoice == 0)
	{
		computerChoice = 'rock';
		imgComputer.src = "images/rock.png";
		
		$("#lblRock").css("background-color", "yellow");
		
		if(playerChoice == 'rock')
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('Tie');
		}
		else if(playerChoice == 'paper') 
		{
			$("#txtEndTitle").html('Paper covers rock');
			$("#txtEndMessage").html('YOU WIN');
		}
		else if(playerChoice == 'scissors') 
		{
			$("#txtEndTitle").html('Rock smashes Scissors');
			$("#txtEndMessage").html('YOU LOSE');
		}
	}
	
	else if(numChoice == 1) 
	{
		computerChoice = 'paper';
		imgComputer.src = "images/paper.png";
		
		$("#lblPaper").css("background-color", "yellow");
		
		if(playerChoice == 'rock') 
		{
			$("#txtEndTitle").html('Paper covers rock');
			$("#txtEndMessage").html('YOU LOSE');
		}
		else if(playerChoice == 'paper') 
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('TIE');
		}
		else if(playerChoice == 'scissors') 
		{
			$("#txtEndTitle").html('Scissors cuts paper');
			$("#txtEndMessage").html('YOU WIN');
		}
	}
	
	else if(numChoice == 2)
	{
		computerChoice = 'scissors';
		imgComputer.src = "images/scissors.png";
		$("#lblScissors").css("background-color", "yellow");
		
		if(playerChoice == 'rock') 
		{
			$("#txtEndTitle").html('Rock smashes Scissors');
			$("#txtEndMessage").html('YOU WIN');
		}
		else if(playerChoice == 'paper') 
		{
			$("#txtEndTitle").html('Scissors cuts paper');
			$("#txtEndMessage").html('YOU LOSE');
		}
		else if(playerChoice == 'scissors') 
		{
			$("#txtEndTitle").html('');
			$("#txtEndMessage").html('TIE');
		}
	}

	$("#endScreen").show();
}

function startGame()
{
	$("#introScreen").hide();
}

function replay()
{
	$("#endScreen").hide();
	$("#btnGo").hide();
	
	deselectAll();
	
	$("#lblRock").css("background-color", "#EEEEEE");
	$("#lblPaper").css("background-color", "#EEEEEE");
	$("#lblScissors").css("background-color", "#EEEEEE");
	
	imgPlayer.src = 'images/question.png';
	document.getElementById('imgComputer').src = 'images/question.png';
}
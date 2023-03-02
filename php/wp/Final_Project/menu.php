<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<h1>The Turtle Store</h1>


<nav style="">
	<a href="index.php">Home</a>
	<a href="m_page1.php">Store</a>
	<?php 
		if(isset($_SESSION["LoginStatus"]) && $_SESSION["LoginStatus"] == true) 
		{
			echo('
				<a href="m_page2.php">News</a>
				<div class="Avatar"><div class="dropdown">
				  <button onclick="myFunction()" class="dropbtn"><div class="fas fa-user-alt ign_btn"></div></button>
				  <div id="myDropdown" class="dropdown-content">
					'."<a href='Account.php'>".$_SESSION["user_fname"]." ".$_SESSION["user_lname"]."</a>".'
					');
					if($_SESSION["admin_status"] == 1)
					echo('<a href="admin.php">Admin Page</a>');
					echo('<a href="logout.php">Logout</a>
				  </div>
				</div>
				</div>
			');
		}
		else
		{
			echo(
				'<div class="Avatar"><a href="sign_up.php">Sign-up</a></div>
				<div class="Avatar"><a href="login.php">Login</a></div>'
			);
		}
	?>
	<a href="contact.php">Contact</a>
	<a href="about.php">About</a>
</nav>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
</script>
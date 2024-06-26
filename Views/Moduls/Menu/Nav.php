<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
$Connection = new Connection();

$rol = $_SESSION["Access"];

?>


<?php if($rol == "Employee"){?>
<nav class="side-menu">
	<ul class="side-menu-list">
		<li class="blue-dirty with-sub">
			<span>
				<span class="glyphicon glyphicon-bullhorn"></span>
				<span class="lbl">Help</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/NewTicket.php'; ?>" target="pages"><span class="lbl">New Ticket</span></a></li>
			</ul>
		</li>
	</ul>
	<ul class="side-menu-list">
			<li class="purple with-sub">
					<span>
						<span class="glyphicon glyphicon-tags"></span>
						<span class="lbl">My Tickets</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsProgress.php'; ?>" target="pages"><span class="lbl">Tickets In Proccess</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsClosed.php'; ?>" target="pages"><span class="lbl">Tickets Closed</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsOpen.php'; ?>" target="pages"><span class="lbl">Tickets Open</span></a></li>
					</ul>
			</li>
	    </ul>

</nav><!--.side-menu-->
<?php } else if($rol == "Administrator") {?>
	<nav class="side-menu">
	<ul class="side-menu-list">
		<li class="blue-dirty with-sub">
			<span>
				<span class="glyphicon glyphicon-bullhorn"></span>
				<span class="lbl">Help</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/NewTicket.php'; ?>" target="pages"><span class="lbl">New Ticket</span></a></li>
			</ul>
		</li>
	</ul>
	<ul class="side-menu-list">
			<li class="purple with-sub">
					<span>
						<span class="glyphicon glyphicon-tags"></span>
						<span class="lbl">My Tickets</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsProgress.php'; ?>" target="pages"><span class="lbl">Tickets In Proccess</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsClosed.php'; ?>" target="pages"><span class="lbl">Tickets Closed</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsOpen.php'; ?>" target="pages"><span class="lbl">Tickets Open</span></a></li>
					</ul>
			</li>
	    </ul>
	<ul class="side-menu-list">
		<li class="green with-sub">
			<span>
			<i class="glyphicon glyphicon-tasks"></i>
				<span class="lbl">Administration</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/Users.php'; ?>" target="pages"><span class="lbl">Users</span></a></li>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/ViewTicket.php'; ?>" target="pages"><span class="lbl">View Tickets</span></a></li>
			</ul>

		</li>
	</ul>
	<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N1</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelOne.php'; ?>" target="pages"><span class="lbl">Tickets Level One</span></a></li>
					</ul>
			</li>
	    </ul>
		<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N2</span>
					</span>
					<ul>
					<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelTwo.php'; ?>" target="pages"><span class="lbl">Tickets Level Two</span></a></li>
					</ul>
			</li>
	    </ul>
		<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N3</span>
					</span>
					<ul>
					<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelThree.php'; ?>" target="pages"><span class="lbl">Tickets Level Three</span></a></li>
					</ul>
			</li>
	    </ul>
</nav><!--.side-menu-->
	<?php } else if ($rol == "Technical Lvl.1") { ?>
	<nav class="side-menu">
	<ul class="side-menu-list">
		<li class="blue-dirty with-sub">
			<span>
				<span class="glyphicon glyphicon-bullhorn"></span>
				<span class="lbl">Help</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/NewTicket.php'; ?>" target="pages"><span class="lbl">New Ticket</span></a></li>
			</ul>
		</li>
	</ul>  
	<ul class="side-menu-list">
			<li class="purple with-sub">
					<span>
						<span class="glyphicon glyphicon-tags"></span>
						<span class="lbl">My Tickets</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsProgress.php'; ?>" target="pages"><span class="lbl">Tickets In Proccess</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsClosed.php'; ?>" target="pages"><span class="lbl">Tickets Closed</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsOpen.php'; ?>" target="pages"><span class="lbl">Tickets Open</span></a></li>
					</ul>
			</li>
	    </ul>
	<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N1</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelOne.php'; ?>" target="pages"><span class="lbl">Tickets Level One</span></a></li>
					</ul>
			</li>
	    </ul>
</nav><!--.side-menu-->
	<?php } else if ($rol == "Technical Lvl.2") { ?>
	<nav class="side-menu">
	<ul class="side-menu-list">
		<li class="blue-dirty with-sub">
			<span>
				<span class="glyphicon glyphicon-bullhorn"></span>
				<span class="lbl">Help</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/NewTicket.php'; ?>" target="pages"><span class="lbl">New Ticket</span></a></li>
			</ul>
		</li>
	</ul>  
	<ul class="side-menu-list">
			<li class="purple with-sub">
					<span>
						<span class="glyphicon glyphicon-tags"></span>
						<span class="lbl">My Tickets</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsProgress.php'; ?>" target="pages"><span class="lbl">Tickets In Proccess</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsClosed.php'; ?>" target="pages"><span class="lbl">Tickets Closed</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsOpen.php'; ?>" target="pages"><span class="lbl">Tickets Open</span></a></li>
					</ul>
			</li>
	    </ul>
		<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N2</span>
					</span>
					<ul>
					<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelTwo.php'; ?>" target="pages"><span class="lbl">Tickets Level Two</span></a></li>
					</ul>
			</li>
	    </ul>
</nav><!--.side-menu-->
	<?php } else if ($rol == "Technical Lvl.3") { ?>
	<nav class="side-menu">
	<ul class="side-menu-list">
		<li class="blue-dirty with-sub">
			<span>
				<span class="glyphicon glyphicon-bullhorn"></span>
				<span class="lbl">Help</span>
			</span>
			<ul>
				<li><a href="<?php echo $Connection->Route() . 'Views/Forms/NewTicket.php'; ?>" target="pages"><span class="lbl">New Ticket</span></a></li>
			</ul>
		</li>
	</ul>  
	<ul class="side-menu-list">
			<li class="purple with-sub">
					<span>
						<span class="glyphicon glyphicon-tags"></span>
						<span class="lbl">My Tickets</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsProgress.php'; ?>" target="pages"><span class="lbl">Tickets In Proccess</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsClosed.php'; ?>" target="pages"><span class="lbl">Tickets Closed</span></a></li>
						<li><a href="<?php echo $Connection->Route().'Views/Forms/MyTicketsOpen.php'; ?>" target="pages"><span class="lbl">Tickets Open</span></a></li>
					</ul>
			</li>
	    </ul>
		<ul class="side-menu-list">
			<li class="red with-sub">
					<span>
						<span class="glyphicon glyphicon-wrench"></span>
						<span class="lbl">Technical support N3</span>
					</span>
					<ul>
					<li><a href="<?php echo $Connection->Route().'Views/Forms/ViewLevelThree.php'; ?>" target="pages"><span class="lbl">Tickets Level Three</span></a></li>
					</ul>
			</li>
	    </ul>
</nav><!--.side-menu-->
	<?php } ?>
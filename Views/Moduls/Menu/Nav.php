<?php 
	require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
	$Connection = new Connection();
?>

<nav class="side-menu">
	    <ul class="side-menu-list">
			<li class="green with-sub">
					<span>
						<i class="font-icon font-icon-widget"></i>
						<span class="lbl">Components</span>
					</span>
					<ul>
						<li><a href=""><span class="lbl">Widgets</span></a></li>
						<li><a href=""><span class="lbl">Bootstrap UI</span></a></li>
						<li><a href=""><span class="lbl">Date and Time Pickers</span></a></li>
					</ul>
			</li>
	    </ul>
		<ul class="side-menu-list">
			<li class="green with-sub">
					<span>
						<i class="font-icon font-icon-widget"></i>
						<span class="lbl">Administration</span>
					</span>
					<ul>
						<li><a href="<?php echo $Connection->Route().'Views/Moduls/Users/UsersView.php'; ?>"><span class="lbl">Users</span></a></li>
					</ul>
					
			</li>
	    </ul>
	
	    <section>
	        <header class="side-menu-title">Tags</header>
	        <ul class="side-menu-list">
	            <li>
	                <a href="#">
	                    <i class="tag-color grey-blue"></i>
	                    <span class="lbl">Bugs/Errors</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color red"></i>
	                    <span class="lbl">General Problem</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <i class="tag-color pink"></i>
	                    <span class="lbl">Questions</span>
	                </a>
	            </li>
	        </ul>
	    </section>
	</nav><!--.side-menu-->
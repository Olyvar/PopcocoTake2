<div class="sidebar">

	<ul id="sidebar">
		<?php 
	if ( dynamic_sidebar('sidebar') ) : 
	else : 
	?>
		 <li class="sidebarBox">
			 <h2>No Widgets</h2>
			 <p>You're not meant to see this text. Ever.</p>
			 </li>
		 </li>
		<?php endif; ?>
	</ul>

</div>
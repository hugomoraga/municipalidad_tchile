<div class="container p-0">
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="d-inline-flex fw-bold">
				<li class="nav-item">
					<a class="nav-brand" href="<?php echo home_url(); ?>">Inicio</a>
				</li>
                <li class="nav-item text-primary">&nbsp/</li>
                <li class="nav-item">
                <?php
                $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo '<a href="' . get_category_link($categories[0]->term_id) . '">' . $categories[0]->name . '</a>';
                    }
                ?>
                </li>
            </ul>
		</div>
	</nav>
</div>
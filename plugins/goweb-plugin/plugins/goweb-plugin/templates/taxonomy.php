<div class="wrap">
	<h1>Taxonomias</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="<?php echo !isset($_POST['edit_taxonomy']) ? 'active' : '' ?>">
		<a href="#tab-1">As suas taxonomias</a></li>
		<li class="<?php echo isset($_POST['edit_taxonomy']) ? 'active' : '' ?>">
		<a href="#tab-2">
		<?php echo isset($_POST['edit_taxonomy']) ? 'Editar' : 'Adicionar' ?> Taxonomias
		</a></li>
		<li><a href="#tab-3">Exportar</a></li>
	</ul>

	<div class="tab-content"> 
			<h3>Gerir Taxonomias</h3>
		<div id="tab-1" class="tab-pane <?php echo !isset($_POST['edit_taxonomy']) ? 'active' : '' ?>">
			<h3>Gerir Taxonomias</h3>

			<?php

				$options = get_option('goweb_plugin_tax') ?: array();

				echo '<table class="cpt-table"><tr><th>ID</th>
				<th>Singular Name</th>
				<th class="text-center">Hierarchical</th>
				<th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$hierarchical = isset($option['hierarchical']) ? "Verdadeiro" : "Falso";

					echo "<tr><td>{$option['taxonomy']}</td>
					<td>{$option['singular_name']}</td>
					<td class=\"text-center\">{$hierarchical}</td>
					<td class=\"text-center\">";

					echo '<form method="post" action="" class="inline-block">';
						echo '<input type="hidden" name="edit_taxonomy" value="' . $option['taxonomy'] . '">';
						submit_button('Editar', 'primary small', 'submit', false);
	
					echo '</form> ';

					echo '<form method="post" action="options.php" class="inline-block">';
					settings_fields( 'goweb_plugin_tax_settings' );
					
					echo '<input type="hidden" name="remove" value="' . $option['taxonomy'] . '">';

					submit_button('Apagar', 'delete small', 'submit', false, array(
						'onlick' => 'return confirm("Deseja apagar? Os dados serão eliminados.");'
					));

					echo '</form></td></tr>';
				}
				echo '</table>'
			?>
		</div>

		<div id="tab-2" class="tab-pane <?php echo isset($_POST['edit_taxonomy']) ? 'active' : '' ?>">
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'goweb_plugin_tax_settings' );
					do_settings_sections( 'goweb_taxonomy' );
					submit_button();
				?>
			</form>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>Exporte as suas taxonomias</h3>

		</div>
	</div>
</div>
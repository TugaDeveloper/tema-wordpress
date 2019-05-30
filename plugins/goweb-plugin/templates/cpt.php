<div class="wrap">
	<h1>Posts Personalizados</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Os seus posts personalizados</a></li>
		<li><a href="#tab-2">Adicionar Post Personalizado</a></li>
		<li><a href="#tab-3">Exportar</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<h3>Gerir os seus posts personalizados</h3>

			<?php
				/*if (! get_option('goweb_plugin_cpt')){
					$options = array();
				} else{
					$options = get_option('goweb_plugin_cpt');
				}*/

				//$options = ! get_option('goweb_plugin_cpt') ? array() : get_option('goweb_plugin_cpt');

				$options = get_option('goweb_plugin_cpt') ?: array();

				echo '<table class="cpt-table"><tr>
				<th>ID</th><th>Singular Name</th>
				<th>Plural Name</th>
				<th class="text-center">Public</th>
				<th class="text-center">Archive</th>
				<th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$public = isset($option['public']) ? "VERDADEIRO" : "FALSO";
					$archive = isset($option['has_archive']) ? "VERDADEIRO" : "FALSO";

					echo "<tr><td>{$option['post_type']}</td>
					<td>{$option['singular_name']}</td>
					<td>{$option['plural_name']}</td>
					<td class=\"text-center\">{$public}</td>
					<td class=\"text-center\">{$archive}</td>
					<td class=\"text-center\">
					<a href=\"#\">EDIT</a> ";

					echo '<form method="post" action="options.php" class="inline-block">';
					settings_fields( 'goweb_plugin_cpt_settings' );
					
					echo '<input type="hidden" name="remove" value="' . $option['post_type'] . '">';

					submit_button('Apagar', 'delete small', 'submit', false, array(
						'onlick' => 'return confirm("Deseja apagar? Os dados serão eliminados.");'
					));

					echo '</form></td></tr>';
				}
				echo '</table>'
			?>
		</div>

		<div id="tab-2" class="tab-pane">
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'goweb_plugin_cpt_settings' );
					do_settings_sections( 'goweb_cpt' );
					submit_button();
				?>
			</form>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>Exporte os seus posts personalizados</h3>
		</div>
	</div>
</div>
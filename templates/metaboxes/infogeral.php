<?php
$data_inicio    = ! empty( $event_data['data_inicio'] ) ? $event_data['data_inicio'] : '';
$data_fim       = ! empty( $event_data['data_fim'] ) ? $event_data['data_fim'] : '';
$tipo_evento    = ! empty( $event_data['tipo_evento'] ) ? $event_data['tipo_evento'] : '';
$local          = ! empty( $event_data['local'] ) ? $event_data['local'] : '';
$cta_texto      = ! empty( $event_data['cta_texto'] ) ? $event_data['cta_texto'] : '';
$exibir_na_home = isset( $event_data['exibir_na_home'] ) ? $event_data['exibir_na_home'] : '';
?>

<div id="info_geral">

<table id='info_geral_table'>
	<tbody>

		<tr>
			<td>Datas</td>
			<td>
				De <input type="date" name="evento_data_data_inicio" value="<?php echo $data_inicio; ?>" />
				a <input type="date" name="evento_data_data_fim" value="<?php echo $data_fim; ?>" />
			</td>
		</tr>

		<tr>
			<td>Tipo do Evento</td>
			<td>
				<select value="tipo_evento" name="evento_data_tipo_evento">
					<option value="presencial" <?php echo $tipo_evento === 'presencial' ? 'selected' : ''; ?>>Presencial</option>
					<option value="online_ao_vivo" <?php echo $tipo_evento === 'online_ao_vivo' ? 'selected' : ''; ?>>Online - Ao vivo</option>
					<option value="online_gravado" <?php echo $tipo_evento === 'online_gravado' ? 'selected' : ''; ?>>Online - Gravado</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Pausar Inscrições</td>
			<td><input type="button" class="button button-primary button-large" value="Pausar inscrições" /></td>
		</tr>

		<tr>
			<td>Local / Endereço</td>
			<td><input type="text" name="evento_data_local" value="<?php echo $local; ?>" /></td>
		</tr>

		<tr>
			<td>Exibir na home</td>
			<?php $checked = $exibir_na_home == '0' ? '' : 'checked'; ?>
			<td><input type="checkbox" name="evento_data_exibir_na_home" <?php echo $checked; ?> /></td>
		</tr>

		<tr>
			<td>Chamada do link (CTA)</td>
			<td><input type="text" name="evento_data_cta_texto" value="<?php echo $cta_texto; ?>" /></td>
		</tr>

	</tbody>
</table>

</div>

<?php 
// print_r( '<pre>'); 
// print_r( $event_data );
// print_r( '</pre>');
?>

<div id="eventos_ingressos">

	<table id='ingressos_table'>
		<theader>
			<tr>
				<th class="centralized">#</th>
				<th>Título do ingresso</th>
				<th>Quantidade</th>
				<th>Preço</th>
				<th>Disponível entre</th>
				<th class="centralized">Excluir</th>
			</tr>
		</theader>
		<tbody id="ingressos_container">
			<tr class="ingresso_tr ingresso_model">
				<td><input type="text" class='ingresso_id' name="evento_data_ingressos_id[]" value="0" disabled /></td>
				<td><input type="text" class="titulo" name="evento_data_ingressos_titulo[]" /></td>
				<td><input type="number" class="qtd" name="evento_data_ingressos_qtd[]" value="0" min="0" /></td>
				<td>
					<label class="moeda" for="ingresso_preco">R$</label><input type="text" class="preco" name="evento_data_ingressos_preco[]" />
				</td>
				<td>
					<input type="date" name="evento_data_ingressos_inicio[]" class="ingresso_data_inicio" />
					<input type="date" name="evento_data_ingressos_fim[]" class="ingresso_data_fim" />
				</td>
				<td class="centralized"><input type="button" class="remover_ingresso button button-primary" value="X" data-id="X" /></td>
			</tr>
			<?php
			if ( ! empty( $event_data['ingressos'] ) ) {
				foreach ( $event_data['ingressos'] as $index => $ingresso ) {
					?>
					<tr class="ingresso_tr">
						<td><input type="text" class='ingresso_id' name="evento_data_ingressos_id[]" value="<?php echo $ingresso['id']; ?>" data-id="<?php echo $ingresso['id']; ?>" disabled /></td>
						<td><input type="text" class="titulo" name="evento_data_ingressos_titulo[]" value="<?php echo $ingresso['titulo']; ?>" /></td>
						<td><input type="number" class="qtd" name="evento_data_ingressos_qtd[]" min="0" value="<?php echo $ingresso['qtd']; ?>" /></td>
						<td>
							<label class="moeda" for="ingresso_preco">R$</label><input type="text" class="preco" name="evento_data_ingressos_preco[]" value="<?php echo $ingresso['preco']; ?>" />
						</td>
						<td>
							<input type="date" name="evento_data_ingressos_inicio[]" class="ingresso_data_inicio" value="<?php echo $ingresso['inicio']; ?>" />
							<input type="date" name="evento_data_ingressos_fim[]" class="ingresso_data_fim" value="<?php echo $ingresso['fim']; ?>" />
						</td>
						<td class="centralized"><input type="button" class="remover_ingresso button button-primary" value="X" data-id="X" /></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>

</div>

<input id="adicionar_ingresso" type="button" class="button button-primary button-large" value="Adicionar ingresso" />

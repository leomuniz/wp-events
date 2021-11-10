<div id="eventos_descontos">

	<table id='descontos_table'>
		<theader>
			<tr>
				<th>Quantidade</th>
				<th>Ingresso</th>
				<th></th>
				<th>Tipo</th>
				<th>Desconto</th>
				<th class="centralized">Excluir</th>
			</tr>
		</theader>
		<tbody id="descontos_container">
			<tr class="desconto_tr desconto_model">
				<td>
					<input type="number" class="qtd" name="evento_data_descontos_qtd[]" value="0" min="0" />
					<input type="checkbox" name="evento_data_descontos_oumais[]" value="0" /> (ou mais) de 
				</td>
				<td>
					<select class='desconto_ingressos' name="evento_data_descontos_ingresso[]">
						<option value="qualquer">Qualquer ingresso</option>
						<?php
							if ( ! empty( $event_data['ingressos'] ) ) {
								foreach( $event_data['ingressos'] as $ind => $ingresso ) { 
									$ingresso['titulo'] = empty( $ingresso['titulo'] ) ? '&lt;Ingresso sem título&gt;' : $ingresso['titulo']; ?>
									<option class="option_ingresso_<?php echo $ingresso['id'] ?>" value="<?php echo $ingresso['id'] ?>">
										#<?php echo $ingresso['id'] ?> - <?php echo $ingresso['titulo'] ?>
									</option>";
								<?php } ?>
						<?php } ?>
					</select>
				</td>
				<td> &nbsp;&nbsp;aplicar&nbsp;&nbsp; </td>
				<td>
					<select class="tipo_desconto" name="evento_data_descontos_tipo[]">
						<option value="percentual">Percentual</option>
						<option value="absoluto">Absoluto</option>
					</select>
				</td>
				<td>
					<div class="desconto_percentual">
						<input type="number" class="desconto_percentual" name="evento_data_descontos_percentual[]" value="0" min="0" /><label class="porcento" for="desconto">%</label>
					</div>
					<div class="desconto_absoluto">
						<label class="moeda" for="desconto">R$</label><input type="text" class="desconto_absoluto" name="evento_data_descontos_absoluto[]" />
					</div>
				</td>
				<td class="centralized"><input type="button" class="remover_desconto button button-primary" value="X" data-id="X" /></td>
			</tr>

			<?php
			if ( ! empty( $event_data['descontos'] ) ) {
					foreach( $event_data['descontos'] as $ind => $desconto ) { ?>
						<tr class="desconto_tr">
							<td>
								<input type="number" class="qtd" name="evento_data_descontos_qtd[]" value="<?php echo $desconto['qtd'];?>" min="0" />
								<input type="checkbox" name="evento_data_descontos_oumais[]" value="0" <?php if ( $desconto['oumais'] == '1' ) echo 'checked="checked"'; ?>/> (ou mais) de 
							</td>
							<td>
								<select class='desconto_ingressos' name="evento_data_descontos_ingresso[]">
									<option value="qualquer">Qualquer ingresso</option>
									<?php
										if ( ! empty( $event_data['ingressos'] ) ) {
											foreach( $event_data['ingressos'] as $ind => $ingresso ) { 
												$ingresso['titulo'] = empty( $ingresso['titulo'] ) ? '&lt;Ingresso sem título&gt;' : $ingresso['titulo']; 
												$selected           = $ingresso['id'] == $desconto['ingresso'] ? 'selected' : '';
												?>
												<option class="option_ingresso_<?php echo $ingresso['id'] ?>" value="<?php echo $ingresso['id'] ?>" <?php echo $selected; ?>>
													#<?php echo $ingresso['id'] ?> - <?php echo $ingresso['titulo'] ?>
												</option>";
											<?php } ?>
									<?php } ?>
								</select>
							</td>
							<td> &nbsp;&nbsp;aplicar&nbsp;&nbsp; </td>
							<td>
								<select class="tipo_desconto" name="evento_data_descontos_tipo[]">
									<option value="percentual" <?php if ( $desconto['tipo'] === 'percentual' ) echo 'selected'; ?>>Percentual</option>
									<option value="absoluto" <?php if ( $desconto['tipo'] === 'absoluto' ) echo 'selected'; ?>>Absoluto</option>
								</select>
							</td>
							<td>
								<div class="desconto_percentual">
									<input type="number" class="desconto_percentual" name="evento_data_descontos_percentual[]" value="<?php echo $desconto['percentual'];?>" min="0" /><label class="porcento" for="desconto">%</label>
								</div>
								<div class="desconto_absoluto">
									<label class="moeda" for="desconto">R$</label><input type="text" class="desconto_absoluto" name="evento_data_descontos_absoluto[]" value="<?php echo $desconto['absoluto'];?>" />
								</div>
							</td>
							<td class="centralized"><input type="button" class="remover_desconto button button-primary" value="X" data-id="X" /></td>
						</tr>

				<?php }
			} ?>
		</tbody>
	</table>

</div>

<input id="adicionar_desconto" type="button" class="button button-primary button-large" value="Adicionar desconto" />

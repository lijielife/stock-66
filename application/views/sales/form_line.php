                <tr>
                  <td class="col-md-2"><input name="code[]" list="codes" autocomplete="off" class="form-control code" type="text" placeholder="C&oacute;digo"></td>
                  <td class="col-md-5"><p class="form-control-static item_description">. . .</p></td>
                  <td class="col-md-1"><p class="form-control-static item_price">...</p></td>
                  <td class="col-md-1"><input name="quantity[]" type="number" min="1" class="form-control quantity" value="1"></td>
                  <td class="col-md-1"><p class="form-control-static item_total">...</p></td>
                  <td class="col-md-2">
                  	<button type="button" class="btn btn-primary btn-block btn_add_item"><?php echo $this->lang->line('add')?></button>
                  	<button type="button" class="btn btn-danger btn-block hide btn_remove_item"><?php echo $this->lang->line('remove')?></button>
                  	<input type="hidden" name="products_id[]" class="item_id" />
              	  </td>
                </tr>
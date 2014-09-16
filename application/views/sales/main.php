            <div class="col-md-10 col-md-offset-1 well">  
	            <p class="lead"><?php echo $today_date?> / <?php echo $this->lang->line('sale_number')?>: <?php echo $sale_number?></p>

		            <form action="<?php echo site_url('sales/process')?>" class="sales_form">
			            <table class="table col-md-12 table_sale">

			                <?php $this->load->view('sales/form_line')?>

			            </table>

			            <table class="table col-md-12">
			                <tr>
			                  <td class="col-md-2"><p class="form-control-static"><?php echo $this->lang->line('payment_type')?>:</p></td>
			                  <td class="col-md-5"><?php echo form_dropdown('salespaymenttypes_id', $payment_types, NULL, ' class="form-control"')?></td>
			                  <td class="col-md-1"></td>
			                  <td class="col-md-2"><button type="button" class="btn btn-success btn-block disabled sales_submit"><?php echo $this->lang->line('confirm')?></button></td>
			                  <td class="col-md-2" colspan="2"><button class="btn btn-danger btn-block disabled"><?php echo $this->lang->line('cancel')?> </button></td>

			                </tr>
			            </table>

			            <datalist id="codes">
			            	<!-- FILLED WITH JS -->
						</datalist>
		            </form>

            </div>
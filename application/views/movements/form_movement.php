
<form class="form-horizontal" role="form" action="<?php echo site_url('movements/process')?>" method="POST">
  <input type="hidden" name="id" value="-1"/>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Tipo:</label>
    <div class="col-sm-10">
    	<?php echo form_dropdown('movementstypes_id', $combo_movementstypes, NULL, 'class="form-control"')?>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Producto</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('products_id', $combo_products, NULL, 'class="form-control" id="products_id"')?>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Cantidad</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="0">                    
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="comment" placeholder="Ingrese un comentario sobre la operaci&oacute;n (opcional)"></textarea>                 
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      <button class="btn btn-success products_new_btn_confirm"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
    </div>
  </div>
</form>
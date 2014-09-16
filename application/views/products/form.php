<form class="form-horizontal" role="form" action="<?php echo site_url('products/process')?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $product->id?>"/>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">C&oacute;digo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="code" name="code" value="<?php echo $product->code?>">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Descripci&oacute;n</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" name="description" value="<?php echo $product->description?>">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Categor&iacute;a</label>
    <div class="col-sm-10">
      <?php echo form_dropdown('categories_id', $dropdown_categories, $product->categories_id,'class="form-control" id="categories_id"')?>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Precio</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="price" name="price" value="<?php echo $product->price?>">                    
    </div>
  </div>
  <?php if($product->id == -1):?>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Stock</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product->stock?>">                    
    </div>
  </div>
  <?php endif?>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      <button class="btn btn-success products_new_btn_confirm"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
    </div>
  </div>
</form>
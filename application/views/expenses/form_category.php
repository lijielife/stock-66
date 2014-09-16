
<form class="form-inline" role="form" action="<?php echo site_url('categories/process')?>" method="POST">
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo pr($category->id, -1)?>"?>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la categor&iacute;a" value="<?php echo pr($category->name)?>">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default"><?php echo $form_btn_submit_text?></button>
  </div>
</form>
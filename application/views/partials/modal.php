        <!-- Modal -->
        <div class="modal fade" id="<?php echo $modal_id?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal_id?>_label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="<?php echo $modal_id?>_label"><?php echo $modal_title?></h4>
              </div>
              <div class="modal-body">
                <?php echo $modal_content?>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
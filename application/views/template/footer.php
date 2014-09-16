          </div>
        </div>
      </div>
      
    </div>

	<!-- General Modal used in all site. Content updated by ajax-->
	<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title"></h4>
	      </div>
	      <div class="modal-body">
	      	<!-- MODAL CONTENT HERE -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary hide">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

  <?php foreach($scripts as $script):?>
    <script src="<?php echo $script?>"></script>
	<?php endforeach?>
  </body>
</html>
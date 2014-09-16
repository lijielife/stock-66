              <div class="col-md-10 col-md-offset-1 well">
                <div class="row">
                <div class="col-xs-3 lead">
                  Movimientos por d&iacute;a 
                </div>
                <div class="col-xs-3">
                  <input type="date" class="form-control" id="movements_date" value="<?php echo $date?>"/>
                </div>
                <button 
                  class="btn btn-success toggle_modal_movements"
                  data-id="-1">
                  <span class="glyphicon glyphicon-plus"></span> Nuevo Movimiento</button>
                </div>

                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Tipo</th>
                      <th>Art&iacute;culo</th>
                      <th>Comentario</th>
                      <th>Cantidad</th>
                      <th>Precio unitario</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($movements as $movement): ?>
                    <tr>
                      <td><?php echo $movement->stamp?></td>
                      <td><?php echo $movement->movementstypes->name?></td>
                      <td><?php echo $movement->products->code?></td>
                      <td><?php echo $movement->comment?></td>
                      <td><?php echo $movement->quantity?></td>
                      <td><?php echo $movement->unitprice?></td>
                      <td><?php echo $movement->quantity * $movement->quantity?></td>
                    </tr>
                    <?php endforeach?>
                  </tbody>
                </table>
              </div>
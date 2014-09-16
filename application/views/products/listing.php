                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>C&oacute;digo</th>
                      <th>Descripci&oacute;n</th>
                      <th>Stock</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($products as $product):?>
                    <tr>
                      <td><?php echo $product->code?></td>
                      <td><?php echo $product->description?></td>
                      <td><?php echo $product->stock?></td>
                      <td><?php echo $product->price?></td>
                      <td class="col-md-3">
                        <button 
                          class="btn btn-info btn-sm toggle_modal_products"
                          data-id="<?php echo $product->id?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Editar
                        </button>
                        <a href="#" class="btn btn-default btn-sm">Movimientos</a>
                      </td>
                    </tr>
                    <?php endforeach?>
                  </tbody>
                </table>

                <?php echo $this->pagination->create_links()?>

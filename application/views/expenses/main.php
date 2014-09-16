              <div class="col-md-10 col-md-offset-1 well">
                <p class="lead">Categor&iacute;as
                <button 
                  class="btn btn-success btn-sm toggle_modal_categories"
                  data-id="-1">
                  <span class="glyphicon glyphicon-plus"></span> Agregar Nuevo Gasto</button>
                </p>

                <table class="table col-md-12">
                  <thead>
                    <th>Total</th>
                    <th>Descripci&oacute;n</th>
                    <th>Acciones</th>
                  </thead>
                  <tbody>
                  <?php foreach ($expenses as $expense) :?>
                    <tr>
                      <td class="col-md-2"><span class="">$ <?php echo $expense->amount?></span></td>
                      <td class="col-md-6"><span class=""><?php echo $expense->comment?></span></td>
                      <td class="col-md-2">
                        <button 
                          class="btn btn-info btn-sm toggle_modal_categories"
                          data-id="<?php echo $expense->id?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Editar
                        </button>
                      </td>
                    </tr>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
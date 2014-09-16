              <div class="col-md-10 col-md-offset-1 well">
                <p class="lead">Categor&iacute;as
                <button 
                  class="btn btn-success btn-sm toggle_modal_categories"
                  data-id="-1">
                  <span class="glyphicon glyphicon-plus"></span> Agregar Nueva Categoría</button>
                </p>

                <table class="table col-md-12">
                  <thead>
                    <th>C&oacute;digo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </thead>
                  <tbody>
                  <?php foreach ($categories as $category) :?>
                    <tr>
                      <td class="col-md-2"><span class=""><?php echo $category->id?></span></td>
                      <td class="col-md-6"><span class=""><?php echo $category->name?></span></td>
                      <td class="col-md-2">
                        <button 
                          class="btn btn-info btn-sm toggle_modal_categories"
                          data-id="<?php echo $category->id?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Editar
                        </button>
                      </td>
                    </tr>
                  <?php endforeach?>
                  </tbody>
                </table>
              </div>
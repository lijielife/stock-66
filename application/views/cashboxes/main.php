              <div class="col-md-10 col-md-offset-1 well">
                <p class="lead">Caja del d&iacute;a <?php echo $date?></p>

                <table class="table margin-top">
                  <tbody>
                    <tr>
                      <td>Ventas del d&iacute;a en efectivo (<?php echo $cash->salescount?>)</td>
                      <td>$ <?php echo $cash->salestotal?></td>
                    </tr>
                    <tr>
                      <td>Gastos del d&iacute;a (<?php echo $expenses->count?>)</td>
                      <td>$ <?php echo $expenses->total?></td>
                    </tr>
                  </tbody>
                    <tr>
                      <td>Total Caja</td>
                      <td>$ <?php echo $cash->salestotal - $expenses->total?></td>
                    </tr>
                  <tfoot>
                    <tr>

                    </tr>
                  </tfoot>
                </table>

                <table class="table margin-top">
                  <tbody>
                    <tr>
                      <td>Ventas del d&iacute;a con tarjeta de cr&eacute;dito (<?php echo $card->salescount?>)</td>
                      <td>$ <?php echo $card->salestotal?></td>
                    </tr>
                  </tbody>
                </table>

              </div>
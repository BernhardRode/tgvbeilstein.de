<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
  $fields = get_fields();
?>

  <section class="satzung">
    <h5 class="center-align">Satzung &amp; Ordnungen</h5>
    <div class="row">
      <?php if ($fields['satzung'] && sizeof($fields['satzung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["satzung"]);
                tgv_render_file($fields["satzung"], "Satzung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($fields['finanzordnung'] && sizeof($fields['finanzordnung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["finanzordnung"]);
                tgv_render_file($fields["finanzordnung"], "Finanzordnung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($fields['beitragsordnung'] && sizeof($fields['beitragsordnung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["beitragsordnung"]);
                tgv_render_file($fields["beitragsordnung"], "Beitragsordnung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($fields['ehrenordnung'] && sizeof($fields['ehrenordnung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["ehrenordnung"]);
                tgv_render_file($fields["ehrenordnung"], "Ehrenordnung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($fields['jugendordnung'] && sizeof($fields['jugendordnung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["jugendordnung"]);
                tgv_render_file($fields["jugendordnung"], "Jugendordnung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($fields['benutzungsordnung'] && sizeof($fields['benutzungsordnung']) > 0: ?>
        <div class="col s2">
          <div class="card">
            <div class="card-content">
              <?php 
                tgv_extend_file($fields["benutzungsordnung"]);
                tgv_render_file($fields["benutzungsordnung"], "Benutzungsordnung");
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>  
    </div>
  </section>

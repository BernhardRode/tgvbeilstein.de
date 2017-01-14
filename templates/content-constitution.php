<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
  $fields = get_fields();
?>

<?php if (
  $fields['satzung'] && sizeof($fields['satzung']) > 0 &&
  $fields['geschaeftsordnung'] && sizeof($fields['geschaeftsordnung']) > 0 &&
  $fields['finanzordnung'] && sizeof($fields['finanzordnung']) > 0 &&
  $fields['beitragsordnung'] && sizeof($fields['beitragsordnung']) > 0 &&
  $fields['ehrenordnung'] && sizeof($fields['ehrenordnung']) > 0 &&
  $fields['benutzungsordnung'] && sizeof($fields['benutzungsordnung']) > 0 ):
?>
  <section class="satzung">
    <h5 class="center-align">Satzung &amp; Ordnungen</h5>
    <div class="row">
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
      <div class="col s2">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_file($fields["geschaeftsordnung"]);
              tgv_render_file($fields["geschaeftsordnung"], "Geschäftsordnung");
            ?>
          </div>
        </div>
      </div>
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
    </div>
  </section>
<?php else: ?>
  <section class="satzung">
    <h5 class="center-align">Satzung &amp; Ordnungen</h5>
    <div class="row">
      <div class="col s12">
        Ihalt kann nicht angezeigt werden. Bitte alle Dokumente einpflegen.
      </div>    
    </div>
  </section>
<?php endif; ?>
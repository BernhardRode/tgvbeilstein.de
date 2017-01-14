<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
  $fields = get_fields();
?>

<?php if (
  $fields['1vorstand'] && sizeof($fields['1vorstand']) > 0 &&
  $fields['2vorstand'] && sizeof($fields['2vorstand']) > 0 &&
  $fields['3vorstand'] && sizeof($fields['3vorstand']) > 0 ):
?>
  <section class="vorstand">
    <h5 class="center-align">Vorstand</h5>
    <div class="row">
      <div class="col s4">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["1vorstand"]);
              tgv_render_person($fields["1vorstand"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col s4">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["2vorstand"]);
              tgv_render_person($fields["2vorstand"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col s4">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["3vorstand"]);
              tgv_render_person($fields["3vorstand"]);
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (
  $fields['hauptkassierer'] && sizeof($fields['hauptkassierer']) > 0 &&
  $fields['schriftfuehrer'] && sizeof($fields['schriftfuehrer']) > 0 && 
  $fields['technischerleiter'] && sizeof($fields['technischerleiter']) > 0 &&
  $fields['jugendeiter'] && sizeof($fields['jugendeiter']) > 0 ):
?>
  <section class="vorstand">
    <h5 class="center-align">Erweiterter Vorstand</h5>
    <div class="row">
      <div class="col s3">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["hauptkassierer"]);
              tgv_render_person($fields["hauptkassierer"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["schriftfuehrer"]);
              tgv_render_person($fields["schriftfuehrer"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["technischerleiter"]);
              tgv_render_person($fields["technischerleiter"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col s3">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["jugendeiter"]);
              tgv_render_person($fields["jugendeiter"]);
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
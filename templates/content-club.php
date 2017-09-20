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
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["1vorstand"]);
              tgv_render_person($fields["1vorstand"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["2vorstand"]);
              tgv_render_person($fields["2vorstand"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col l4 s12">
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
      <div class="col l3 s6">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["hauptkassierer"]);
              tgv_render_person($fields["hauptkassierer"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col l3 s6">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["schriftfuehrer"]);
              tgv_render_person($fields["schriftfuehrer"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col l3 s6">
        <div class="card">
          <div class="card-content">
            <?php 
              tgv_extend_person($fields["technischerleiter"]);
              tgv_render_person($fields["technischerleiter"]);
            ?>
          </div>
        </div>
      </div>
      <div class="col l3 s6">
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

<?
  if (strlen(get_the_content()) > 0):
?>
  <section class="content">
    <h5 class="center-align">Informationen</h5>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
<?
  endif;
?>

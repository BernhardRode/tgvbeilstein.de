<?php
  require dirname(__FILE__) . '/../lib/helpers.php';
  $fields = get_fields();
?>

<section class="open-times">
  <h5 class="center-align">&Ouml;ffnungszeiten &amp; Kontakt</h5>
  <div class="row">
    <div class="col s6">
      <div class="card">
        <div class="collection">
          <?php
            foreach($fields['offnungszeiten'] as $zeit) {
              ?>
                <div class="collection-item">
                  <?php echo $zeit['tag']; ?><span class="badge"><?php echo $zeit['von']; ?> - <?php echo $zeit['bis']; ?></span>
                </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
    <div class="col s6">
      <div class="card">
        <div class="collection">
          <div class="collection-item">
            Telefon<span class="badge"><a href="tel:+4970625753">+49 (0)7062 5753</a></span>
          </div>
          <div class="collection-item">
            E-Mail<span class="badge"><a href="mailto:info@tgveintrachtbeilstein.de">info@tgveintrachtbeilstein.de</a></span>
          </div>
          <div class="collection-item">
            Fax<span class="badge">+49 (0)7062 916736</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ($fields['mitarbeiter'] && sizeof($fields['mitarbeiter']) > 0):?>
  <section class="mitarbeiter">
    <h5 class="center-align">Mitarbeiter</h5>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <ul>
              <?php
                foreach($fields['mitarbeiter'] as $person) {
                  ?>
                    <li>
                      <?php
                        tgv_extend_person($person);
                        tgv_render_person($person);
                      ?>
                    </li>
                  <?php
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

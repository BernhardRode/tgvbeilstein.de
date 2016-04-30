  <?php
    function get_data($url) {
      if ( false === ( $special_query_results = get_transient( md5($url) ) ) ) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $special_query_results = json_decode($result, true);
        set_transient( md5($url), $special_query_results, 60 * 60);
      }
      return $special_query_results;
    }

    function tgv_extract_beilstein_artikel($response) {
      $special_query_results = array();

      if (
          ( isset($response['extractorData']) && isset($response['extractorData']['resourceId']) ) &&
          false === ( $special_query_results = get_transient( md5($response['extractorData']['resourceId']) ) )
      ) {
        $resourceId = $response['extractorData']['resourceId'];
        $data = $response['extractorData']['data'];
        $special_query_results = array();
        foreach ($data as $extract) {
          foreach ($extract as $group) {
            foreach ($group as $item) {
              $special_query_results[] = (object) array(
                'excerpt' => $item['TEASERTEXT DESCRIPTION'][0]['text'],
                'title' => $item['WRAP LINK'][0]['text'],
                'permalink' => $item['WRAP LINK'][0]['href'],
                'thumbnail' => $item['IMAGE'][0]['src']
              );
            }
          }
        }
        set_transient( md5($response['extractorData']['resourceId']), $special_query_results, 60 * 60);
      }
      return $special_query_results;
    }

    function tgv_extract_beilstein_termine($response) {
      if ( false === ( $special_query_results = get_transient( md5($response['extractorData']['resourceId']) ) ) ) {
        $resourceId = $response['extractorData']['resourceId'];
        $data = $response['extractorData']['data'];
        $special_query_results = array();
        foreach ($data as $extract) {
          foreach ($extract as $group) {
            foreach ($group as $item) {
              $datum = '';
              if (isset($item['DATUM VALUE'])) {
                $datum = $item['DATUM VALUE'][0]['text'];
              };
              $ort = '';
              if (isset($item['DATUM VALUE'])) {
                $ort = $item['DATUM VALUE'][0]['text'];
              };
              $special_query_results[] = (object) array(
                'excerpt' => $item['TITEL LINK'][0]['text'],
                'title' => $item['DETAILS DESCRIPTION'][0]['text'],
                'permalink' => $item['DETAILS LINK'][0]['href'],
                'thumbnail' => $item['IMAGE'][0]['src'],
                'datum' => $datum,
                'ort' => $ort,
              );
            }
          }
        }
        set_transient( md5($response['extractorData']['resourceId']), $special_query_results, 60 * 60);
      }
      return $special_query_results;
    }
  ?>
  <div class="beilstein">
    <div class="headline" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/stadt.beilstein.ansicht.jpg);">
      <div class="container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wappen_beilstein_wuerttemberg.png" width="128" height="128" title="Stadt Beilstein">
        <h1>Stadt Beilstein</h1>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="columns">
          <div>
            <h2>Neuigkeiten</h2>
            <?php
              $url = 'https://extraction.import.io/query/runtime/f4c8b673-2442-4919-9d89-2d059abf7fcc?_apikey=17d150194a4d439daf49c6bd91104143bc73e368583b9bced4e45a0f1ee8165fca2e6ef409f1a7e903551545d89e39059d9108727085f2eda608e831614010d1904ba47d5a3f26b52096275c47706f65&url=http%3A%2F%2Fwww.beilstein.de%2Findex.php%3Fid%3D11';
              $data = get_data($url);
              $neuigkeiten = tgv_extract_beilstein_artikel($data);
            ?>
            <ul>
              <?php
                foreach ($neuigkeiten as $item):
              ?>
                <li><a href="<?php echo $item->permalink; ?>" target="_blank"><?php echo $item->title; ?></a></li>
              <?php
                endforeach;
              ?>
            </ul>
          </div>
          <div>
            <h2>Termine</h2>
            <?php
              $url = 'https://extraction.import.io/query/runtime/e21497ec-12ae-4578-b67a-4e638652776b?_apikey=17d150194a4d439daf49c6bd91104143bc73e368583b9bced4e45a0f1ee8165fca2e6ef409f1a7e903551545d89e39059d9108727085f2eda608e831614010d1904ba47d5a3f26b52096275c47706f65&url=http%3A%2F%2Fwww.beilstein.de%2Findex.php%3Fid%3D14%26L%3D0';
              $data = get_data($url);
              $termine = tgv_extract_beilstein_termine($data);
            ?>
            <ul>
              <?php
                foreach ($termine as $item):
              ?>
                <li><a href="<?php echo $item->permalink; ?>" target="_blank"><?php echo $item->title; ?></a></li>
              <?php
                endforeach;
              ?>
            </ul>
          </div>
          <div>
             <h2>Gemeinderat</h2>
            <?php
              $url = 'https://extraction.import.io/query/runtime/b6919e42-cfbc-4e93-88ac-95d54ed2e1b7?_apikey=17d150194a4d439daf49c6bd91104143bc73e368583b9bced4e45a0f1ee8165fca2e6ef409f1a7e903551545d89e39059d9108727085f2eda608e831614010d1904ba47d5a3f26b52096275c47706f65&url=http%3A%2F%2Fwww.beilstein.de%2Findex.php%3Fid%3D62';
              $data = get_data($url);
              $gemeinderat = tgv_extract_beilstein_artikel($data);
            ?>
            <ul>
              <?php
                foreach ($gemeinderat as $item):
              ?>
                <li><a href="<?php echo $item->permalink; ?>" target="_blank"><?php echo $item->title; ?></a></li>
              <?php
                endforeach;
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

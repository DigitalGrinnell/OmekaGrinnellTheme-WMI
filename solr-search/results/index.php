<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>


<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search')));?>


<h1><?php echo __('Search the Collection'); ?></h1>


<!-- Search form. -->
<div class="solr">
  <form id="solr-search-form">
    <input type="submit" value="Search" />
    <span class="float-wrap">
      <input type="text" title="<?php echo __('Search keywords') ?>" name="q" value="<?php if ((isset($_GET['q'])) && ($_GET['q'] !='*')) : echo $_GET['q']; endif;?>" />
    </span>
  </form>
</div>


<!-- Applied facets. -->
<?php if (SolrSearch_Helpers_Facet::parseFacets()) : ?>
<div id="solr-applied-facets">

  <ul>

    <!-- Get the applied facets. -->
    
    <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f): ?>
      <li>

        <!-- Facet label. -->
        <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
        <span class="applied-facet-label"><?php echo $label; ?></span> >
        <span class="applied-facet-value"><?php echo $f[1]; ?></span>

        <!-- Remove link. -->
        <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
        (<a href="<?php echo $url; ?>">remove</a>)

      </li>
    <?php endforeach; ?>
  
  </ul>

</div>
<?php endif; ?>

<!-- Facets. -->
<div id="solr-facets">

  <h2><?php echo __('Limit your search'); ?></h2>

  <?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>

    <!-- Does the facet have any hits? -->
    <?php if (count(get_object_vars($facets))): ?>

      <!-- Facet label. -->
      <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
      <strong><?php echo $label; ?></strong>

      <ul>
        <!-- Facets. -->
        <?php foreach ($facets as $value => $count): ?>
          <li class="<?php echo $value; ?>">

            <!-- Facet URL. -->
            <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

            <!-- Facet link. -->
            <a href="<?php echo $url; ?>" class="facet-value">
              <?php echo $value; ?>
            </a>

            <!-- Facet count. -->
            (<span class="facet-count"><?php echo $count; ?></span>)

          </li>
        <?php endforeach; ?>
      </ul>

    <?php endif; ?>

  <?php endforeach; ?>
</div>


<!-- Results. -->
<div id="solr-results">

  <!-- Number found. -->
  <h2 id="num-found">
    <?php echo $results->response->numFound; ?> results
  </h2>

  <?php $c=0; foreach ($results->response->docs as $doc):
    $url = SolrSearch_Helpers_View::getDocumentUrl($doc); 
    $imgHtml = SolrSearch_Helpers_View::getDocumentImg($doc, 'square_thumbnail');
    if ($c==0): echo '<div class="row solr-results-row">'; endif;
    echo '<div class="result col-md-3 col-sm-6 text-center">';
    echo '<a href="'.$url.'">'.$imgHtml.'</a><br />';
      $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                if (empty($title)) {
                    $title = '<i>' . __('Untitled') . '</i>';
                }
    echo '<a href="'.$url.'">'.$title.'</a>';
    echo '</div>';
    if ($c==3): echo '</div>'; $c=0; else: $c++; endif;
  endforeach;
  if ($c<=3): echo '</div>'; endif;
  ?>

      <!-- Highlighting. -->
      <?php if (get_option('solr_search_hl')): ?>
        <ul class="hl">
          <?php foreach($results->highlighting->{$doc->id} as $field): ?>
            <?php foreach($field as $hl): ?>
              <li class="snippet"><?php echo strip_tags($hl, '<em>'); ?></li>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
  
  </div>
  <?php echo pagination_links(); ?>

</div>



<?php echo foot();
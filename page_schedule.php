<?php
/* Template Name: Schedule */
get_header();
$sched_json = file_get_contents('https://marconi.smokeradio.co.uk/api/schedule.php');
$sched = json_decode($sched_json, true);
?>
    <div class="page_content">
      <h2 class="page_title"><?php the_title() ?></h2>
      <hr>
      <?php
        if ($sched['success']) {
          echo $sched['html'];
        } else {
          echo "<p>The schedule isn't available at the moment, but it'll be back up soon!</p>";
        }
      ?>
    </div>
</article>
<?php get_footer(); ?>

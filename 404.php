<?php

$json = file_get_contents('https://opentdb.com/api.php?amount=1');
$trivia = json_decode($json)->results[0];

$possible_answers = $trivia->incorrect_answers;
$possible_answers[] = $trivia->correct_answer;

if (sizeof($possible_answers) > 2) {
  sort($possible_answers, SORT_STRING);
}

get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 blog-main">
        <h1><?php _e( 'The page you requested cannot be found', 'chester' ); ?></h1>
        <p class="lead">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. You may also not be authorised to view the page.</p>
        <hr>

        <!-- Trivia Section Woo -->
        <aside class="cell">
          <h2 class="h4 mb-0">Trivia</h2>
          <p class="small text-muted mb-2"><?=$trivia->category?></p>
          <p class="mb-0"><span class="mono">Q: </span><strong><?=$trivia->question?></strong></p>
          <? if (sizeof($possible_answers) > 2) { ?>
          <ol class="list-unstyled">
          <? for ($i = 0; $i < sizeof($possible_answers); $i++) { ?>
            <li><span class="mono">&nbsp;&nbsp;&nbsp;</span><?=$possible_answers[$i]?></li>
          <? } ?>
          </ol>
          <? } ?>
          <p class="mb-0"><span class="mono">A: </span><em><?=$trivia->correct_answer?></em></p>
        </aside>
        <!-- Trivia API by opentdb.com -->

      	<hr>
        <p>Please try the following:</p>
        <ul>
          <li>Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</li>
          <li>If you reached this page by clicking a link, contact the Web site administrator to alert them that the link is incorrectly formatted.</li>
          <li>Click the <a href="javascript:history.back(1)">Back</a> button to try another link.</li>
        </ul>
        <p>HTTP Error 404 - File or directory not found.</p>
        <hr>
        <h2>Try searching for what you're looking for instead</h2>
        <?php get_search_form(); ?>
        <p class="mt-2">Contact our <a href="mailto:support@chesterlestreetasc.co.uk" title="Support Hotline">support address</a> if the issue persists.</p>
      </div><!-- /.blog-main -->
    </div>
  </div>
<?php get_footer(); ?>

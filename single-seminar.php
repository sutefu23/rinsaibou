<?php
get_header();
the_post();
the_content();
?>
<div>開始日時: <?= SCF::get('start_at') ?></div>
<div>終了日時: <?= SCF::get('end_at') ?></div>
<?php
get_footer();

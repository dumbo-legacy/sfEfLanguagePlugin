<?php include_stylesheets_for_form($form) ?>
<div id="translation">
  <form id="paolang" action="<?php echo url_for('@change_language') ?>" method="POST">
    <?php echo $form['_csrf_token'] ?>
    <?php echo $form['language'] ?>
  </form>
</div>


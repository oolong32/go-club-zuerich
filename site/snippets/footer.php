  <footer>
    <hr>
   <p><a class="unstyled-link" href="/<?= t('ppSlug')?>"><?= t('privacyPolicy')?></a></p>
  </footer>
</body>

<?# JS-Scripts: Array of Filenames without ending #?>

<?php if (isset($js)) : ?>
  <?php foreach ($js as $script) : ?>
    <?= js('assets/js/' . $script . '.js') ?>
  <?php endforeach ?>
<?php endif ?>

</html>
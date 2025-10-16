<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

<?php require 'partials/banner.php'?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <a class="mb-5 text-blue-500 underline" href="/notes">
            back to notes
          </a>
          <p class="mt-5"> <?php echo $note['body'] ?> </p>
  </div>
</main>
<?php require 'partials/footer.php'?>
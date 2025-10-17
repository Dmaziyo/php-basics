<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

<?php require 'partials/banner.php'?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?php foreach ($notes as $note): ?>
        <li>
          <a class="text-blue-500 underline" href="/note?id=<?php echo $note['id'] ?>">
          <?php echo $note['body'] ?>
          </a>
        </li>
        <?php endforeach; ?>
        <a href="/notes/create" class="inline-block mt-5 p-1 hover:cursor-pointer bg-gray-200 rounded">
          Create
        </a>
  </div>
</main>
<?php require 'partials/footer.php'?>
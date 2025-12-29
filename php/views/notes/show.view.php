<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <p><?= htmlspecialchars($note['body']) ?></p>
    <p class="mt-6">
      <a href="/notes" class="text-red-800 underline">go back...</a>
    </p>
  <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
    <button class="text-sm text-red-500 rounded-lg border border-red-500 px-3 py-1 bg-red-100">Delete</button>
  </form>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>

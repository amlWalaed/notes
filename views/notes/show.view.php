<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
    <main class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?= htmlspecialchars($note['body']) ?>
        </div>
        <footer class="flex justify-end gap-x-3 items-center">
            <a href="note/edit?id=<?=$note['id']?>" class="rounded-md bg-green-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Edit</a>
            <form method="POST">
                <input type="hidden" name="__method" value="DELETE"/>
                <input type="hidden" name="id" value="<?php echo $note['id']; ?>" />
                <button class="rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">delete</button>
            </form>
        </footer>
    </main>
    <?php base_path('views/partials/footer.php'); ?>
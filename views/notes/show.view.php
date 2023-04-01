<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?= htmlspecialchars($note['body']) ?>
        </div>
        <footer>
            <a href="note/edit?id=<?=$note['id']?>">Edit</a>
            <form method="POST">
                <input type="hidden" name="__method" value="DELETE"/>
                <input type="hidden" name="id" value="<?php echo $note['id']; ?>" />
                <button class="text-red-400 text-sm">delete</button>
            </form>
        </footer>
    </main>
    <?php base_path('views/partials/footer.php'); ?>
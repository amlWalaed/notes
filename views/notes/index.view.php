<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note):?>
                    <li><a href="/note?id=<?=$note['id']?>" class="hover:underline text-blue-500">- <?= htmlspecialchars($note['body'])?></a></li>
                <?php endforeach;?>
                    <li class="mt-5 ml-5"><a href="/note/create" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Note </a></li>
            </ul>
        </div>
    </main>
    <?php base_path('views/partials/footer.php'); ?>
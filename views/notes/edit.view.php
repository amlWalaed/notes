<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="/note" method="POST">
            <input type="hidden" value="PATCH" name="__method" />
            <input type="hidden" value="<?= $note['id'] ?>" name="id" />
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Descriptions</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                                    <?= $note['body'] ?? '' ?>
                                </textarea>
                        </div>
                        <?php if ($errors) : ?>
                            <span><?= $errors['body'] ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </div>
</main>
<?php base_path('views/partials/footer.php'); ?>
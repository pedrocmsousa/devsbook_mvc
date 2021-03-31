<?= $render('header', [
    'loggedUser' => $loggedUser,
]) ?>
<section class="container main">
    <?= $render('sidebar') ?>
    <section class="feed mt-10">
        <div class="row">
            <div class="column pr-5">
                <h1>Página não encontrada, verifique o link digitado e tente de novo</h1>
            </div>
            <div class="column side pl-5">
                <?= $render('right-side'); ?>
            </div>
        </div>
    </section>
</section>




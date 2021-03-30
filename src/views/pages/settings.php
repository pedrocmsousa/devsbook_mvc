<?= $render('header', [
    'loggedUser' => $loggedUser,
    'user' => $user,
    'flash' => $flash
]) ?>
<section class="container main">
    <?= $render('sidebar', [
        'activeMenu' => 'settings'
    ]); ?>
    <section class="feed mt-10">
        <div class="row">
            <div class="column pr-5">
                <h1>Configurações</h1>
                <form class="form-config" method="POST" enctype="multipart/form-data" action="<?= $base; ?>/settings">
                    <label>
                        Novo Avatar
                        <input class="file" type="file" name="avatar" /><br/>
                        <img class="image-edit" src="<?= $base; ?>/media/avatars/<?= $user->avatar ?>" alt="">
                    </label>
                    <label>
                        Nova Capa
                        <input class="file" type="file" name="cover" /><br/>
                        <img class="image-edit" src="<?= $base; ?>/media/covers/<?= $user->cover ?>" alt="">
                    </label>
                    
                    <div class="hr"></div>
                    <?php if (!empty($flash)) : ?>
                        <div class="flash"><?php echo $flash; ?></div>
                    <?php endif; ?>

                    <input placeholder="<?= $user->id ?>" type="hidden" name="id" />

                    <label>
                        Nome Completo:
                        <input class="input" type="text" value="<?= $user->name ?>" name="name" />
                    </label>

                    <label>
                        Data de nascimento:
                        <input class="input" type="text" name="birthdate" value="<?=date('d/m/Y', strtotime($user->birthdate));?>" />
                    </label>

                    <label>
                        E-mail:
                        <input class="input" type="email" name="email" value="<?=$user->email;?>" />
                    </label>

                    <label>
                        Cidade:
                        <input class="input" type="text" name="city" value="<?=$user->city;?>" />
                    </label>

                    <label>
                        Trabalho:
                        <input class="input" type="text" name="work" value="<?=$user->work;?>" />
                    </label>
        
                    <div class="hr"></div>

                    <label>
                        Nova Senha:
                        <input class="input" type="password" name="password" />
                    </label>

                    <label>
                        Confirmar Nova Senha:
                        <input class="input" type="password" name="password_confirm" />
                    </label>
                    <div class="hr"></div>
                    <input class="button" type="submit" value="Salvar" />
                </form>
            </div>
            <div class="column side pl-5">
                <?= $render('right-side'); ?>
            </div>
        </div>
    </section>
</section>
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('birthdate'), {
            mask: '00/00/0000'
        }
    );
</script>
<?= $render('footer'); ?>
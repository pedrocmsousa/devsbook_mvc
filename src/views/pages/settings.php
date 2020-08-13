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
                <form class="form-config" method="POST" action="<?= $base; ?>/settings">
                    <label>Novo Avatar</label>
                    <input class="file" type="file" name="avatar" />
                    <label>Nova Capa</label>
                    <input class="file" type="file" name="cover" />
                    <div class="hr"></div>
                    <?php if (!empty($flash)) : ?>
                        <div class="flash"><?php echo $flash; ?></div>
                    <?php endif; ?>

                    <input placeholder="<?= $user->id ?>" type="hidden" name="id" />

                    <label>Nome Completo:</label>
                    <input class="input" placeholder="<?= $user->name ?>" type="text" name="name" />
                    <label>Data de Nascimento:</label>
                    <input class="input" id="birthdate" placeholder="<?= date(
                        'd/m/Y',
                        strtotime($user->birthdate)
                    ); ?>" type="text" name="birthdate" />
                    <label>E-mail:</label>
                    <input class="input" placeholder="<?= $user->email ?>" type="email" name="email" />
                    <?php if (($user->city) != "") : ?>
                        <label>Cidade:</label>
                        <input class="input" placeholder="<?= $user->city ?>" type="text" name="city" />
                    <?php else : ?>
                        <label>Cidade:</label>
                        <input class="input" placeholder="Qual a sua cidade?" placeholder="<?= $user->city ?>" 
                        type="text" name="city" />
                    <?php endif; ?>

                    <?php if (($user->work) != "") : ?>
                        <label>Trabalho:</label>
                        <input class="input" placeholder="<?= $user->work ?>" type="text" name="work" />

                    <?php else : ?>
                        <label>Trabalho:</label>
                        <input class="input" placeholder="Onde você trabalha?" placeholder="<?= $user->work ?> 
                        " type="text" name="work" />

                    <?php endif; ?>
                    <div class="hr"></div>
                    <label>Nova senha:</label>
                    <input class="input" id="password" 
                    placeholder="Caso queira alterar sua senha, digite a nova senha." type="password" name="password" />

                    <label>Confirmar senha:</label>
                    <input class="input" id="password1" 
                    placeholder="Repita a senha para confirmar" type="password" name="password1" />
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
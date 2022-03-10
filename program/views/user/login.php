
<div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url; ?>user/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email"/>
                <label for="password">Password</label>
                <input type="password" name="password"/>
                <input type="submit" name="enviar" id="enviar" value="Enviar"/>
            </form>

        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre.' '.$_SESSION['identity']->apellidos; ?></h3>        

        <?php endif; ?>
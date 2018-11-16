<div class="container">
    <img src="../ressources/SelfHeroes.png">
    <div class="col-md-10 col-md-offset-1">

        <form action="" method="post" id="signin">
            <h2>SIGN IN</h2>
            <input type="text" name="login" placeholder="login">
            <?php
            if(isset($errors['login'])){
                echo $errors['login'];
            }
            ?>
            <input type="text" name="password" placeholder="password">
            <?php
            if(isset($errors['password'])){
                echo $errors['password'];
            }
            ?>
            <input type="submit">
        </form>

        <a href="/SelfHeroes/php/compte"><button class="menuBtn">Revenir au Menu</button></a>

    </div>
</div>
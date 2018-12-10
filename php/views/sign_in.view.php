
<div id="sign" class="flex items-center justify-between fixed w-full bg-white">
    <img src="../ressources/logo.png" alt="" class="self-start ml-5 " id="logo">

    <div class="flex justify-around">
        <?php
        if(isset($errors['SQL'])){
            echo $errors['SQL'];
        }
        ?>
        <form action="" method="post" id="signin">
            <input  name="login" class="shadow appearance-none border rounded w-1/4 py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
            <?php
            if(isset($errors['login'])){
                echo $errors['login'];
            }
            ?>
            <input  name="password"  class="shadow appearance-none border border-red rounded w-1/4 py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            <?php
            if(isset($errors['password'])){
                echo $errors['password'];
            }
            ?>
            <input type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>

        <a href="/SelfHeroes/php/"><button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Revenir au Menu</button></a>
    </div>
</div>

<div class="">
    <img src="../ressources/SelfHeroes.png" class="w-full">
    <img src="../ressources/livre-ouvert.jpg" class="w-full">
</div>




<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="lightth body">

    <div class="loading justify-content-center d-flex align-items-center position-fixed h-100 w-100">
        <img src="assets/img/loading.gif" width="25px" alt="">
    </div>

    <?php

    function zaman($zaman)
    {
        $zaman_farki = time() - $zaman;
        $saniye = $zaman_farki;
        $dakika = round($zaman_farki/60);
        $saat = round($zaman_farki/3600);
        $gun = round($zaman_farki/86400);
        $hafta = round($zaman_farki/604800);
        $ay = round($zaman_farki/2419200);
        $yil = round($zaman_farki/29030400);

        if($saniye <= 59)
        {
            return $saniye." saniye önce";
        }
        else if($dakika <= 59)
        {
            return $dakika." dakika önce";
        }
        else if($saat <= 23)
        {
            return $saat." saat önce";
        }
        else if($gun <= 6)
        {
            return $gun." gün önce";
        }
        else if($hafta <= 3)
        {
            return $hafta." hafta önce";
        }
        else if($ay <= 11)
        {
            return $ay." ay önce";
        }
        else 
        {
            return $yil." yıl önce";
        }
    }
    
    function head()
    {
        ?>
        
        <div class="sidebarmenu position-fixed h-100">
            <div class="d-flex logo mb-3">
                <img src="assets/img/logo.png" width="50px" alt="">
                <h1>FORUMUNI</h1>
            </div>
            <a href="index.php" rel="load">
                <i class="fa fa-home"></i> 
                <span class="sidtxt">Ana Sayfa</span>
            </a>
            <a rel="load">
                <i class="fa fa-search"></i> 
                <span class="sidtxt">Ara</span>
            </a>
            <a href="explore.php" rel="load">
                <i class="fa fa-binoculars"></i> 
                <span class="sidtxt">Keşfet</span>
            </a>
            <a href="questpage.php" rel="load">
                <i class="fa fa-question"></i> 
                <span class="sidtxt">Soru Cevap</span>
            </a>
            <?php 
                if(!isset($_SESSION["login"]))
                {
                    ?>
                    <a rel="load">
                        <i class="fa fa-message"></i> 
                        <span class="sidtxt">Mesajlar</span>
                    </a>
                    <a rel="load">
                        <i class="fa fa-heart"></i> 
                        <span class="sidtxt">Bildirimler</span>
                    </a>
                    <a rel="load">
                        <i class="fa fa-plus"></i> 
                        <span class="sidtxt">Oluştur</span>
                    </a>
                    <a href="profile.php" rel="load">
                        <img class="rounded-circle i" width="17px" src="assets/img/avatarnormalimg.png" alt=""> 
                        <span class="sidtxt">Profil</span>
                    </a>

                    <?php
                }

                else
                {
                    ?>

                    <a href="login.php" rel="load">
                        <span class="sidtxt">Giriş Yap</span>
                    </a>
                    <a href="register.php" rel="load">
                        <span class="sidtxt">Üye Ol</span>
                    </a>

                    <?php
                }
            ?>
            <a class="degis">
                <i class="fa fa-moon"></i> 
                <span class="sidtxt">Görünümü Değiştir</span>
            </a>
        </div>

        <div class="mobmenu">
            <div class="ustmenu">

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "index.php"){ ?>
                    <div class="ustbaslik">
                        <h5>FORUMUNİ</h1>
                    </div>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "explore.php"){ ?>
                    <form class="frmsearch" action="" method="post">
                        <input type="text" class="searchmob" placeholder="Arayın..." name="" id="">
                        <span class="position-fixed closesearch" style="right:40px; display: none; top:35px;"><i class="fa fa-close"></i></span>
                    </form>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "questpage.php"){ ?>
                    <div class="ustbaslik">
                        <h5>SORU | CEVAP</h1>
                    </div>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "notifications.php"){ ?>
                    <div class="ustbaslik">
                        <h5>BİLDİRİMLER</h1>
                    </div>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "profile.php"){ ?>
                    <div class="ustbaslik">
                        <h5>kadi</h1>
                    </div>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "login.php"){ ?>
                    <div class="ustbaslik">
                        <h5>GİRİŞ YAP</h1>
                    </div>
                <?php } ?>

                <?php if(basename($_SERVER['SCRIPT_NAME'])  == "register.php"){ ?>
                    <div class="ustbaslik">
                        <h5>KAYIT OL</h1>
                    </div>
                <?php } ?>
            </div>
            <div class="altmenu">
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "index.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "explore.php" || basename($_SERVER['SCRIPT_NAME'])  == "user.php" || basename($_SERVER['SCRIPT_NAME'])  == "uni.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="explore.php">
                        <i class="fa fa-binoculars"></i>
                    </a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "questpage.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="questpage.php">
                        <i class="fa fa-question"></i>
                    </a>
                </li>
                <?php 
                    if(isset($_SESSION["login"]))
                    {
                ?>

                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "notifications.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="notifications.php">
                        <i class="fa fa-heart"></i>
                    </a>
                </li>

                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "profile.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="profile.php">
                        <img class="rounded-circle i" width="25px" src="assets/img/avatarnormalimg.png" alt="">
                    </a>
                </li>

                <?php } else { ?>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME'])  == "login.php"){ echo "activemob"; } ?>">
                    <a rel="load" href="login.php">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                <?php } ?>
            </div>
        </div>

        <?php
    }

    function footer()
    {
        ?>

        <script src="assets/js/bootstrap.bundle.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" integrity="sha512-aUhL2xOCrpLEuGD5f6tgHbLYEXRpYZ8G5yD+WlFrXrPy2IrWBlu6bih5C9H6qGsgqnU6mgx6KtU8TreHpASprw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/frmascript.js"></script>

        <?php
    }
    
    ?>
</body>
</html>
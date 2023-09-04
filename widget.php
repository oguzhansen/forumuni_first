<?php

include "config.php";

function search()
{

    ?>
    
    <?php
}

function content($yonetim)
{
    echo "<div class='col mt-5 ml-3 mr-3 mb-5'>";
        while($post = $yonetim->fetch(PDO::FETCH_ASSOC)){
            
            ?>  

            <div class="yonpost row mb-3">
                <div class="col-2">
                    <img class="w-100 rounded-circle" src="<?=$post["avatar"]?>" alt="">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <b><?=$post["usname"]?></b>
                        </div>
                        <div class="col-2">
                            ...
                        </div>
                    </div>
                    <p><?=$post["text"]?></p>
                    <img class="w-100" src="<?=$post["image"]?>" alt="">
                </div>
            </div>
                
            <?php
        }
    echo "</div>";
}


function logcontent($sorular)
{
    include "config.php";

    echo "<div class='col mt-5 ml-3 mr-3 mb-3'>";
        while($cikti = $sorular->fetch(PDO::FETCH_ASSOC)){
                        
            /** Soru Kategori */
            $kat = $conn->query("select * from sorucevapkat where kat_id = '" . $cikti["kat_id"] . "'");
            $katid = $kat->fetch(PDO::FETCH_ASSOC);


            /** Cevap Count */
            $cevap = $conn->query("select count(*) as cevap_id from cevaplar where soru_id = '" . $cikti["soru_id"] . "'");
            $cevapcount = $cevap->fetch(PDO::FETCH_ASSOC);


            /** User */
            $user = $conn->query("select * from users where id = '" . $cikti["id"] . "'");
            $userinfo = $user->fetch(PDO::FETCH_ASSOC);


            /** Soru Üniversite */
            $uni = $conn->query("select * from universite where universite_id = '" . $cikti["uni_id"] . "'");
            $unial = $uni->fetch(PDO::FETCH_ASSOC);

            /** Soru Fakülte */
            $unifak = $conn->query("select * from universite_fakulte where fakulte_id = '" . $cikti["fak_id"] . "'");
            $unifakal = $unifak->fetch(PDO::FETCH_ASSOC);

            /** Soru Bölüm */
            $unibol = $conn->query("select * from bolumler where bolum_id = '" . $cikti["bol_id"] . "'");
            $unibolal = $unibol->fetch(PDO::FETCH_ASSOC);

            if (isset($_SESSION["username"])) {
                $rez = $conn->query("select count(*) as rez_id from rezler where soru_id = '" . $cikti["soru_id"] . "'");
                $rez = $rez->fetch(PDO::FETCH_ASSOC);

                $rezus = $conn->query("select * from rezler where soru_id = '" . $cikti["soru_id"] . "' and user_id = '$userid'");
                $rezuscount = $rezus->rowCount();
            }

            ?>  

            <div class="yonpost">
                <div class="avatar">
                    <a href="<?php echo $userinfo["username"]; ?>">
                        <img src="<?php echo $userinfo["avatar"]?>" alt="">
                    </a>
                </div>
                <div class="post">
                    <div class="head">
                        <div class="kadi">
                            <a href="<?php echo $userinfo["username"]; ?>">
                                <b><?php echo $userinfo["username"]; ?> </b> <span class="text-muted"> <?php echo zaman($cikti["soru_tarih"]); ?> </span>
                            </a>
                            <p class="text-muted cate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 350px;" >
                                <?php
                                if ($katid["kat_id"] == 1) {
                                    echo "Genel Sorular";
                                } else if ($katid["kat_id"] == 2) {
                                    echo $unial["name"];
                                } else if ($katid["kat_id"] == 3) {
                                    echo $unifakal["name"];
                                } else if ($katid["kat_id"] == 4) {
                                    echo $unibolal["bolum_adi"];
                                } else {
                                    echo "Yurtlar Hakkında";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="settings">
                            <?php if (isset($_SESSION["login"])) {
                                if ($userinfo["id"] != $userid) { ?>
                                <div class="dropmenu" type="button" >
                                    <span class="dropmenuac">...</span>
                                    <div class="dropmenulist">
                                        <li> <a role="menuitem" class=" sikayet" type="button" id="sikayet" title="<?php echo $cikti["soru_id"]; ?>"> Şikayet Et</a></li>
                                    </div>
                                </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="post-location" onclick="location.href='quest.php?soruid=<?php echo $cikti['soru_id']; ?>'">
                        <div class="post">
                            <p><?php echo $cikti["soru"]; ?></p>
                        </div>
                    </div>
                    <?php if($userid != $cikti["id"]){ ?>

                        <div class="post-btn">
                            <div>
                                <span class="rezle" id="rezle" type="button" title="<?php echo $cikti["soru_id"]; ?>">
                                    <span class="<?php if ($rezuscount != 1) {
                                        echo "rezle";
                                    } else {
                                        echo "rezlendi";
                                    } ?>"># <?php echo $rez["rez_id"]; ?></span>
                                </span>
                            </div>
                            <div class="yorum"><i class="far fa-comment"></i> <?php echo $cevapcount["cevap_id"]; ?></div>
                            <div class="paylas">
                                <a type="button" class="col panoyakopyala" id="panoyakopyala" title="http://forumuni.com/soru.php?soruid=<?php echo $cikti['soru_id']; ?>">
                                    <i class="fa-solid fa-share"></i>
                                    <div class="copyto">Kopyalandı</div>
                                </a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
                
            <?php
        }
    echo "</div>";
}

?>
<nav>
            <a href='index.php'><button class='bouton' style='font-size: calc(15px + 2vw);'><img src='../img/blank.png' class='logo'>Smart<span class='span'>Care</span></button></a>
                <div class='dropdown'>
                    <button class='dropbtn'>
                        <?php
                        
                        if (isset($_COOKIE['lang'])) {
                            $lan=$_COOKIE['lang'];
                        } else { 
                            $lan='fr';
                        }
                        if ($lan=="en") {
                            echo("<img class='flag' src='../img/Drapeauen.png' class='flag1'>");    
                        } else{
                            echo("<img class='flag' src='../img/Drapeaufr.png' class='flag1'>");
                        }
                        ?>
                    </button>
                    <div class='dropdown-content'>
                    <?php
                        if (isset($_COOKIE['lang'])) {
                            $lan=$_COOKIE['lang'];
                        } else { 
                            $lan='fr';
                        }
                        if ($lan=="en") {
                            echo("
                                <button class='dropbtn' onclick=\"redirect(event,'fr')\">
                                    <img class='flag' src='../img/Drapeaufr.png' class='flag2'>
                                </button>");
                        } else{
                            echo("
                                <button class='dropbtn' onclick=\"redirect(event,'en')\">
                                    <img class='flag' src='../img/Drapeauen.png' class='flag2'>
                                </button>");
                        }
                        ?>
                        
                    </div>
                </div>
            <a href='account.php'><button class='bouton' style='float: right'><div class='write'><?php echo("$_SESSION[nom] $_SESSION[prenom]")?></div></button></a>
            <a href='leaderboard.php'><button class='bouton' style='float: right'><div class='write'><?= _Ranking ?></div></button></a>
            <a href='dashboard.php'><button class='bouton' style='float: right'><div class='write'><?= _Dashboard ?></div></button></a>
</nav>
<script src=../javascript/translate.js></script>
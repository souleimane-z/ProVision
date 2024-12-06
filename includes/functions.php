<?php
function displayAuthButtons($isLoggedIn, $logout_icon) {
    if (!$isLoggedIn) {
        echo '<div class="header-auth">
               <button class="btn-login" title="Se connecter">
                   <i class="fa-solid fa-right-to-bracket"></i>
               </button>
               <button class="btn-signup" title="S\'inscrire">
                   <i class="fa-solid fa-user-plus"></i>
               </button>
           </div>';
    } else {
        echo '<div class="header-auth">
               <button class="btn-login" title="Se déconnecter">
                   '.$logout_icon.'
               </button>
           </div>';
    }
}

?>
<template>
    <footer>
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link to="/home" class="footer_col"><img src="../assets/logo.png" alt="Accueil WeGo2" width="100" height="100"></router-link>
                        <div class="footer_col">
                            <router-link to="/home" class="nav-link">Accueil</router-link>
                            <router-link to="/history" class="nav-link" href="#">Mes sorties passées</router-link>
                            <router-link to="/createOuting" class="nav-link" href="#">Créer une sortie</router-link>
                        </div>  
                        <div class="footer_col">  
                            <router-link to="/messaging" class="nav-link" href="#">Messages</router-link>
                            <router-link to="/myAccount" class="nav-link" href="#">Mon compte</router-link>
                            <router-link to="/settings" class="nav-link" href="#">Paramètres</router-link>
                        </div> 
                        <div class="footer_col">   
                            <router-link to="/terms" class="nav-link" href="#">Conditions générales</router-link>
                            <router-link to="/privacy" class="nav-link" href="#">Confidentialité</router-link>
                            <router-link to="/contact" class="nav-link" href="#">Contact</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </footer>
</template>

<script setup>
    import { ref } from 'vue';
    import router from '../router';

</script>

<style scoped>

nav.navbar{
    padding: 90px;
}
.navbar-nav{
    display: flex; 
    justify-content: space-between;
    width: 100%;
}

.footer_col{
    display: flex;
    flex-direction: column;
    align-content: center;
}

a.nav-link{
    padding: 0;
}
</style>
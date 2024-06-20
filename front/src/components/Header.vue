<template>
    <header v-if="isLoggedIn">
        <nav class="navbar navbar-expand-md p-1">
            <div class="container-fluid d-flex">
                <router-link to="/" class="logo-header"><img src="../assets/logo.png" alt="Accueil WeGo2" width="100" height="100"><span class="peach-cake header-title">WeGo2</span></router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-md-flex justify-content-center">
                    <div class="navbar-nav">
                        <router-link to="/home" class="nav-link">Accueil</router-link>
                        <router-link to="/history" class="nav-link" href="#">Mes sorties passées</router-link>
                        <router-link to="/createOuting" class="nav-link" href="#">Créer une sortie</router-link>
                        <router-link to="/messaging" class="nav-link" href="#">Messages</router-link>
                        <router-link to="/myAccount" class="nav-link" href="#">Mon compte</router-link>
                        <button @click="logOut" class="position-power-off">
                            <p>Déconnexion</p>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <div class="search-container d-flex bg-lightblue">
            <p>Que recherchez-vous ?</p>
            <div class="filter-container">
                <select id="filterOptions" name="filterOptions">
                    <option value="personne">Personne</option>
                    <option value="animal">Animal</option>
                    <option value="activité">Activité</option>
                </select>
            </div>
            <input type="text" id="searchInput" placeholder="Recherche...">
        </div>
    </header>
    <div v-else></div>
</template>

<script>
import router from '../router';

export default {

    methods: {
        logOut(){
            localStorage.removeItem("token_WeGo2");
            router.push('/connexion');
        }
    },

    computed: {
        isLoggedIn(){
            if(!localStorage.getItem("token_WeGo2")){
                return false;
            }else{
                return true;
            }
        }
    }
}
</script>
<template>
    <section style="background-color: #3A4369; height: 100vh;">
        <div class="container m-auto" style="height: 100%;">
            <div class="row d-flex justify-content-center align-items-center" style="height: 100%;">
                <div class="col col-xl-10">
                    <div class="card" id="connexion" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-lg-8 d-none d-lg-block">
                                <img src="/src/assets/homeDeco_Copie.png"
                                alt="login form" style="border-radius: 1rem 0 0 1rem; height: 100%; width: auto" />
                            </div>
                            <div class="col-12 col-lg-4 d-flex align-items-center">
                                <div class="card-body p-2 p-lg-3 text-black">

                                    <form>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="../assets/logo_white.png" style="width: 50%; height: auto">
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connexion</h5>

                                        <div class="form-outline mb-4">
                                            <input v-model="email" type="email" id="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input v-model="password" type="password" id="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Mot de passe</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button" @click="logIn">Entrer</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Mot de passe oublié ?</a>
                                        <p style="color: #393f81;">Pas encore de compte ? <a href="#!"
                                            style="color: #393f81;">S'inscrire</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import router from '../router';
export default {
    data() {
        return {
            email: "",
            password: ""
        };
    },
    methods: {
        logIn(){
            fetch("https://127.0.0.1:8000/api/gettoken?email="+this.email+"&password="+this.password)
                .then(async response =>{
                    const data = await response.json();
                    if(!response.ok){
                        const error = (data && data.message) || response.statusText;
                        return Promise.reject(error);
                    }
                    localStorage.setItem("token_WeGo2", data.token);
                    router.push({path: 'home'});
                })
                .catch(error => {
                    this.errorMessage = error;
                    console.error("There was an error !", error);
                });
        }
    }
}
</script>
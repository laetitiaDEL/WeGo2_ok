<template> 
        <div class="container-fluid">
            <div class="row w80">
                <div class="col-12 p-0 relative listParent">
                    <div class="listeFuture bg-darkblue light p-5 blue-shadow">
                        <h2 class="peach-cake">Utilisateurs</h2>
                        <article class="bg-blue d-flex justify-content-between m-2 p-2 border-dark" v-for="user in allUsers">
                            <div class="sortieContainer d-flex">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="bg-blue m-0">{{ user.name }}</h6>
                                    <p class="m-0"> {{ user.mail }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
    </div>
</template>



<script>
import router from '../router';
export default {
    name: "users",
    
    data(){
        return{
            allUsers : "",
        }
    },
    created(){
        fetch("https://127.0.0.1:8000/users")
            .then(async response => {
                const data = await response.json();

                if(!response.ok){
                    const error = (data && data.message)  || response.statusText;
                    return Promise.reject(error);
                }
                this.allUsers = data;
            })
            .catch(error => {
                this.errorMessage = error;
                console.error("There was an error !", error);
            });
    }
}
</script>

<style scoped>
    #connexion{
        background-color: #FCFAEE;
    }
</style>
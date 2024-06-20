<template>
    <p>Paramètres</p>
</template>

<script>
import router from '../router';
export default {
  data(){
    },

    beforeCreate(){
        fetch('https://127.0.0.1:8000/api/veriftoken', {
            headers: {Authorization: "Bearer " + localStorage.getItem('token_WeGo2')}
        })
            .then(async response =>{
                const data = await response.json();
                if(!response.ok){
                    const error = (data && data.message) || response.statusText;
                    localStorage.removeItem('token_WeGo2');
                    router.push('/connexion');
                    return Promise.reject(error);
                }
                return data;
            })
            .catch(error => {
                console.error("There was an error !", error);
            });
    }
}
</script>
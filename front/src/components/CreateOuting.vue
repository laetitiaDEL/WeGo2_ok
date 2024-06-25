<template>
    <div class="p-5">
        <h2 class="peach-cake text-center">Créer une sortie</h2>
        <div class="spacer-mini"></div>
        <article>
            <header class="w50 m-auto bg-light"> 
                <div class="d-flex justify-content-between step-numbers relative">
                    <div
                    :class="{'active':index === formPosition}"
                    v-for="(step, index) in formGroup"
                    :key="'step'+index"
                    >
                        <div @click="setStep(index)" class="mouse">
                            <div class="step-number">{{ index+1 }}</div>
                            <p class="absolute d-none d-lg-block">{{ step.title }}</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="spacer-mini"></div>
            <form :class="animation" class="card w60 m-auto p-3">
                <h3>{{ formGroup[formPosition].title }}</h3>
                <div>
                    <div
                    v-for="(field, index) in formGroup[formPosition].fields"
                    :key="'field'+index"
                    >
                        <input :type=field.type :name=field.name v-model="field.value" :required="field.name == date ? true : false">
                        <label>{{ field.label }}</label>
                    </div>
                </div>
            
                <div>
                    <button
                        v-if="formPosition > 0"      
                        @click.prevent="previousStep">
                        Précédent
                    </button>
                    <button
                        v-if="formPosition < formGroup.length -1"      @click.prevent="nextStep">
                        Suivant
                    </button>

                    <button
                        v-if="formPosition === formGroup.length -1" 
                        @click.prevent="addOuting">
                        Valider
                    </button>
                </div>
            </form>
        </article>
        <div v-if="showOverlay" :class="['overlay', overlayClass]">
            {{ errorMsg }}
        </div>
    </div>
</template>

<script>
import router from '../router';
export default {
    data: () => {
        return {
            formPosition: 0,
            animation: 'animate-in',
            activities: "",
            activity: "",
            userId: "",
            outing: "",
            errorMsg: "",
            statusCode: "",
            showOverlay: false,
            overlayClass: "",
            
            formGroup: [
                {title: "Quand ?",
                fields: [
                    {label: "Maintenant ou plus tard ?", type: "datetime-local", name:"date", value: ""},
                    ]
                },
                {title: "Quoi ?",
                fields: []   //alimenté par le fetch
                },
                {title: "Où ?",
                fields: []
                },
                {title: "Préférences",
                fields: []
                },
                {title: "Valider",
                fields: []
                },
            ]
        }
    },

    methods: {
        setStep(step){
            this.animation = 'animate-out';
            setTimeout(() => {
                this.animation = 'animate-in';
                this.formPosition = step;
            }, 600);
        },

        previousStep(){
            this.animation = 'animate-out';
            setTimeout(() => {
                this.animation = 'animate-in';
                this.formPosition -= 1;
            }, 600);
        },

        nextStep(){
            this.animation = 'animate-out';
            setTimeout(() => {
                this.animation = 'animate-in';
                this.formPosition += 1;
            }, 600);
        },

        addOuting(){
            this.formGroup[1].fields.forEach(activityInput => {
                if(activityInput.value === "on"){
                    this.activity = activityInput.id;
                }
            });
            this.outing = {
                "date": this.formGroup[0].fields[0].value,
                "user": this.userId,
                "activity": this.activity
            };

            fetch('https://localhost:8000/outing/add', {
                method: "POST",
                body: JSON.stringify(this.outing)
            })
                .then(async response =>{
                    const data = await response.json();
                    this.errorMsg = data.error;
                    this.statusCode = response.status;
                    if(!response.ok){
                        const error = (data && data.message) || response.statusText ;
                        return Promise.reject(error);
                    }else{
                        this.overlayClass = 'success';
                    }
                    this.showOverlay = true;
                    setTimeout(() => {
                        this.showOverlay = false;
                    }, 3000);
                })
                .catch(error=>{
                    this.overlayClass = 'error';
                    this.showOverlay = true;
                    setTimeout(() => {
                        this.showOverlay = false;
                    }, 3000);
                    console.error("There was an error !", error);
                })
        }
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
                this.userId = data.token.userId;
                return data;
            })
            .catch(error => {
                this.errorMsg = error;
                console.error("There was an error !", error);
            });
    },

    created(){
        fetch("https://127.0.0.1:8000/activities")
            .then(async response => {
                const data = await response.json();

                if(!response.ok){
                    const error = (data && data.message)  || response.statusText;
                    return Promise.reject(error);
                }
                this.activities = data;
                this.activities.forEach(activity => {
                    this.formGroup[1].fields.push({
                        id: activity.id,
                        label: activity.name,
                        type: "radio",
                        name: "activity",
                        value: ""
                    })
                });
            })
            .catch(error => {
                this.errorMsg = error;
                console.error("There was an error !", error);
            });
    },
}

</script>

<style>
.overlay {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    z-index: 1000;
    text-align: center;
}

.success {
    background-color: green;
}

.error {
    background-color: red;
}

.animation-in {
    transform-origin: left;
    animation: in 0.2s ease-in-out;
}
.animation-out {
    transform-origin: bottom left;
    animation: out 0.2s ease-in-out;
}

.step-numbers .active .step-number{
    background-color: rgb(223, 223, 223);
}
.step-numbers div .step-number{
    background-color: white;
}

.step-numbers::before{
    content: "";
    width: 100%;
    height: 0.5px;
    top: 50%;
    background-color: black;
    box-sizing: border-box;
    position: absolute;
    z-index: 0;
}

.step-number {
    height: 26px;
    width: 26px;
    border: 1px solid black;
    border-radius: 50%;
    text-align: center;
    position: relative;
    z-index: 5;
}

.mouse:hover{
    cursor: pointer;
}

</style>
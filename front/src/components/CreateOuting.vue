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

            <section :class="animation" class="card w60 m-auto p-3">
                <h3>{{ formGroup[formPosition].title }}</h3>
                <div>
                    <div
                    v-for="(field, index) in formGroup[formPosition].fields"
                    :key="'field'+index"
                    >
                        <input :type=field.type :name=field.name v-model="field.value">
                        <label>{{ field.label }}</label>
                    </div>
                </div>
            
                <div>
                    <button
                        v-if="formPosition > 0"      @click="previousStep">
                        Précédent
                    </button>
                    <button
                        v-if="formPosition < formGroup.length -1"      @click="nextStep">
                        Suivant
                    </button>

                    <button
                        v-if="formPosition === formGroup.length -1">
                        Valider
                    </button>

                </div>

            </section>
        </article>
    </div>
</template>

<script>
import router from '../router';
export default {
    data: () => {
    return {
            formPosition: 0,
            animation: 'animate-in',
            formGroup: [
            {title: "Quand ?",
                fields: [
                {label: "Maintenant", type: "radio", name:"when", value: "now" },
                {label: "Plus tard", type: "radio", name:"when", value: "later"},
                {label: "", type: "datetime-local", name:"", value: ""},]},
            {title: "Quoi ?",
                fields: [
                    
                ]},
            {title: "Où ?",
                fields: [
                {label: "Utiliser ma position", type: "radio", name:"where", value: "here" }
            ]},
            {title: "Préférences",
                fields: [

                ]},
            {title: "Valider",
                fields: []},
            ]}},

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
    },

}

</script>

<style>

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
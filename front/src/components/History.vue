<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 listParent">
                <div class="bg-darkblue light p-5 blue-shadow">
                    <h2 class="peach-cake">Mes sorties passées :</h2>
                    <article class="bg-blue d-flex justify-content-between m-2 p-2 border-dark" v-for="sortie in listeHistorique">
                        <div class="sortieContainer d-flex">
                            <aside class="d-flex">
                                <img class="outingPP" v-bind:src="sortie.ppURL">
                                <div class="icons d-flex flex-column justify-content-center">
                                    <img v-bind:src="sortie.iconURL">
                                    <img src="/src/assets/marker-02.png">
                                </div>
                            </aside>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="bg-blue m-0">{{ sortie.user }} {{ sortie.nombre ? "+"+sortie.nombre+" autres" : sortie.animal ? "& "+sortie.animal.nom : "" }}</h6>
                                <p class="m-0">Près de {{ sortie.lieu }}</p>
                            </div>
                        </div>
                        <div class="buttons d-flex flex-column">
                            <button class="btn btn-outline-primary btn-sm">DETAILS</button>
                            <button class="btn btn-primary btn-sm">CONTACTER</button>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

</template>



<script>
export default {
  data(){
        return{
            listeHistorique:[
                {
                    type: "promenadeChien",
                    iconURL: "/src/assets/Dog.png",
                    user: "Thomas U.",
                    ppURL: "/src/assets/thomas.png",
                    lieu: "Canal du midi",
                    animal:
                        {
                            nom: "Ruby",
                            race: "Border Collie",
                            age: "6 mois"
                        }
                },
                {
                    type: "football",
                    iconURL: "/src/assets/SoccerBall.png",
                    user: "Iliana J.",
                    ppURL: "/src/assets/iliana.png",
                    lieu: "Canal du midi",
                    nombre: 6
                },
                {
                    type: "promenadeChien",
                    iconURL: "/src/assets/Dog.png",
                    user: "Marina N.",
                    ppURL: "/src/assets/marina.png",
                    lieu: "Canal du midi",
                    animal:
                        {
                            nom: "Pixel",
                            race: "Beagle",
                            age: "2 ans"
                        }
                },
                {
                    type: "basketball",
                    iconURL: "/src/assets/Basketball.png",
                    user: "Ethan F.",
                    ppURL: "/src/assets/ethan.png",
                    lieu: "Canal du midi",
                    nombre: 4
                },
                {
                    type: "running",
                    iconURL: "/src/assets/RunningShoe.png",
                    user: "Anthony B.",
                    ppURL: "/src/assets/anthony.png",
                    lieu: "Canal du midi"
                }
            ]
        }
    }
}
</script>
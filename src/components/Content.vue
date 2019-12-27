<template>
    <div class="container-fluid text-white">
      <div 
        v-for="(row , index ) in liste" 
        :key="index" 
        :class="classRow + ' rowDay py-2 align-items-center' + classCible(index)"
      >
        <div class="col"> {{ dateFormated(row.date) }} </div>
        <div v-if="!carnet.equipeIsDisabled(1)" class="col"> {{ row.equipe1 }} </div>
        <div v-if="!carnet.equipeIsDisabled(2)" class="col"> {{ row.equipe2 }} </div>
        <div v-if="!carnet.equipeIsDisabled(3)" class="col"> {{ row.equipe3 }} </div>
        <div v-if="!carnet.equipeIsDisabled(4)" class="col"> {{ row.equipe4 }} </div>
        <div v-if="!carnet.equipeIsDisabled(5)" class="col"> {{ row.equipe5 }} </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'Content',
  props: {
    carnet: Object,
    nbJours: Number,
    classRow: String
  },
  computed: {
    liste(){
      if ( this.carnet.needRefresh ){
        return this.carnet.searchDate(this.nbJours) ;
      }

      return [] ;
    }
  },
  methods: {
    dateFormated(date){
      return date.day + ' ' + date.number + ' ' + date.month
    },
    classCible(index){
      return (index === 1 )? ' text-warning' : ''
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.rowDay:nth-child(2n){
  background: rgba(255, 255, 255, 0.1) ;
}
</style>

<template>
  <div>
    <div class="container-fluid navbar-app sticky-top shadow">
      <menu-app :carnet="carnet"/>
    
      <div :class="classColumnParent + ' text-dark bg-info shadow'">
        <div class="col">Date</div>
        <div v-if="!carnet.equipeIsDisabled(1)" class="col">
          Eq<span class="d-none d-md-inline">uipe</span> 1
        </div>
        <div v-if="!carnet.equipeIsDisabled(2)" class="col">
          Eq<span class="d-none d-md-inline">uipe</span> 2
        </div>
        <div v-if="!carnet.equipeIsDisabled(3)" class="col">
          Eq<span class="d-none d-md-inline">uipe</span> 3
        </div>
        <div v-if="!carnet.equipeIsDisabled(4)" class="col">
          Eq<span class="d-none d-md-inline">uipe</span> 4
        </div>
        <div v-if="!carnet.equipeIsDisabled(5)" class="col">
          Eq<span class="d-none d-md-inline">uipe</span> 5
        </div>
      </div>
    </div>

    <content-app 
      :carnet="carnet" 
      :nbJours="nbJours" 
      :class-row="classColumnParent" 
    />
  </div>
</template>

<script>
// @ is an alias to /src
import MenuApp from '@/components/Menu.vue'
import ContentApp from '@/components/Content.vue'
import Carnet from '@/core/Carnet.js'

export default {
  name: 'home',
  components: {MenuApp,ContentApp },
  data(){
    return {
      carnet: null ,
      nbJours: 50
    }
  },
  computed: {
    classColumnParent(){
      let nbCol = this.carnet.nbEquipeVisible() + 1 ;
      return `row row-cols-${nbCol} text-center`
    }
  },
  created() {
    this.carnet = new Carnet(this.date);
  }
}
</script>

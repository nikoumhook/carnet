<template>
  <nav class="navbar navbar-dark bg-dark row">
    <div class="col-5">
      <div class=" ml-3 btn-group" role="group" aria-label="Basic example">
      <button 
        type="button" 
        @click="carnet.changeEquipeDisabled(1)" 
        :class="classButton(1)"
      >Eq<span class="d-none d-xl-inline">uipe</span> 1
      </button>
      <button 
        type="button" 
        @click="carnet.changeEquipeDisabled(2)" 
        :class="classButton(2)"
      >Eq<span class="d-none d-xl-inline">uipe</span> 2
      </button>
      <button 
        type="button" 
        @click="carnet.changeEquipeDisabled(3)" 
        :class="classButton(3)"
      >Eq<span class="d-none d-xl-inline">uipe</span> 3
      </button>
      <button 
        type="button" 
        @click="carnet.changeEquipeDisabled(4)" 
        :class="classButton(4)"
      >Eq<span class="d-none d-xl-inline">uipe</span> 4
      </button>
      <button 
        type="button" 
        @click="carnet.changeEquipeDisabled(5)" 
        :class="classButton(5)"
      >Eq<span class="d-none d-xl-inline">uipe</span> 5
      </button>
    </div>
    </div>
    <div class="col-2 text-center">
      <h4>
        <a class="text-white">Mon Carnet<small class="d-none d-xl-inline"> v 3.0</small></a>
      </h4>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <form class="form-inline">
        <div style="width:150px;" class="mr-2">
          <date-picker
            v-model="start_date"
            color="indigo"
            is-dark
            @input="changeDate()"
          ></date-picker>  
        </div>
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Rechercher</button>
      </form>
    </div>
  </nav>
</template>

<script>
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
  name: 'Menu',
  props: {
    carnet: Object
  },
  data(){
    return {
      start_date: this.carnet.start_date
    }
  },
  components: { DatePicker },
  methods: {
    classButton(num_equipe){
      let classBtn = 'btn btn-info' ;

      if( this.carnet.equipeIsDisabled(num_equipe) ){
         classBtn += ' active'
      }

      return classBtn ;
    },
    changeDate(){
      if ( this.start_date != this.carnet.start_date){
        this.carnet.start_date = this.start_date ;
        this.carnet.needRefresh = true ;
      }
    }
  }
}
</script>


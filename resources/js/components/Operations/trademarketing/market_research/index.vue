<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
    <div class="container">
      <div class="row">
          <div class="col-md-12 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Marketing research</h4>
                <p class="card-description">
                  This is the information gathered from your agency's market research before project commencement. Click each tab to view details
                </p>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#competition" type="button" role="tab" >Competition</button>
                          <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#market_trends" type="button" role="tab" >Trends</button> -->
                          
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <competition></competition>
                          <!-- <market_trends></market_trends> -->
                          
                      </div>
                                          
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import competition from './competition.vue';
import market_trends from './market_trends.vue';


export default{
  components:{
    'nestednav':nestednav,
    'competition':competition,
    // 'market_trends':market_trends,
  },

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            project_name:'',
            project_brief:'',
            customer_id:'',
            project_lead:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          customers:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmproject/'+id)
      .then(({data}) => (this.form = data))
      .catch(console.log('error'))
  },
  methods:{
    onFileSelected(event){
        let file = event.target.files[0];
        if(file.size > 1048770){
          Notification.image_validation()
        }else{
          let reader = new FileReader();
          reader.onload = event =>{
            this.form.newphoto = event.target.result
          };
          reader.readAsDataURL(file);
        }
    },
    //Method for inserting employee details to the database
    updateProject(){
          let id = this.$route.params.id
          axios.put('/api/update-tmproject/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'trade-marketing'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
    let id = localStorage.getItem('user')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
  },


}
</script>

<style type="text/css" scoped>



button:not(:disabled), [type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled) {
    font-size: 12px;
}

</style>
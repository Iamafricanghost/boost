<template>
  <div class="content-wrapper">
<div class="row">
  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                          <li class="breadcrumb-item"><router-link to="/employee">All employee</router-link></li>
                      </ol>
              </nav>
</div>
      <div class="row g-3">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update organ Information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateOrgan" enctype="multipart/form-data">
                  
                  <div class="col-md-12">
                            <input type="text" class="form-control" id="title" placeholder="Organ title" v-model="form.title">
                            <small class="text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
                  </div>

                  

                  <button type="submit" class="btn btn-primary me-2">Update Company</button>

                </form>
              </div>
            </div>
          </div>
        </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'


export default{
  beforeCreate(){
    // axios.get('/api/country/')
    // .then(({data}) => (this.countries = data))
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
        title:'',
        userName:'',
      },
      errors:{},
      countries:[],
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-organ/'+id)
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
    updateOrgan(){
          let id = this.$route.params.id
          axios.put('/api/update-organ/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'organs'})
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
    
  }

}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>
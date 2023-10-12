<template>
  <div class="content-wrapper">
    <div class="row">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <!-- <li class="breadcrumb-item"><router-link to="/organ-assign">Assign</router-link></li> -->
                  <li class="breadcrumb-item" @click="$router.go(-1)">Back</li>
              </ol>
           </nav>
      </div>
      <div class="row g-3">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update sister company information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateRelation" enctype="multipart/form-data">
                  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Company name" v-model="form.company_name">
                              <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Office address" v-model="form.office_address">
                              <small class="text-danger" v-if="errors.office_address">{{ errors.office_address[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact name" v-model="form.contact_name">
                              <small class="text-danger" v-if="errors.contact_name">{{ errors.contact_name[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact level e.g. manager" v-model="form.contact_level">
                              <small class="text-danger" v-if="errors.contact_level">{{ errors.contact_level[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Contact phone" v-model="form.contact_phone">
                              <small class="text-danger" v-if="errors.contact_phone">{{ errors.contact_phone[0] }}</small>
                          </div>
  
                          <div class="col-md-12">
                              <input type="email" class="form-control"  placeholder="Contact email" v-model="form.contact_email">
                              <small class="text-danger" v-if="errors.contact_email">{{ errors.contact_email[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Tax identification number" v-model="form.tin">
                              <small class="text-danger" v-if="errors.tin">{{ errors.tin[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Relationship type" v-model="form.relation_type">
                              <small class="text-danger" v-if="errors.tin">{{ errors.relation_type[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2">Update relation</button>

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
    axios.get('/api/employee/')
      .then(({data}) => (this.employees = data))
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            customer_name:'',
            office_address:'',
            contact_name:'',
            contact_level:'',
            contact_phone:'',
            contact_email:'',
            tin:'',
            relation_type:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-sister/'+id)
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
    updateRelation(){
          let id = this.$route.params.id
          axios.put('/api/update-sister/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'sister'}) 
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
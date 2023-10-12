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
          <div class="col-md-4 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update category information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateCategory" enctype="multipart/form-data">
                  
                  <div class="col-md-12">
                        <input type="text" class="form-control"  placeholder="Project category" v-model="form.product_category">
                        <small class="text-danger" v-if="errors.product_category">{{ errors.product_category[0] }}</small>
                  </div>

  
  
                      <button type="submit" class="btn btn-primary me-2">Update category</button>

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

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            product_category:'',
            userName: localStorage.getItem('company_name'),
          },
          errors:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-category/'+id)
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
    updateCategory(){
          let id = this.$route.params.id
          axios.put('/api/update-category/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'products'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>
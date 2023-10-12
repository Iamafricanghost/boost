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
                <h4 class="card-title">Update sku information</h4>
                <p class="card-description">
                  Basic information
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateSku" enctype="multipart/form-data">
                  
                  <div class="col-md-8">
                              <input type="text" class="form-control"  placeholder="Product sku" v-model="form.product_sku">
                              <small class="text-danger" v-if="errors.product_sku">{{ errors.product_sku[0] }}</small>
                          </div>
                            
                          <div class="col-md-4">
                              <select class="form-select form-control"  v-model="form.variant_id">
                                <option selected>Select product brand</option>
                                <option :value="variant.id" v-for="variant in variants">{{variant.product_variant}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.variant_id">{{ errors.variant_id[0] }}</small>
                          </div>

                          <div class="col-md-8">
                            <input type="file" class="form-control" id="photo" placeholder="Photo" @change="onFileSelected">
                        </div>

                        <div class="col-md-4">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>

  
  
                      <button type="submit" class="btn btn-primary me-2">Update sku</button>

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
            product_sku:'',
            variant_id:'',
            photo:'',
            newphoto:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          variants:{},
        }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-sku/'+id)
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
    updateSku(){
          let id = this.$route.params.id
          axios.put('/api/update-sku/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'products'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
        let id = localStorage.getItem('company_name')
        axios.get('/api/viewvariants/'+id)
      .then(({data}) => (this.variants = data))
      },


}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>
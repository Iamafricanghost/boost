<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create sku</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createSku" enctype="multipart/form-data" ref="form">
  
  
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
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create sku</button>
  
                    </form>
                  </div>
                </div>
              </div>
  </template>
  
  <script type="text/javascript">
  
    export default{
  

      created(){
          if(!User.loggedIn()){
            this.$router.push({name:'/'})
          }
  
      },
      data(){
        return {
          form: {
            product_sku:'',
            variant_id:'',
            photo:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          variants:{},
        }
      },
      methods:{
        onFileSelected(event){
            let file = event.target.files[0];
            if(file.size > 1048770){
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event =>{
                this.form.photo = event.target.result
                console.log(event.target.result);
              };
              reader.readAsDataURL(file);
            }
        },
        //Method for inserting merchandiser details to the database
        createSku(){
              axios.post('/api/create-sku/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      beforeCreate(){
        let id = localStorage.getItem('user')
        axios.get('/api/viewvariants/'+id)
      .then(({data}) => (this.variants = data))
      },
  
    }
  </script>
  
  <style type="text/css">
  select.form-control{
    color: black;
  }
  
  .content-wrapper {
      margin-top: 34px;
  }
  
  </style>
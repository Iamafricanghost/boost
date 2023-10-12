<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create variant</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createVariant" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-8">
                              <input type="text" class="form-control"  placeholder="Product variant" v-model="form.product_variant">
                              <small class="text-danger" v-if="errors.product_variant">{{ errors.product_variant[0] }}</small>
                          </div>
                            
                          <div class="col-md-4">
                              <select class="form-select form-control"  v-model="form.brand_id">
                                <option selected>Select product brand</option>
                                <option :value="brand.id" v-for="brand in brands">{{brand.product_brand}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.brand_id">{{ errors.brand_id[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create variant</button>
  
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
            product_variant:'',
            brand_id:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          brands:{},
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
        createVariant(){
              axios.post('/api/create-variant/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      beforeCreate(){
        let id = localStorage.getItem('company_name')
        axios.get('/api/viewbrands/'+id)
      .then(({data}) => (this.brands = data))
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
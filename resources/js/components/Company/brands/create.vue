<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create brand</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createBrand" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-8">
                              <input type="text" class="form-control"  placeholder="Product brand" v-model="form.product_brand">
                              <small class="text-danger" v-if="errors.product_brand">{{ errors.product_brand[0] }}</small>
                          </div>
                            
                          <div class="col-md-4">
                              <select class="form-select form-control"  v-model="form.subcategory_id">
                                <option selected>Select product subcategory</option>
                                <option :value="subcategory.id" v-for="subcategory in subcategories">{{subcategory.product_subcategory}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.subcategory_id">{{ errors.subcategory_id[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create brand</button>
  
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
            product_brand:'',
            subcategory_id:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          subcategories:{},
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
        createBrand(){
              axios.post('/api/create-brand/',this.form)
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
        axios.get('/api/viewsubcategories/'+id)
      .then(({data}) => (this.subcategories = data))
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
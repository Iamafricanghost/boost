<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create subcategory</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    <form class="forms-sample row g-3" @submit.prevent="createSubcategory" enctype="multipart/form-data" ref="form">
   
  
                          <div class="col-md-8">
                              <input type="text" class="form-control"  placeholder="Product subcategory" v-model="form.product_subcategory">
                              <small class="text-danger" v-if="errors.product_subcategory">{{ errors.product_subcategory[0] }}</small>
                          </div>
                            
                          <div class="col-md-4">
                              <select class="form-select form-control"  v-model="form.category_id">
                                <option selected>Select product category</option>
                                <option :value="category.id" v-for="category in categories">{{category.product_category}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create subcategory</button>
  
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
            product_subcategory:'',
            category_id:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          categories:{},
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
        createSubcategory(){
              axios.post('/api/create-subcategory/',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){
        let id = localStorage.getItem('company_name')
        axios.get('/api/viewcategories/'+id)
      .then(({data}) => (this.categories = data))
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
<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="createItem" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_id">
                                <option>Select the competitor sku</option>
                                <option :value="sku.id" v-for="sku in skus">{{sku.sku_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_id[0] }}</small>
                          </div>
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Enter price" v-model="form.sku_price">
                              <small class="text-danger" v-if="errors.sku_price">{{ errors.sku_price[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_strategy">
                                <option>Select the competitor strategy</option>
                                <option value="premium">Premium</option>
                                <option value="mid range">Mid range</option>
                                <option value="budget option">Budget option</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_strategy[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create item</button>
  
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
            sku_id:'',
            sku_price:'',
            sku_strategy:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          skus:{},
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
        createItem(){
              axios.post('/api/create-tmprice',this.form)
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
        axios.get('/api/viewtmoffering/'+id)
      .then(({data}) => (this.skus = data))

      },
  

    }
  </script>
  
  <style type="text/css">
  select.form-control{
    color: black;
  }

  label{
    font-size: 14px;
  }
  
  .content-wrapper {
      margin-top: 34px;
  }


  
  </style>
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
                              <input type="text" class="form-control"  placeholder="Demographic e.g women/men" v-model="form.demographic">
                              <small class="text-danger" v-if="errors.demographic">{{ errors.demographic[0] }}</small>
                          </div>
                            
                            
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_id">
                                <option>Select the competitor sku</option>
                                <option :value="sku.id" v-for="sku in skus">{{sku.sku_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_id[0] }}</small>
                          </div>
  


                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter preference and pain points of demographic mentioned" v-model="form.preference" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.preference">{{ errors.preference[0] }}</small>
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
            demographic:'',
            sku_id:'',
            preference:'',
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
              axios.post('/api/create-tmaudience',this.form)
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
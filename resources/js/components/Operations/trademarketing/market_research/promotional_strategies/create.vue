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
                              <select class="form-select form-control"  v-model="form.competitor_id">
                                <option>Select the competitor</option>
                                <option :value="competitor.id" v-for="competitor in competitors">{{competitor.competitor_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.competitor_id">{{ errors.competitor_id[0] }}</small>
                          </div>
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Enter strategy" v-model="form.strategy">
                              <small class="text-danger" v-if="errors.strategy">{{ errors.strategy[0] }}</small>
                          </div>



                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter a description of the strategy" v-model="form.description" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
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
            competitor_id:'',
            strategy:'',
            description:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          competitors:{},
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
              axios.post('/api/create-tmstrategy',this.form)
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
        axios.get('/api/viewtmcompetitor/'+id)
      .then(({data}) => (this.competitors = data))

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
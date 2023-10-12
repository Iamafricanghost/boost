<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create campaign</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="createCampaign" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Campaign name" v-model="form.campaign_name">
                              <small class="text-danger" v-if="errors.campaign_name">{{ errors.campaign_name[0] }}</small>
                          </div>
                            
  
                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.customer_id">
                                <option>Select the customer</option>
                                <option :value="customer.id" v-for="customer in customers">{{customer.customer_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control"  v-model="form.campaign_lead">
                                <option>Select the campaign lead</option>
                                <option :value="employee.id" v-for="employee in employees">{{employee.name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_lead">{{ errors.campaign_lead[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter the campaign brief" v-model="form.campaign_brief" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.campaign_brief">{{ errors.campaign_brief[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <label for="campaign_start">Campaign start</label>
                              <input type="date" class="form-control" id="campaign_start"  v-model="form.campaign_start">
                              <small class="text-danger" v-if="errors.campaign_start">{{ errors.campaign_start[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <label for="campaign_approx_end">Approx. end of campaign</label>
                              <input type="date" class="form-control" id="campaign_approx_end" v-model="form.campaign_approx_end">
                              <small class="text-danger" v-if="errors.campaign_approx_end">{{ errors.campaign_approx_end[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create campaign</button>
  
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
            campaign_name:'',
            campaign_brief:'',
            customer_id:'',
            campaign_lead:'',
            campaign_start:'',
            campaign_approx_end:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          customers:{},
          employees:{},
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
        createCampaign(){
              axios.post('/api/create-tmcampaign',this.form)
              .then(()=> {
                Reload.$emit('AfterAdd');
                Notification.success()
                this.$refs.form.reset();
              })
              .catch(error => this.errors = error.response.data.errors)
          }
        
      },
      created(){
        let id = localStorage.getItem('user')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
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
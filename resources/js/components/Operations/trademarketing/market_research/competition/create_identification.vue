<template>
  <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create competitor</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="createCompetitor" enctype="multipart/form-data" ref="form">
  
  
                          <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="Competitor name" v-model="form.competitor_name">
                              <small class="text-danger" v-if="errors.competitor_name">{{ errors.competitor_name[0] }}</small>
                          </div>
                            
  
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.campaign_id">
                                <option>Select the campaign</option>
                                <option :value="campaign.id" v-for="campaign in campaigns">{{campaign.campaign_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_id">{{ errors.campaign_id[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter description of criteria used" v-model="form.competitor_brief" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.competitor_brief">{{ errors.competitor_brief[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create competitor</button>
  
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
            competitor_name:'',
            campaign_id:'',
            competitor_brief:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          campaigns:{},
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
        createCompetitor(){
              axios.post('/api/create-tmcompetitor',this.form)
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
        axios.get('/api/viewtmcampaign/'+id)
      .then(({data}) => (this.campaigns = data))

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
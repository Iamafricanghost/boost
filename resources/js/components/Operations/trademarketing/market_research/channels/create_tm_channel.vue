<template>
  <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Channel</h4>
                    <p class="card-description">
                      Channel information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="createChannel" enctype="multipart/form-data" ref="form">
  
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.campaign_id">
                                <option>Select the campaign</option>
                                <option :value="campaign.id" v-for="campaign in campaigns">{{campaign.campaign_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_id">{{ errors.campaign_id[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.country_id">
                                <option>Select the country</option>
                                <option :value="country.id" v-for="country in countries">{{country.country_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.country_id">{{ errors.country_id[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.channel">
                                <option>Select the channel</option>
                                <option value="modern_trade" >Modern trade</option>
                                <option value="general_trade" >General trade</option>
                                <option value="general_and_modern_trade" >Both GT & MT</option>
                              </select>
                                <small class="text-danger" v-if="errors.channel">{{ errors.channel[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <textarea type="text" class="form-control"  placeholder="Enter any other description for channel" v-model="form.channel_description" rows="5"></textarea>
                              <small class="text-danger" v-if="errors.channel_description">{{ errors.channel_description[0] }}</small>
                          </div>
  
                        <button type="submit" class="btn btn-primary me-2 btn-sm">Add channel</button>
  
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
            campaign_id:'',
            country_name:'',
            channel:'',
            channel_description:'',
            userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          campaigns:{},
          countries:{},
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
        createChannel(){
              axios.post('/api/create-tmchannel',this.form)
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

      axios.get('/api/country')
      .then(({data}) => (this.countries = data))


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
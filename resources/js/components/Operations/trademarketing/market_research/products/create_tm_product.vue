<template>
  <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Link product</h4>
                    <p class="card-description">
                      Basic information
                    </p>
                    
                    <form class="forms-sample row g-3" @submit.prevent="linkProduct" enctype="multipart/form-data" ref="form">
  
                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.campaign_id">
                                <option>Select the campaign</option>
                                <option :value="campaign.id" v-for="campaign in campaigns">{{campaign.campaign_name}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.campaign_id">{{ errors.campaign_id[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <select class="form-select form-control"  v-model="form.sku_id">
                                <option>Select the product</option>
                                <option :value="sku.id" v-for="sku in skus">{{sku.product_variant+' | '+sku.product_sku}}</option>
                              </select>
                                <small class="text-danger" v-if="errors.sku_id">{{ errors.sku_id[0] }}</small>
                          </div>
  
                      <button type="submit" class="btn btn-primary me-2 btn-sm">Create link</button>
  
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
            sku_id:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          campaigns:{},
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
        linkProduct(){
              axios.post('/api/create-tmproduct',this.form)
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
        axios.get('/api/viewtmcampaign/'+id)
      .then(({data}) => (this.campaigns = data))

      axios.get('/api/viewskus/'+id)
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
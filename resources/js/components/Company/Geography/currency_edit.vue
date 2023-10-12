<template>
    <div class="content-wrapper">
<div class="row">
    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link to="/currency">Add currency</router-link></li>
                        </ol>
                </nav>
</div>
<div class="row g-3">
            <div class="col-md-8 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update currency</h4>
                  <p class="card-description">
                    Basic information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="updateCurrency" enctype="multipart/form-data">
                    <div class="col-md-6">
                            <input type="text" class="form-control" id="currency_name" placeholder="Currency name" v-model="form.currency_name">
                            <small class="text-danger" v-if="errors.currency_name">{{ errors.currency_name[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="currency_abbr" placeholder="Currency abbreviation" v-model="form.currency_abbr">
                            <small class="text-danger" v-if="errors.currency_abbr">{{ errors.currency_abbr[0] }}</small>
                        </div>
                  

                    <button type="submit" class="btn btn-primary me-2">Update currency</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</template>

<script type="text/javascript">
import axios from 'axios'


  export default{
    created(){
        if(!User.loggedIn()){
          this.$router.push({name:'/'})
        };
    },
    data(){
      return {
        form: {
          currency_name:'',
          currency_abbr:'',
        },
        errors:{}
      }
    },
    created(){
        let id = this.$route.params.id
        axios.get('/api/currency/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
    },
    methods:{
      onFileSelected(event){
          let file = event.target.files[0];
          if(file.size > 1048770){
            Notification.image_validation()
          }else{
            let reader = new FileReader();
            reader.onload = event =>{
              this.form.newphoto = event.target.result
            };
            reader.readAsDataURL(file);
          }
      },
      //Method for inserting merchandiser details to the database
      updateCurrency(){
            let id = this.$route.params.id
            axios.patch('/api/currency/'+id,this.form)
            .then(()=> {
              this.$router.push({name: 'currency'})
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
        }
      
    }

  }
</script>

<style type="text/css">

.content-wrapper {
    margin-top: 34px;
}

</style>
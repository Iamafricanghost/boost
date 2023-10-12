<template>
    <div class="content-wrapper">
<div class="row">
    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link to="/country">All countries</router-link></li>
                        </ol>
                </nav>
</div>
        <div class="row g-3">
            <div class="col-md-8 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add country</h4>
                  <p class="card-description">
                    Basic information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="createCountry" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="country_name" placeholder="Country name" v-model="form.country_name">
                            <small class="text-danger" v-if="errors.country_name">{{ errors.country_name[0] }}</small>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="country_abbr" placeholder="Country abbreviation" v-model="form.country_abbr">
                            <small class="text-danger" v-if="errors.country_abbr">{{ errors.country_abbr[0] }}</small>
                        </div>
                        <div class="col-md-4">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.currency_id">
                            <option selected>Select currency</option>
                            <option :value="currency.id" v-for="currency in currencies">{{currency.currency_name}}</option>
                          </select>
                            <small class="text-danger" v-if="errors.currency_id">{{ errors.currency_id[0] }}</small>
                        </div>
                    <button type="submit" class="btn btn-primary me-2">Create country</button>

                  </form>
                </div>
              </div>
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
          country_name:'',
          country_abbr:'',
          currency_id:'',
        },
        errors:{},
        currencies:{}
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
      createCountry(){
            axios.post('/api/country/',this.form)
            .then(()=> {
              this.$router.push({name: 'country'})
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
        }
      
    },
    created(){
    axios.get('/api/currency/')
    .then(({data}) => (this.currencies = data))

  } 

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
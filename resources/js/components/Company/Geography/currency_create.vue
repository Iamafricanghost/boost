<template>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-10 mx-auto">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <li class="breadcrumb-item"><router-link to="/currency">All currency</router-link></li>
              </ol>
            </nav>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-10 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add currency</h4>
                  <p class="card-description">
                    Currency information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="createCurrency" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="currency_name" placeholder="Currency name" v-model="form.currency_name">
                            <small class="text-danger" v-if="errors.currency_name">{{ errors.currency_name[0] }}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="currency_abbr" placeholder="Currency abbreviation" v-model="form.currency_abbr">
                            <small class="text-danger" v-if="errors.currency_abbr">{{ errors.currency_abbr[0] }}</small>
                        </div>

                    

                  

                    <button type="submit" class="btn btn-primary me-2">Create Currency</button>

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
          currency_name:'',
          currency_abbr:'',

        },
        errors:{}
      }
    },
    methods:{

      //Method for inserting merchandiser details to the database
      createCurrency(){
            axios.post('/api/currency/',this.form)
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
select.form-control{
  color: black;
}

.content-wrapper {
    margin-top: 34px;
}

</style>
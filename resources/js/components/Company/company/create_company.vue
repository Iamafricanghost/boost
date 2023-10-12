<template>
    <div class="content-wrapper">
<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
            <li class="breadcrumb-item" @click="$router.go(-1)">Back</li>
        </ol>
    </nav>
</div>
        <div class="row g-3">
            <div class="col-md-8 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create company</h4>
                  <p class="card-description">
                    Basic information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="createCompany" enctype="multipart/form-data">

                    <div class="col-md-4">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.country_id">
                            <option selected>Select country</option>
                            <option :value="country.id" v-for="country in countries">{{country.country_name}}</option>
                          </select>
                            <small class="text-danger" v-if="errors.country_id">{{ errors.country_id[0] }}</small>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="company_name" placeholder="Company name" v-model="form.company_name">
                            <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
                        </div>
                        <div class="col-md-4">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.legal_type">
                            <option selected>Select type</option>
                            <option value="partnership">Partnership</option>
                            <option value="corporation">Corporation</option>
                            <option value="sole_proprietorship">Sole proprietorship</option>
                          </select>
                            <small class="text-danger" v-if="errors.legal_type">{{ errors.legal_type[0] }}</small>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" id="company_email" placeholder="Email" v-model="form.company_email">
                            <small class="text-danger" v-if="errors.company_email">{{ errors.company_email[0] }}</small>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" id="company_phone" placeholder="Phone" v-model="form.company_phone">
                            <small class="text-danger" v-if="errors.company_phone">{{ errors.company_phone[0] }}</small>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="tin" placeholder="Tax identification number" v-model="form.tin">
                            <small class="text-danger" v-if="errors.tin">{{ errors.tin[0] }}</small>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="address" placeholder="Physical address" v-model="form.address">
                            <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                        </div>

                        <div class="col-md-4">
                            <input type="file" class="form-control" @change="onFileSelected">
                        </div>

                        <div class="col-md-4">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>

                    

                  

                    <button type="submit" class="btn btn-primary me-2">Create Merchandiser</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</template>

<script type="text/javascript">

  export default{

    beforeCreate(){
      axios.get('/api/country/')
    .then(({data}) => (this.countries = data))
    },
    created(){



        if(!User.loggedIn()){
          this.$router.push({name:'/'})
        }



    },
    data(){
      return {
        form: {
          country_id:'',
          company_name:'',
          legal_type:'',
          company_email:'',
          company_phone:'',
          tin:'',
          address:'',
          photo:'',
          userName:'',
        },
        errors:{},
        countries:[],
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
      createCompany(){
            axios.post('/api/create-company/',this.form)
            .then(()=> {
              this.$router.push({name: 'company'})
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
        }
      
    },
    created(){
      return this.form.userName = localStorage.getItem("user")
    },

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
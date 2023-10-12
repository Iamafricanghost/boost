<template>
<div class="content-wrapper">
  <div class="container">
    <nav aria-label="breadcrumb mx-auto">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                          <li class="breadcrumb-item"><router-link to="/organs">Organs</router-link></li>
                      </ol>
              </nav>
</div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign organ</h4>
                  <p class="card-description">
                    Basic information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="assignOrgan" enctype="multipart/form-data">


                    <div class="col-md-6">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.organ_id">
                            <option selected>Select an organ</option>
                            <option :value="organ.id" v-for="organ in organs">{{organ.title}}</option>
                          </select>
                            <small class="text-danger" v-if="errors.organ_id">{{ errors.organ_id[0] }}</small>
                    </div>

                    <div class="col-md-6">
                          <select class="form-select form-control" aria-label="Default select example" v-model="form.company_id">
                            <option selected>Select company</option>
                            <option :value="company.id" v-for="company in companies">{{company.company_name}}</option>
                          </select>
                            <small class="text-danger" v-if="errors.company_id">{{ errors.company_id[0] }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Assign organ</button>

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
    //   axios.get('/api/country/')
    // .then(({data}) => (this.countries = data))
    },
    created(){
        if(!User.loggedIn()){
          this.$router.push({name:'/'})
        }
    },
    created(){
      return this.form.userName = localStorage.getItem("user")
    },
    created(){
      this.allOrgans();
      this.allCompanies();
    },
    data(){
      return {
        form: {
          organ_id:'',
          company_id:'',
          userName: localStorage.getItem('user'),
        },
        errors:{},
        companies:[],
        organs:{},
      }
    },
    methods:{
      allOrgans(){
        let id = localStorage.getItem('user')
          axios.get('/api/vieworgans/'+id)
          .then(({data})=>(this.organs = data))
          .catch()
      },
      allCompanies(){
        let id = localStorage.getItem('user')
          axios.get('/api/viewcompany/'+id)
          .then(({data})=>(this.companies = data))
          .catch()
      },
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
      assignOrgan(){
            axios.post('/api/assign-organ/',this.form)
            .then(()=> {
              this.$router.push({name: 'organs'})
              Notification.success();
            })
            .catch(error => this.errors = error.response.data.errors)
        }
      
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
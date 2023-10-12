<template>
<div class="col-md-4 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create organ</h4>
                  <p class="card-description">
                    Basic information
                  </p>
                  <form class="forms-sample row g-3" @submit.prevent="createOrgan" enctype="multipart/form-data" ref="form">


                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title" placeholder="Organ title" v-model="form.title">
                            <small class="text-danger" v-if="errors.title">{{ errors.title[0] }}</small>
                        </div>

                    <button type="submit" class="btn btn-primary me-2">Create organ</button>

                  </form>
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

    //           Reload.$on('AfterAdd',() =>{
    //   this.allItems();
    // });


    },
    data(){
      return {
        form: {
          title:'',
          userName:'',
        },
        errors:{},
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
      createOrgan(){
            axios.post('/api/create-organ/',this.form)
            .then(()=> {
              Reload.$emit('AfterAdd');
              Notification.success()
              this.$refs.form.reset();
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
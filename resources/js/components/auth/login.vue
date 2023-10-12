<template>
  <div>
  
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img :src="'./backend/images/logo.png'" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <form class="pt-3" @submit.prevent="login">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" v-model="form.email">
                    <!-- <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small> -->
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" v-model="form.password">
                    <!-- <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small> -->
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>
  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      
  </div>
  
  </template>
  
  <script>
  
      export default {
        created(){
            if(User.loggedIn()){
              this.$router.push({name:'home'})
            }
        },
        data(){
          return{
            form:{
              email:null,
              password:null
            },
            errors:{}
          }
        },
        methods:{
            login(){
              axios.post('/api/auth/login',this.form)
              .then(res => {
                User.responseAfterLogin(res)
                Toast.fire({
                  icon: 'success',
                  title: 'Signed in successfully'
                })
  
                this.$router.push({name:'home'})
  
              })
              .catch(error =>this.errors = error.response.data.errors)
              .catch(
                    Toast.fire({
                      icon: 'warning',
                      title: 'Invalid Email or Password'
                    })        
                )
            }
        }
      }
  </script>
  
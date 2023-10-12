<template>
        <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img :src="'./backend/images/logo.png'" alt="logo">
              </div>
              <h4>We are happy to have you</h4>
              <h6 class="fw-light">Just few details about you ...</h6>
              <form class="pt-3"  @submit.prevent="signup" >
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Full Name" v-model="form.name">
                  <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" v-model="form.email">
                  <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="phone" placeholder="Phone" v-model="form.phone">
                  <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="company_name" placeholder="Company Name" v-model="form.company_name">
                  <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="company_reg" placeholder="Company Tax ID" v-model="form.company_reg">
                  <small class="text-danger" v-if="errors.company_reg">{{ errors.company_reg[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" v-model="form.password">
                  <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm Password" v-model="form.password_confirmation">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <router-link to="/forget_password" class="auth-link text-black">Forgot password?</router-link>
                </div>

                <div class="text-center mt-4 fw-light">
                  Already a member ? <router-link to="/" class="text-primary">Log in</router-link>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script type="text/javascript">

      export default{
        created(){
            if(User.loggedIn()){
              this.$router.push({name:'home'})
            }
        },
        data(){
          return {
            form: {
              name:null,
              email:null,
              phone:null,
              company_name:null,
              company_reg:null,
              password:null,
              confirm_password:null
            },
            errors:{}
          }
        },
        methods:{
          signup(){
            axios.post('/api/auth/signup', this.form)
            .then(res => {
              User.responseAfterLogin(res)
              Toast.fire({
                icon: 'success',
                title: 'Registered successfully. Someone will be in contact'
              })
              this.$router.push({name:'home'})
            })
            .catch(error => this.errors = error.response.data.errors)
           
          }
        }
      }
</script>

<style type="text/css">

</style>
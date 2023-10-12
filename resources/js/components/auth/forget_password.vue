<template>
    
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img :src="'./backend/images/logo.png'" alt="logo">
              </div>
              <h4>Sorry for that!</h4>
              <h6 class="fw-light">Could you help us with the registered email ? </h6>
              <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email">
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">Reset Password</a>
                </div>

                <div class="text-center mt-4 fw-light">
                  Changed your mind? <router-link to="/" class="text-primary">Home</router-link>
                </div>


              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script type="text/javascript">

</script>

<style type="text/css">

</style>
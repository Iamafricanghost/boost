<template>
  <div class="content-wrapper">
    <nestednav></nestednav>
    <div class="container">
      <div class="row g-3">
          <div class="col-md-12 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product information</h4>
                <p class="card-description">
                  Click each tab to view details. Setup once and use same information through out boost
                </p>

                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#productcategory" type="button" role="tab" >Categories</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#product_subcategories" type="button" role="tab" >Subcategories</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#product_brands" type="button" role="tab" >Brands</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#product_variants" type="button" role="tab" >Variants</button>
                          <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#product_skus" type="button" role="tab" >Skus</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                          <productcategory></productcategory>
                          <product_subcategory></product_subcategory>
                          <product_brand></product_brand>
                          <product_variant></product_variant>
                          <product_sku></product_sku>

                        
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" >contact</div>
                      </div>
                                          
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import axios from 'axios'
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import productcategory from '../productcategory/view_categories.vue';
import product_subcategory from '../subcategory/view_subcategories.vue';
import product_brand from '../brands/view_brands.vue';
import product_variant from '../variants/view_variants.vue';
import product_sku from '../skus/view_skus.vue';

export default{
  components:{
    'nestednav':nestednav,
    'productcategory':productcategory,
    'product_subcategory':product_subcategory,
    'product_brand':product_brand,
    'product_variant':product_variant,
    'product_sku':product_sku,
  },

  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
            project_name:'',
            project_brief:'',
            customer_id:'',
            project_lead:'',
            userName: localStorage.getItem('user'),
          },
          errors:{},
          customers:{},
          employees:{},
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-tmproject/'+id)
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
    //Method for inserting employee details to the database
    updateProject(){
          let id = this.$route.params.id
          axios.put('/api/update-tmproject/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'trade-marketing'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
  },
  beforeCreate(){
    let id = localStorage.getItem('user')
        axios.get('/api/viewcustomers/'+id)
      .then(({data}) => (this.customers = data))

      axios.get('/api/viewemployees/'+id)
      .then(({data}) => (this.employees = data))
  },


}
</script>

<style type="text/css" scoped>

.content-wrapper {
  margin-top: 34px;
}


button:not(:disabled), [type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled) {
    font-size: 12px;
}

</style>
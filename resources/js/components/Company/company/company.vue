<template>
    <div class="content-wrapper" >
     

        <div class="container mt-3">
          <div class="row row-cols-1 row-cols-md-4">
          <div class="col mb-4">
              <div class="card h-100">
                <div class="card-header border-success">Step 1.</div>
                <div class="card-body">
                  <h5 class="card-title">Create</h5>
                  <p class="card-text">Click link in footer to create company</p>
                </div>
                <div class="card-footer border-success">
                  <router-link to="/create-company" class="btn btn-danger btn-sm">Create</router-link>
                </div>
              </div>
          </div>

          <div class="col mb-4">
              <div class="card h-100">
                <div class="card-header border-success">Step 2.</div>
                <div class="card-body">
                  <h5 class="card-title">Manage</h5>
                  <p class="card-text">Click link in footer to manage companies</p>
                </div>
                <div class="card-footer border-success">
                  <router-link to="/view-companies" class="btn btn-danger btn-sm">View</router-link>
                </div>
              </div>
          </div>


        </div>



        
        </div>

    </div>
</template>

<script type="text/javascript">
import axios from 'axios';


  export default{

    created(){
        if(!User.loggedIn()){
          this.$router.push({name:'/'})
        };
        this.allCurrency();
    },
    data(){
        return{
          currencies:[],
            searchTerm:'',
        }
    },
    computed:{
        filtersearch(){
            return this.currencies.filter(currency =>{
                return currency.currency_name.match(this.searchTerm)
            })
        }
    },
    methods:{
      allCurrency(){
            axios.get('/api/currency')
            .then(({data})=>(this.currencies = data))
            .catch()
        },
        deleteCurrency(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#34B1AA',
                cancelButtonColor: '#F95F53',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                        // Pass your code here 
                    axios.delete('/api/currency/'+id)
                    .then(()=>{
                        this.currencies = this.currencies.filter(currency =>{
                            return currency.id != id
                        })
                    })
                    .catch(()=> {
                        this.$router.push({name: 'currency'})
                    })

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
                //End of sweet alert
        }
    },


  };


</script>

<style type="text/css">

/* .content-wrapper {
    margin-top: 34px;
} */

</style>
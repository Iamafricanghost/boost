<template>
    <div class="content-wrapper" >
     

        <div class="container mt-5"> 
          <div class="row">

          <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Countries</h4>
                        <div class="media">
                          <i class="ti-world icon-sm text-success d-flex align-self-start me-3"></i>
                          <div class="media-body">
                            <p class="card-text"><strong>View:</strong> All countries of the world</p>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <router-link to="/country" class="btn btn-sm btn-success form-control">View</router-link>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Rwanda</h4>
                        <div class="media">
                          <i class="ti-location-pin icon-sm text-danger d-flex align-self-start me-3"></i>
                          <div class="media-body">
                            <p class="card-text"><strong>View:</strong> Rwanda's administrative layout</p>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <router-link to="/rwandaprovinces" class="btn btn-sm btn-danger form-control">View</router-link>
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
            searchTerm:''
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
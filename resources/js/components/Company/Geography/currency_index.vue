<template>
    <div class="content-wrapper" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                    <li class="breadcrumb-item"><router-link to="/store-currency">Add currency</router-link></li>
                </ol>
             </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Currency list</h4>
                  <p class="card-description">
                    Use navigation at the top | <span class="text-success">Use actions column for each currency</span>
                  </p>
                  <input type="text" placeholder="Search currency here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Currency name</th>
                          <th>Abbreviation</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="currency in filtersearch" :key="currency.id">

                          <td>
                           {{ currency.currency_name }}
                          </td>
                          <td>
                            {{ currency.currency_abbr }}
                          </td>
                          <td>
                            <router-link :to="{ name: 'edit-currency' , params:{id:currency.id} }" class="btn btn-primary btn-sm" >Edit</router-link>
                            <button type="button" class="btn btn-danger btn-sm" @click="deleteCurrency(currency.id)">Del</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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


  }
</script>

<style type="text/css">

.content-wrapper {
    margin-top: 34px;
}

</style>
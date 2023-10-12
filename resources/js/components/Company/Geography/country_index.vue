<template>
    <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                    <li class="breadcrumb-item"><router-link to="/geography">Back</router-link></li>
                </ol>
             </nav>
          </div>


             <div class="col-lg-10 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Country list</h4>
                  <p class="card-description">
                    Use navigation at the top | <span class="text-success">Use actions column for each country</span>
                  </p>
                  <input type="text" placeholder="Search name here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                  <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                      <thead>
                        <tr>
                          <th>Country</th>
                          <th>Currency</th>
                          <th>ISO code</th>
                          <th>Fractional unit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="country in filtersearch" :key="country.id">

                          <td>
                           {{ country.country_name }}
                          </td>
                          <td>
                            {{ country.currency }}
                          </td>
                          <td>
                            {{ country.iso_code }}
                          </td>

                          <td>
                            {{ country.fractional_unit }}
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
        this.allCountry();
    },
    data(){
        return{
          countries:[],
          searchTerm:'',
        }
    },
    computed:{
        filtersearch(){
            return this.countries.filter(country =>{
                return country.country_name.match(this.searchTerm)
            })
        }
    },
    methods:{
      allCountry(){
            axios.get('/api/country')
            .then(({data})=>(this.countries = data))
            .catch()
        },
        deleteCountry(id){
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
                    axios.delete('/api/country/'+id)
                    .then(()=>{
                        this.countries = this.countries.filter(country =>{
                            return country.id != id
                        })
                    })
                    .catch(()=> {
                        this.$router.push({name: 'country'})
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

/* .table td{
  padding: 5px;
} */

</style>
<template>
          <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Cells list</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each company</span>
                </p>
                <input type="text" placeholder="Search name here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Logo</th>
                        <th>Company name</th>
                        <th>Country</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Tin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td >
                          <img :src="item.logo" alt="Company logo"/>
                        </td>
                        <td>
                         {{ item.company_name }}
                        </td>
                        <td>
                         {{ item.country_name }}
                        </td>
                        <td>
                         {{ item.legal_type }}
                        </td>
                        <td>
                         {{ item.company_phone }}
                        </td>
                        <td>
                         {{ item.tin }}
                        </td>
                        <td>
                          <router-link :to="{ name: 'edit-company' , params:{id:item.id} }" class="btn btn-primary btn-sm" >Edit</router-link>
                          
                          <button type="button" class="btn btn-danger btn-sm" @click="deleteCompany(item.id)">Del</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Button trigger modal -->

          </div>


</template>

<script type="text/javascript">

export default{

  beforeCreate(){
    
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
      this.allItems();

      Reload.$on('AfterAdd',() =>{
        this.allItems();
      
    }); 

  },
  data(){
      return{
          items:[],
          searchTerm:'',
      }
  },
  computed:{
      filtersearch(){
          return this.items.filter(item =>{
              return item.company_name.match(this.searchTerm)
          })
      }
  },
  methods:{
      allItems(){
        let id = localStorage.getItem('company_name');
          axios.get('/api/viewcompany/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteCompany(id){
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
                  axios.delete('/api/deletecompany/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'view-companies'})
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
select.form-control{
  color: black;
}

.content-wrapper {
    margin-top: 34px;
}

</style>
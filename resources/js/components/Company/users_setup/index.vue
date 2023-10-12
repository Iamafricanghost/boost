<template>
          <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Permissions for users</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each user</span>
                </p>
                <input type="text" placeholder="Search role here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>company</th>
                        <th>Company TIN</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td>
                         {{ item.name }}
                        </td>
                        <td>
                         {{ item.email }}
                        </td>
                        <td>
                         {{ item.phone }}
                        </td>
                        <td>
                         {{ item.company_name }}
                        </td>
                        <td>
                         {{ item.company_reg }}
                        </td>
                        <td>
                         {{ item.role }}
                        </td>
                        <td>
                         {{ item.status }}
                        </td>
                        <td>
                         {{ item.created_at | myDate }}
                        </td>
                        <td>
                          <router-link :to="{ name: 'edit-user' , params:{id:item.id} }" class="btn btn-primary btn-xs" >Edit</router-link>
                          <button type="button" class="btn btn-danger btn-xs" @click="deletePermission(item.id)">Del</button>
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
          details:[],
      }
  },
  computed:{
      filtersearch(){
          return this.items.filter(item =>{
              return item.company_reg.match(this.searchTerm)
          })
      }
  },
  methods:{
      allItems(){
          let id = localStorage.getItem('company_reg')
          axios.get('/api/view-users/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deletePermission(id){
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
                  axios.delete('/api/deletepermission/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'viewpermission', params:{id: this.$route.params.id}})
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
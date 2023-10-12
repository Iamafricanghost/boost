<template>
          <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Roles</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each Role</span>
                </p>
                <input type="text" placeholder="Search role here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>#</th>
                        <th>Role name</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td>
                         {{ item.id }}
                        </td>
                        <td>
                         {{ item.role_name }}
                        </td>
                        <td>
                         {{ item.created_at | myDate}}
                        </td>
                        <td>
                          <router-link :to="{ name: 'edit-role' , params:{id:item.id} }" class="btn btn-primary btn-xs" >Edit</router-link>
                          <button type="button" class="btn btn-danger btn-xs" @click="deleteRole(item.id)">Del</button>
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
    //
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
          details:[],
      }
  },
  computed:{
      filtersearch(){
          return this.items.filter(item =>{
              return item.role_name.match(this.searchTerm)
          })
      }
  },
  methods:{
    organDetails(){

      let id = this.userName

      // axios.get('/api/leads/'+id)
      //     .then(({data})=>(this.details = data))
      //     .catch()
        
    },
      allItems(){
          axios.get('/api/roles/')
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteRole(id){
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
                  axios.delete('/api/roles/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'leads'})
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
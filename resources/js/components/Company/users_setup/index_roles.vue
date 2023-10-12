<template>
<div class="content-wrapper">
  <div class="row mt-5" >
    <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Roles list</h4>
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
                          <router-link :to="{ name: 'viewpermission' , params:{id:item.role_name} }" class="btn btn-dark btn-xs" >View</router-link>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



            <!-- Button trigger modal -->

          </div>
  </div>

  <!-- <div class="container" v-else="this.routeCheck=false">
        <div class="row">
          <div class="col-md-6 mx-auto mt-5">
            <div class="alert alert-dark" role="alert">
                <h4 class="alert-heading">Warning!</h4>
                <p>Oh No!, you are trying to access a page that you do not have permissions for</p>
                <hr>
                <p class="mb-0">Kindly <router-link to="/home" class="alert-link">click here</router-link> to access home page or use the sidebar on the right</p>
              </div>
          </div>
        </div>
      
      </div> -->
</div>


</template>

<script type="text/javascript">

export default{

  created(){

    if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
      
    // let userName = localStorage.getItem('user');
    // let pathName = this.$route.path;


    this.allItems();
    Reload.$on('AfterAdd',() =>{
      this.allItems();
  }); 

    // this.$router.push({name:'/'})

    // axios.get('/api/confirmation/'+userName+pathName)
    //       .then(({data})=>{
    //         this.confirmation = data;

    //         if(this.confirmation === 'confirmed'){
    //             this.routeCheck=true;
    //             this.allItems();
    //               Reload.$on('AfterAdd',() =>{
    //                 this.allItems();
                  
    //             }); 
    //         }else{
    //           this.routeCheck=true;
    //         }
    //       })
  },

  mounted(){

  },


  data(){
      return{
          items:[],
          searchTerm:'',
          details:[],
          confirmation:'',
        routeCheck:false,
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
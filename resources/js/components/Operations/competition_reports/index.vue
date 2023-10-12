<template>
          <div class="col-lg-8 grid-margin stretch-card" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Trade marketing projects</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each project</span>
                </p>
                <input type="text" placeholder="Search customer name here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>Project</th>
                        <th>Customer</th>
                        <th>Lead</th>
                        <th>Brief</th>
                        <th>Created</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td >
                         {{ item.project_name }}
                        </td>
                        <td>
                         {{ item.customer_name }}
                        </td>
                        <td>
                         {{ item.name }}
                        </td>
                        <td class="text-truncate" style="max-width: 150px;">
                         {{ item.project_brief }}
                        </td>
                        <td>
                         {{ item.created_at }}
                        </td>
                        <td>
                          <router-link :to="{ name: 'view-project-competition-report' , params:{id:item.id} }" class="btn btn-primary btn-xs" >Report</router-link>
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
              return item.customer_name.match(this.searchTerm)
          })
      }
  },
  methods:{
      allItems(){
        let id = localStorage.getItem('user')
          axios.get('/api/viewtmprojects/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteProject(id){
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
                  axios.delete('/api/deletetmproject/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'trade-marketing'})
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
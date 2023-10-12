<template>
          <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card" >
              <div class="card-body">
                <h4 class="card-title">Employees</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each sister company</span>
                </p>
                <input type="text" placeholder="Search employee ID/Passport number here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>ID/Passport</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Joining date</th>
                          <th>Salary</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="employee in filtersearch" :key="employee.id">
                          <td class="py-1">
                            <img :src="employee.photo" alt="employee image"/>
                          </td>
                          <td>
                           {{ employee.id_number }}
                          </td>
                          <td>
                           {{ employee.name }}
                          </td>
                          <td>
                            {{ employee.phone }}
                          </td>
                          <td>
                            {{ employee.email }}
                          </td>
                          <td>
                            {{ employee.joining_date }}
                          </td>
                          <td>
                            {{ employee.salary }}
                          </td>
                          <td>
                            <router-link :to="{ name: 'edit-employee' , params:{id:employee.id} }" class="btn btn-primary btn-sm" >Edit</router-link>
                            <button type="button" class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)">Del</button>
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
    return this.userName = localStorage.getItem('user');
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
              return item.id_number.match(this.searchTerm)
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
        let id = localStorage.getItem('company_name')
          axios.get('/api/viewemployees/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteEmployee(id){
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
                  axios.delete('/api/deleteemployee/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'sister'})
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
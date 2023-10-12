<template>
  <div class="content-wrapper">
      <div class="row">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                  <li class="breadcrumb-item" @click="$router.go(-1)">Cells</li>
              </ol>
           </nav>
      </div>

      <div class="row">
          <div class="col-lg-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Streets list</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each street</span>
                </p>
                <input type="text" placeholder="Search name here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Cell</th>
                        <th>Street</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td >
                          {{ item.cell_name }}
                        </td>
                        <td>
                         {{ item.street_number }}
                        </td>
                        <!-- <td> -->
                          <!-- <router-link :to="{ name: 'view-streets' , params:{id:item.id} }" class="btn btn-primary btn-sm" >Streets</router-link> -->
                          <!-- <button type="button" class="btn btn-danger btn-sm" @click="deleteEmployee(item.id)">Del</button> -->
                        <!-- </td> -->
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
      this.allItems();
  },
  data(){
      return{
          items:[],
          searchTerm:''
      }
  },
  computed:{
      filtersearch(){
          return this.items.filter(item =>{
              return item.cell_name.match(this.searchTerm)
          })
      }
  },
  methods:{
      allItems(){
        let id = this.$route.params.id
          axios.get('/api/viewstreets/'+id)
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
                  axios.delete('/api/employee/'+id)
                  .then(()=>{
                      this.employees = this.employees.filter(employee =>{
                          return employee.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'employee'})
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
<template>
          <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Brand ambassadors</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each sister company</span>
                </p>
                <input type="text" placeholder="Search id / passport number here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>BA Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>ID/ Passport</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Look & feel</th>
                        <th>Residence</th>
                        <th>English</th>
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
                         {{ item.gender }}
                        </td>
                        <td>
                         {{ item.id_number }}
                        </td>
                        <td>
                         {{ item.phone }}
                        </td>
                        <td>
                         {{ item.age }}
                        </td>
                        <td>
                         {{ item.look_feel }}
                        </td>
                        <td>
                         {{ item.residence }}
                        </td>
                        <td>
                          {{ item.english_fluency }}
                        </td>

                        <td>
                          <router-link :to="{ name: 'edit-ambassador' , params:{id:item.id} }" class="btn btn-primary btn-sm" >Edit</router-link>
                          <button type="button" class="btn btn-danger btn-sm" @click="deleteAmbassador(item.id)">Del</button>
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
        let id = this.userName
          axios.get('/api/viewambassadors/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteAmbassador(id){
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
                  axios.delete('/api/deleteambassador/'+id)
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
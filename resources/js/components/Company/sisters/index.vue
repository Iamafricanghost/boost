<template>
          <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sister companies</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each sister company</span>
                </p>
                <input type="text" placeholder="Search relation type here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>Company name</th>
                        <th>Relation type</th>
                        <th>Office address</th>
                        <th>Contact name</th>
                        <th>Contact level</th>
                        <th>Contact phone</th>
                        <th>Contact email</th>
                        <th>Tin</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td>
                         {{ item.company_name }}
                        </td>
                        <td>
                         {{ item.relation_type }}
                        </td>
                        <td>
                         {{ item.office_address }}
                        </td>
                        <td>
                         {{ item.contact_name }}
                        </td>
                        <td>
                         {{ item.contact_level }}
                        </td>
                        <td>
                         {{ item.contact_phone }}
                        </td>
                        <td>
                         {{ item.contact_email }}
                        </td>
                        <td>
                          {{ item.tin }}
                        </td>

                        <td>
                          <router-link :to="{ name: 'edit-sister' , params:{id:item.id} }" class="btn btn-primary btn-sm" >Edit</router-link>
                          <button type="button" class="btn btn-danger btn-sm" @click="deleteSister(item.id)">Del</button>
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
              return item.relation_type.match(this.searchTerm)
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
          axios.get('/api/viewsisters/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteSister(id){
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
                  axios.delete('/api/deletesister/'+id)
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
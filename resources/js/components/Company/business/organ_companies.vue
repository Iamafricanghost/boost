<template>
<div class="content-wrapper">
  <div class="container">
    <div class="row">
  <nav aria-label="breadcrumb mx-auto">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                          <li class="breadcrumb-item"><router-link to="/organs">Organs</router-link></li>
                      </ol>
              </nav>
</div>
    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card mx-auto" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Company details</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each company</span>
                </p>
                <input type="text" placeholder="Search name here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Company name</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td>
                         {{ item.title }}
                        </td>
                        <td>
                         {{ item.company_name }}
                        </td>
                        <td>
                          <!-- <router-link :to="{ name: 'edit-organ' , params:{id:item.id} }" class="btn btn-primary btn-sm" >Edit</router-link> -->
                          <button type="button" class="btn btn-danger btn-sm" @click="deleteAssign(item.id)">Del</button>
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
  </div>
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
        let id = this.$route.params.id
          axios.get('/api/vieworgandetails/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteAssign(id){
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
                  axios.delete('/api/deleteorganassignment/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'organs'})
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
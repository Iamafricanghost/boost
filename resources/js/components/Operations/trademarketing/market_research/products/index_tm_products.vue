<template>
          <div class="col-lg-8 grid-margin stretch-card" >
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Trade marketing products</h4>
                <p class="card-description">
                  Use navigation at the top | <span class="text-success">Use actions column for each product</span>
                </p>
                <input type="text" placeholder="Search campaign here.." class="form-control" style="width: 300px;" v-model="searchTerm"> 
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead> 
                      <tr>
                        <th>Campaign</th>
                        <th>Photo</th>
                        <th>Product</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in filtersearch" :key="item.id">
                        <td >
                         {{ item.campaign_name }}
                        </td>
                        <td class="py-1">
                            <img :src="item.photo" alt="sku image"/>
                        </td>
                        <td class="text-truncate" style="max-width: 150px;">
                         {{  item.product_variant+' ~ '+item.product_sku }}
                        </td>
                        <td>
                          <router-link :to="{ name: 'edit-tm-product' , params:{id:item.id} }" class="btn btn-primary btn-xs" >Edit</router-link>
                          <button type="button" class="btn btn-danger btn-xs" @click="deleteProduct(item.id)">Del</button>
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
              return item.campaign_name.match(this.searchTerm)
          })
      }
  },
  methods:{
      allItems(){
        let id = localStorage.getItem('company_name')
          axios.get('/api/viewtmproducts/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteProduct(id){
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
                  axios.delete('/api/deletetmproduct/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'tm-objectives'})
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
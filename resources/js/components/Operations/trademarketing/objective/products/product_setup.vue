<template>
<div class="">
        <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#product_setup">
        Product setup
      </button>
      <!-- Modal -->
      <div class="modal fade" id="product_setup" tabindex="-1" aria-labelledby="product_setup" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="product_setup">Product setup</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card">
                      <div class="card-body">
                        <p class="card-description">
                          Setup products once in a central location and use it multiple times
                        </p>
                        <p>
                          To create a product or add an sku to an already existing variant, click on the link in the footer. Otherwise click on X above to cancel
                        </p>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary me-2" :href="'/products'">Setup product</a>
            </div>
          </div>
        </div>
      </div>
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
          axios.get('/api/viewtmcampaign/'+id)
          .then(({data})=>(this.items = data))
          .catch()
      },
      deleteCampaign(id){
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
                  axios.delete('/api/deletetmcampaign/'+id)
                  .then(()=>{
                      this.items = this.items.filter(items =>{
                          return items.id != id
                      })
                  })
                  .catch(()=> {
                      this.$router.push({name: 'trade-objectives'})
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
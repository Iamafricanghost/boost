<template>
<div class="">
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#data_collection">
  Data Collection
</button>
<!-- Modal -->
<div class="modal fade" id="data_collection" tabindex="-1" aria-labelledby="data_collection" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="data_collection">Data Collection</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
                <div class="card-body">
                  <p class="card-description">
                    KPI type
                  </p>
                  <p>
                    Number of customer data points collected (email addresses, demographics, etc.).Quality and accuracy of collected data.
                  </p>
                </div>
              </div>
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
<template>
  <div class="content-wrapper">
    <nestednav v-if="this.userRole === 'admin'"></nestednav> 
      <div class="row g-3" v-if="this.userRole === 'admin'">
          <div class="col-md-6 grid-margin stretch-card mx-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update ambassador information</h4>
                <p class="card-description">
                  Basic form layout
                </p>
                <form class="forms-sample row g-3" @submit.prevent="updateAmbassador" enctype="multipart/form-data">
                  
                  <div class="col-md-12">
                              <input type="text" class="form-control"  placeholder="BA name" v-model="form.name">
                              <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                          </div>

                          <div class="col-md-12">
                              <input type="email" class="form-control"  placeholder="BA email" v-model="form.email">
                              <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.gender">
                                <option selected>BA Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                                <small class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</small>
                           </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="BA phone number" v-model="form.phone">
                            <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                        </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.phone_type">
                                <option selected>BA phone type</option>
                                <option value="android">Android</option>
                                <option value="ios">IOS</option>
                              </select>
                                <small class="text-danger" v-if="errors.phone_type">{{ errors.phone_type[0] }}</small>
                           </div>
  
                          <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="BA Age" v-model="form.age">
                              <small class="text-danger" v-if="errors.age">{{ errors.age[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.look_feel">
                                <option selected>BA look and feel</option>
                                <option value="A">Class A</option>
                                <option value="B">Class B</option>
                                <option value="C">Class C</option>
                                <option value="D">Class D</option>
                              </select>
                                <small class="text-danger" v-if="errors.look_feel">{{ errors.look_feel[0] }}</small>
                           </div>

                           <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="ID / passport number" v-model="form.id_number">
                              <small class="text-danger" v-if="errors.id_number">{{ errors.id_number[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="BA residence" v-model="form.residence">
                              <small class="text-danger" v-if="errors.residence">{{ errors.residence[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.english_fluency">
                                <option selected>BA english fluency</option>
                                <option value="excellent">Excellent</option>
                                <option value="good">Good</option>
                                <option value="average">Average</option>
                                <option value="bad">Bad</option>
                              </select>
                                <small class="text-danger" v-if="errors.english_fluency">{{ errors.english_fluency[0] }}</small>
                           </div>

  
                          <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="Other languages" v-model="form.languages">
                              <small class="text-danger" v-if="errors.languages">{{ errors.languages[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.education_level">
                                <option selected>BA highest education level</option>
                                <option value="post_graduate">Post graduate</option>
                                <option value="under_graduate">Undergraduate</option>
                                <option value="high_school">Highschool</option>
                                <option value="primary_school">Primary school</option>
                              </select>
                                <small class="text-danger" v-if="errors.education_level">{{ errors.education_level[0] }}</small>
                           </div>
  
                          <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="Relatable work experience" v-model="form.work_experience">
                              <small class="text-danger" v-if="errors.work_experience">{{ errors.work_experience[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="Transferable skills" v-model="form.transferable_skills">
                              <small class="text-danger" v-if="errors.transferable_skills">{{ errors.transferable_skills[0] }}</small>
                          </div>

                          <div class="col-md-8">
                              <input type="text" class="form-control"  placeholder="Reporting capability e.g excel" v-model="form.reporting_capability">
                              <small class="text-danger" v-if="errors.reporting_capability">{{ errors.reporting_capability[0] }}</small>
                          </div>

                          <div class="col-md-4">
                              <select class="form-select form-control" v-model="form.role_applied_for">
                                <option selected>Role applied</option>
                                <option value="ambassador">Brand ambassador</option>
                                <option value="supervisor">Supervisor</option>
                              </select>
                                <small class="text-danger" v-if="errors.role_applied_for">{{ errors.role_applied_for[0] }}</small>
                           </div>

                           <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="Expected salary" v-model="form.expected_salary">
                              <small class="text-danger" v-if="errors.expected_salary">{{ errors.expected_salary[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.recommendation">
                                <option selected>Role recommeded for</option>
                                <option value="ambassador">Brand ambassador</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="none">None</option>
                              </select>
                                <small class="text-danger" v-if="errors.recommendation">{{ errors.recommendation[0] }}</small>
                           </div>

                           <div class="col-md-6">
                              <input type="text" class="form-control"  placeholder="Other remarks" v-model="form.remarks">
                              <small class="text-danger" v-if="errors.remarks">{{ errors.remarks[0] }}</small>
                          </div>

                          <div class="col-md-6">
                              <select class="form-select form-control" v-model="form.general_rating">
                                <option selected>General rating</option>
                                <option value="one">1</option>
                                <option value="two">2</option>
                                <option value="three">3</option>
                                <option value="four">4</option>
                                <option value="five">5</option>
                              </select>
                                <small class="text-danger" v-if="errors.general_rating">{{ errors.general_rating[0] }}</small>
                           </div>


                           <div class="col-md-8">
                            <input type="file" class="form-control" id="photo" placeholder="Photo" @change="onFileSelected">
                        </div>

                        <div class="col-md-4">
                            <img :src="form.photo" alt="" style="height: 40px; width: 40px;">
                        </div>
  
                      <button type="submit" class="btn btn-primary me-2">Update ambassador</button>

                </form>
              </div>
            </div>
          </div>
        </div>

        <not_permitted v-else></not_permitted> 
  </div>
</template>

<script type="text/javascript">
import axios from 'axios';
import nestednav from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/nestednav/nested.vue';
import not_permitted from '/Applications/XAMPP/xamppfiles/htdocs/laravel/boost/resources/js/components/Company/not_permitted.vue';


export default{
  components:{
    'nestednav':nestednav,
    'not_permitted':not_permitted,
  },
  beforeCreate(){
    axios.get('/api/employee/')
      .then(({data}) => (this.employees = data))
  },
  created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      };
  },
  data(){
    return {
      form: {
              name:'',
              email:'',
              gender:'',
              phone:'',
              phone_type:'',
              age:'',
              look_feel:'',
              id_number:'',
              residence:'',
              english_fluency:'',
              languages:'',
              education_level:'',
              work_experience:'',
              transferable_skills:'',
              reporting_capability:'',
              role_applied_for:'',
              expected_salary:'',
              recommendation:'',
              remarks:'',
              general_rating:'',
              photo:'',
              newphoto:'',
              userCompany: localStorage.getItem('company_name'),
          },
          errors:{},
          employees:{},
          userRole: localStorage.getItem('role')
    }
  },
  created(){
      let id = this.$route.params.id
      axios.get('/api/edit-ambassador/'+id)
      .then(({data}) => (this.form = data))
      .catch(console.log('error'))
  },
  methods:{
    onFileSelected(event){
        let file = event.target.files[0];
        if(file.size > 1048770){
          Notification.image_validation()
        }else{
          let reader = new FileReader();
          reader.onload = event =>{
            this.form.newphoto = event.target.result
          };
          reader.readAsDataURL(file);
        }
    },
    //Method for inserting employee details to the database
    updateAmbassador(){
          let id = this.$route.params.id
          axios.put('/api/update-ambassador/'+id,this.form)
          .then(()=> {
            this.$router.push({name: 'brandambassador'}) 
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
      }
    
  }

}
</script>

<style type="text/css">

.content-wrapper {
  margin-top: 34px;
}

</style>
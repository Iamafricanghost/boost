class AppStorage{

    storeToken(token){
        localStorage.setItem('token',token);
    }

    storeUser(user){
        localStorage.setItem('user',user); 
    }

    storeUserid(user_id){
        localStorage.setItem('user_id',user_id); 
    }

    storeEmail(email){
        localStorage.setItem('email',email); 
    }
    
    storeStatus(status){
        localStorage.setItem('status',status); 
    }

    storePhone(phone){
        localStorage.setItem('phone',phone); 
    }

    storeCompanyname(company_name){
        localStorage.setItem('company_name',company_name); 
    }

    storeCompanyreg(company_reg){
        localStorage.setItem('company_reg',company_reg); 
    }

    storeRole(role){
        localStorage.setItem('role',role); 
    }


    





    store(token,user,role,user_id,email,status,phone,company_name,company_reg){
        this.storeToken(token) 
        this.storeUser(user)
        this.storeRole(role)
        this.storeUserid(user_id)
        this.storeEmail(email)
        this.storeStatus(status)
        this.storePhone(phone)
        this.storeCompanyname(company_name)
        this.storeCompanyreg(company_reg)
    }

    clear(){ 
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('role');
        localStorage.removeItem('user_id');
        localStorage.removeItem('email');
        localStorage.removeItem('status');
        localStorage.removeItem('phone');
        localStorage.removeItem('company_name');
        localStorage.removeItem('company_reg');
    }

    getToken(){
        localStorage.getItem(token); 
    }

    getUser(){
        localStorage.getItem(user);
    }

    getRole(){
        localStorage.getItem(role); 
    }

    getUserid(){
        localStorage.getItem(user_id); 
    }

    getEmail(){
        localStorage.getItem(email); 
    }

    getStatus(){
        localStorage.getItem(status); 
    }

    getRole(){
        localStorage.getItem(company_name); 
    }
}

export default AppStorage = new AppStorage();
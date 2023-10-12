// Global management of all user data for login and registration

import Token from "./Token";
import AppStorage from "./AppStorage";

class User{
    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username  = res.data.name 
        const user_id  = res.data.user_id
        const email  = res.data.email
        const status  = res.data.status
        const phone  = res.data.phone
        const company_name  = res.data.company_name
        const role  = res.data.role
        const company_reg  = res.data.company_reg

        if(Token.isValid(access_token)){
            AppStorage.store(access_token,username,role,user_id,email,status,phone,company_name,company_reg) 
        }
    }

    hasToken(){ 
        const storeToken = localStorage.getItem('token');
        if(storeToken){ 
            return Token.isValid(storeToken)? true : false
        }
        false
    }

    loggedIn(){
        return this.hasToken()
    }

    //Name of logged in user
    name(){
        if(this.loggedIn){
            return localStorage.getItem('user');
        }
    }
    id(){
        if(this.loggedIn){
            const payload = Token.payload(localStorage.getItem('token'));
            return payload.sub

        }
        return false
    }
}

export default User = new User();
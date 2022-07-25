import token from './token'
import appstorage from "./appstorage";
class user{
    
    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username = res.data.name

        if (token.isValid(access_token)) {
            appstorage.store(access_token, username)
        }
    }

    hasToken() {
        const storeToken = localStorage.getItem(token);
        if (storeToken) {
            return token.isValid(storeToken) ? true : false
        }
    }

    loggedIn() {
        return this.hasToken()
    }

    name() {
        if (this.loggedIn()) {
            return localStorage.getItem('user');
        }
    }

    id() {
        if (this.loggedIn()) {
            const payload = token.payload(localStorage.getItem('token'));
            return payload.sub;
        }
        return false
    }
}

export default user = new user();
const userName =username;
const password = 'ligma';

const socket = io.connect('http://localhost:8181/',{
    auth: {
        userName,password,room
    },
    
})
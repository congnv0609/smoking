export function login(credential) {
    return new Promise((resolve, reject) => {
        axios.post('/backend/login', credential)
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject("Wrong email or password");
            })
    })
}

export function logout() {
    return new Promise((resolve, reject) => {
        axios.get('/backend/logout')
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject("Wrong email or password");
            })
    })
}

export function currentUser() {
    const user = localStorage.getItem('user');

    if (!user) {
        return null;
    }

    return JSON.parse(user);
}
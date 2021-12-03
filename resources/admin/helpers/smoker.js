export function smokers(query) {
    return new Promise((resolve, reject) => {
        axios.get('/backend/smokers/list', {params: query})
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}

export function get(query) {
    return new Promise((resolve, reject) => {
        axios.get(`/backend/smokers/detail/${query.id}`)
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}

export function update(data) {
    return new Promise((resolve, reject) => {
        axios.put(`/backend/smokers/update/${data.id}`, data)
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}

export function overview(id) {
    return new Promise((resolve, reject) => {
        axios.get(`/backend/smokers/overview/user/${id}`)
            .then(result => {
                resolve(result.data);
            })
            .catch(err => {
                reject(err)
            })
    })
}